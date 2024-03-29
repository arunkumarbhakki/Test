<?php

class candidate_model extends common_model
{
    public function getCandidateGridDetails($aColumns, $sWhere, $sOrder, $sLimit)
    {
       $sql="SELECT SQL_CALC_FOUND_ROWS A.* FROM (select candidate.Candidate_Id as Candidate_Id,st.Short_Name as Status,CONCAT(candidate.First_Name,' ', CASE WHEN candidate.Last_Name IS NULL THEN '' ELSE candidate.Last_Name END) as Name,CASE WHEN a.Work_Phone IS NULL THEN  '--' ELSE a.Work_Phone END as contact_no,CONCAT(CASE WHEN a.City IS NULL THEN  '--' ELSE a.City END ,',',CASE WHEN a.State IS NULL THEN  '--' ELSE a.State END) as Location, CASE WHEN candidate.primary_skill IS NULL THEN  '--' ELSE candidate.primary_skill END as primary_skill,candidate.email1 as email, candidate.email2, candidate.Display_Name from ".DB_PREFIX."candidate candidate LEFT OUTER JOIN ".DB_PREFIX."company com on candidate.company_id = com.Company_ID LEFT OUTER JOIN ".DB_PREFIX."contact con on candidate.contact_id = con.Reporting_PersonID LEFT OUTER JOIN ".DB_PREFIX."address a on a.Address_Id = con.Address_ID, ".DB_PREFIX."recruiter rec,".DB_PREFIX."status_lookup st  where rec.recruiter_id = candidate.Created_By and candidate.Status != 11 AND candidate.Status = st.Status) A ".$sWhere.$sOrder.$sLimit;
       $query=$this->db->query($sql);
       $count=$this->getLastTotalRows();
       if($query->num_rows())
       {
            return array('candidateList'=>$query->result(),'count'=>$count);
            
        }
        else
        {
            return array('candidateList'=>'','count'=>0);
        }
    }
    
    public function getCandidateDetails($candidate_id) {
        $sql="select candidate.Candidate_Id,st.Short_Name as Status, candidate.First_Name as First_Name, CASE WHEN candidate.Last_Name is NULL THEN '-' ELSE candidate.Last_Name END as Last_Name, candidate.company_id, candidate.contact_id, CASE WHEN candidate.primary_skill is NULL THEN '-' ELSE candidate.primary_skill END as primary_skill, CASE WHEN candidate.detailed_skill is NULL THEN '-' ELSE candidate.detailed_skill END as detailed_skill, CASE WHEN candidate.email1 is NULL THEN '-' ELSE candidate.email1 END as Email1, CASE WHEN candidate.email2 is NULL THEN '-' ELSE candidate.email2 END as Email2, CASE WHEN candidate.ResumeUrl is NULL THEN '-' ELSE candidate.ResumeUrl END, CASE WHEN candidate.immi_status is NULL THEN '-' ELSE candidate.immi_status END as immi_status, CASE WHEN candidate.available_yn is NULL THEN '-' ELSE candidate.available_yn END, CASE WHEN candidate.available_date is NULL THEN '-' ELSE candidate.available_date END as available_date, st.Short_Name, CASE WHEN candidate.Employer_Name is NULL THEN '-' ELSE candidate.Employer_Name END as Employer_Name, CASE WHEN candidate.NDA_Signed is NULL THEN '-' ELSE candidate.NDA_Signed END as NDA_Signed, CASE WHEN candidate.Asking_rate is NULL THEN '-' ELSE candidate.Asking_rate END as Asking_rate, CASE WHEN candidate.Submitted_To is NULL THEN '-' ELSE candidate.Submitted_To END, candidate.Modified_Date, candidate.Modified_By, candidate.Address_Id, CASE WHEN candidate.Display_Name is NULL THEN '-' ELSE candidate.Display_Name END, CASE WHEN candidate.SSN is NULL THEN '-' ELSE candidate.SSN END, CASE WHEN candidate.Birth_Date is null then '--' when candidate.Birth_Date like '00%' THEN  '--' ELSE candidate.Birth_Date END, CASE WHEN candidate.Suitable_Position is NULL THEN '-' ELSE candidate.Suitable_Position END as Suitable_Position, CASE WHEN candidate.Tax_Term is NULL THEN '-' ELSE candidate.Tax_Term END as Tax_Term, CASE WHEN com.Name IS  NULL THEN  '-' ELSE com.Name END as com_name, CASE WHEN con.First_Name IS  NULL THEN  '-' ELSE con.First_Name END as contact_name, CASE WHEN candidate.position_type is NULL THEN '-' ELSE candidate.position_type END as position_type, CASE WHEN candidate.location is NULL THEN '-' ELSE candidate.location END as location, CASE WHEN candidate.relocate is NULL THEN '-' ELSE candidate.relocate END as relocate, CASE WHEN candidate.duration is NULL THEN '-' ELSE candidate.duration END as duration from ".DB_PREFIX."candidate candidate LEFT OUTER JOIN ".DB_PREFIX."company com on candidate.company_id = com.Company_ID LEFT OUTER JOIN ".DB_PREFIX."contact con on candidate.contact_id = con.Reporting_PersonID LEFT OUTER JOIN ".DB_PREFIX."address a on a.Address_Id = con.Address_ID, ".DB_PREFIX."recruiter rec, ".DB_PREFIX."status_lookup st where rec.recruiter_id = candidate.Created_By and candidate.Status = st.Status and candidate.Candidate_Id =".$candidate_id;
        $query=$this->db->query($sql);
        if($query->num_rows())
        {
            return $query->row();
        }
        else
        {
            return false;
        }
        
    }
    
    public function getReference($candidate_id) {
        
        $sql="SELECT cand_con.contact_id, con.First_Name, CASE WHEN con.Last_Name IS NULL THEN '' ELSE con.Last_Name END, CASE WHEN a.Work_Phone IS NULL THEN '--' ELSE a.Work_Phone END as Work_Phone, CASE WHEN a.Cell IS NULL THEN '-' ELSE a.Cell END, con.Display_Name, case when con.Designation is not null then con.Designation else '--' end, case when con.Referred_By is not null then con.Referred_By else '--' end, CASE WHEN con.Email1 IS NULL THEN '-' ELSE con.Email1 END, CASE WHEN con.Email2 IS NULL THEN '-' ELSE con.Email2 END, CASE WHEN a.Home_Phone IS NULL THEN '--' ELSE a.Home_Phone END, comp.Name, con.contact_type, CASE WHEN con.entity_type_id IS NULL THEN '-' ELSE con.entity_type_id END, con.company_id from ".DB_PREFIX."candidate_contact cand_con LEFT OUTER JOIN ".DB_PREFIX."candidate cand ON cand_con.candidate_id = cand.Candidate_ID LEFT OUTER JOIN ".DB_PREFIX."company comp ON comp.Company_Id = con.company_id LEFT OUTER JOIN ".DB_PREFIX."address a ON a.address_id = con.address_id LEFT OUTER JOIN ".DB_PREFIX."contact con ON con.Reporting_PersonID = cand_con.contact_id  where con.Status = 19 and cand_con.candidate_id = ".$candidate_id." order by con.First_Name";
        $query=$this->db->query($sql);
        if($query->num_rows())
       {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
    
    public function getAddressDetails($address_id) {
        $sql="select Address_Id, CASE WHEN Address_1 is NULL THEN '-' ELSE Address_1 END as Address_1, CASE WHEN Address_2 is NULL THEN '-' ELSE Address_2 END as Address_2, CASE WHEN City is NULL THEN '-' ELSE City END as City, CASE WHEN State is NULL THEN '-' ELSE State END as State, CASE WHEN Zip is NULL THEN '-' ELSE Zip END, CASE WHEN Cell is NULL THEN '-' ELSE Cell END, CASE WHEN Work_Phone is NULL THEN '-' ELSE Work_Phone END as Work_Phone, CASE WHEN Fax is NULL THEN '-' ELSE Fax END, CASE WHEN Home_Phone is NULL THEN '-' ELSE Home_Phone END, CASE WHEN Pager is NULL THEN '-' ELSE Pager END, Created_Date, Created_By from ".DB_PREFIX."address where Address_Id =".$address_id;
        $query=$this->db->query($sql);
        if($query->num_rows())
        {
            return $query->row();
        }
        else
        {
            return false;
        }
    }
    
    public function getcandidateResumes($candidate_id) {
        $sql="SELECT res.resume_id, res.candidate_id, res.description filedescription, res.file_name as file_name, res.upload_date as upload_date, rec.First_Name as First_Name, CASE WHEN comp.name IS NULL THEN '--' ELSE comp.name END as company_name, CASE WHEN rec1.first_name IS NULL THEN '--' ELSE rec1.first_name END as submitted_by, CASE WHEN cand_req.Submitted_Date IS NULL THEN '--' ELSE cand_req.Submitted_Date END as Submitted_Date FROM ".DB_PREFIX."requirements req RIGHT OUTER JOIN ".DB_PREFIX."candidate_req cand_req ON req.requirement_id = cand_req.requirement_id RIGHT OUTER JOIN ".DB_PREFIX."resume res ON res.resume_id = cand_req.resume_id left OUTER JOIN ".DB_PREFIX."company comp ON comp.company_id = req.company_id left OUTER JOIN ".DB_PREFIX."recruiter rec1 ON rec1.recruiter_id = cand_req.Submitted_By, ".DB_PREFIX."recruiter rec where res.upload_by = rec.recruiter_id and res.Candidate_id =".$candidate_id;
        //echo $sql;
        $query=$this->db->query($sql);
        if($query->num_rows())
        {
            return $query->result();
        }
        else
        {
            return false;
        }
        
    }
    
    public function insertCandidateDetails($values,$table="candidate") {
        return $this->insertValues(DB_PREFIX.$table,$values);
    }
}


<?php

class Contact_model extends common_model
{
    
    public function getContactGridList($aColumns, $sWhere, $sOrder, $sLimit)
    {
       $sql="SELECT SQL_CALC_FOUND_ROWS A.* FROM (SELECT con.Reporting_PersonID as Reporting_PersonID, CONCAT(con.First_Name, 
                CASE WHEN con.Last_Name IS NULL THEN '' ELSE con.Last_Name END) as Name, 
                CASE WHEN a.Work_Phone IS NULL THEN '-' ELSE a.Work_Phone END as phone, 
                CASE WHEN a.Cell IS NULL THEN '-' ELSE a.Cell END as Cell, con.Display_Name, 
                case when con.Designation is not null then con.Designation else '--' end as Designation, 
                case when con.Referred_By is not null then con.Referred_By else '--' end as Referred_By, 
                CONCAT(CASE WHEN con.Email1 IS NULL THEN '-' ELSE con.Email1 END,'<br>', CASE WHEN con.Email2 IS NULL THEN '-' ELSE con.Email2 END) as email,
                CASE WHEN a.Home_Phone IS NULL THEN '--' ELSE a.Home_Phone END as Home_Phone, 
                CONCAT(con.contact_type,':',CASE WHEN con.contact_type = 'Candidate Reference' THEN concat(cand.First_Name, ' ', cand.Last_Name) 
                WHEN con.contact_type = 'Company Contact' THEN comp.Name 
                WHEN con.contact_type = 'General' THEN '--' END) as contact_type_name, 
                CASE WHEN con.entity_type_id IS NULL THEN '-' ELSE con.entity_type_id END as entity_type_id, con.company_id 
                FROM ".DB_PREFIX."contact con 
                LEFT OUTER JOIN ".DB_PREFIX."address a ON a.address_id = con.address_id 
                LEFT OUTER JOIN ".DB_PREFIX."company comp ON comp.Company_ID = con.entity_type_id and con.contact_type = 'Company Contact' 
                LEFT OUTER JOIN ".DB_PREFIX."candidate cand ON cand.Candidate_Id = con.entity_type_id and con.contact_type = 'Candidate Reference' WHERE con.STATUS=19) A ".
		$sWhere.
		$sOrder.
		$sLimit;
       
       $query=$this->db->query($sql);
       $count=$this->getLastTotalRows();
       if($query->num_rows())
       {
            return array('contactList'=>$query->result(),'count'=>$count);
            
        }
        else
        {
            return array('contactList'=>'','count'=>0);
        }
        
    }
    
    public function getCompanyContacts($company_id)
    {
        $sql="select con.Reporting_PersonID,CONCAT(con.First_Name,' ', CASE WHEN con.Last_Name IS NULL THEN '' ELSE con.Last_Name END) as contact_name, con.Created_Date, con.Created_By, case when con.Display_Name is not null then con.Display_Name else '--' end, case when con.Designation is not null then con.Designation else '--' end as Designation, case when con.Referred_By is not null then con.Referred_By else '--' end, case when con.Email1 is not null then con.Email1 else '--' END as Email1, case when con.Email2 is not null then con.Email2 else '--' END as Email2, con.Address_ID, comp.Name, con.contact_type, con.entity_type_id, con.company_id,case when ad.Cell is not null then ad.Cell else '--' END as cell, case when ad.Work_Phone is not null then ad.Work_Phone else '--' END phone, case when ad.Home_Phone is not null then ad.Home_Phone else '--' END as homePhone from ".DB_PREFIX."contact con,".DB_PREFIX."address ad, ".DB_PREFIX."company comp WHERE con.STATUS = 19 AND con.company_id = comp.Company_ID AND ad.Address_ID=con.Address_ID and con.company_id =".$company_id;
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
    
    public function getContactDetails($contact_id)
    {
        $sql="SELECT con.Reporting_PersonID,CONCAT(CASE WHEN con.First_Name IS NULL THEN '' ELSE con.First_Name END, CASE WHEN con.Last_Name IS NULL THEN '' ELSE con.Last_Name END) as Name, CASE WHEN a.Cell IS NULL THEN '--' ELSE a.Cell END as cell, CASE WHEN a.Work_Phone IS NULL THEN '--' ELSE a.Work_Phone END as phone, CASE WHEN con.Display_Name IS NULL THEN '--' ELSE con.Display_Name END, case when con.Designation is not null then con.Designation else '--' end as Designation, case when con.Referred_By is not null then con.Referred_By else '--' end as Referred_By, CONCAT(CASE WHEN con.Email1 IS NULL THEN '--' ELSE con.Email1 END,'<br>', CASE WHEN con.Email2 IS NULL THEN '--' ELSE con.Email2 END) as Email, CASE WHEN a.Home_Phone IS NULL THEN '--' ELSE a.Home_Phone END as homePhone, CASE WHEN comp.Name IS NULL THEN '--' ELSE comp.Name END, con.contact_type, CASE WHEN con.entity_type_id IS NULL THEN '--' ELSE con.entity_type_id END, CASE WHEN con.company_id IS NULL THEN '--' ELSE con.company_id END FROM ".DB_PREFIX."contact con LEFT OUTER JOIN ".DB_PREFIX."address a ON a.address_id = con.address_id LEFT OUTER JOIN ".DB_PREFIX."company comp ON comp.Company_ID = con.company_id WHERE con.STATUS = 19 AND con.Reporting_PersonID =".$contact_id;
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
    
    public function insertAddressDetails($values,$table="address")
    {
        return $this->insertValues(DB_PREFIX.$table,$values);
    }
    
    public function insertContactsDetails($values,$table="contact")
    {
        return $this->insertValues(DB_PREFIX.$table,$values);
    }
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Candidate extends MY_Session_Controller {
        
    private $page="candidate";

    public function index()
    {
        $data['page']=$this->page;
        $this->load->view('candidateListing',$data);
    }

    public function add()
    {
        $this->load->model("company_model");
        $this->load->model('lookup_model');
        $data['page']=$this->page;
        $data['state']=$this->lookup_model->getDisplayList('state');
        $data['duration']=$this->lookup_model->getDisplayList('duration');
        $data['available']=$this->lookup_model->getDisplayList('available');
        $data['immi_status']=$this->lookup_model->getDisplayList('immi_status');
        $data['position_type']=$this->lookup_model->getDisplayList('position_type');
        $data['relocate']=$this->lookup_model->getDisplayList('relocate');
        $data['tax_term']=$this->lookup_model->getDisplayList('tax_term');
        $data['location']=$this->lookup_model->getDisplayList('location');
        $data['companies']=$this->company_model->getCompanies();
        $data['nda']=$this->lookup_model->getDisplayList('nda');
        $this->load->view('addcandidate',$data);
    }
    
    public function details($candidate_id)
    {
        $this->load->model('notes_model');
        $this->load->model('candidate_model');
        $data['page']=$this->page;
        if($candidate_id&&$data['candidate_details']=$this->candidate_model->getCandidateDetails($candidate_id))
        {
            $data['address_details']=$this->candidate_model->getAddressDetails($data['candidate_details']->Address_Id);
            $data['resume_details']=$this->candidate_model->getcandidateResumes($candidate_id);
            //$data['reference_details']=$this->candidate_model->getReference($candidate_id);
            $data['notes_details']=$this->notes_model->getallnotes($candidate_id,'candidate');
            $this->load->view('candidatedetails',$data);
        }
        else
        {
            $this->load->view('404');
        }
        
    }
    
    public function saveCandidate()
    {
        $status='';
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('fName','First Name','required|trim');
        $this->form_validation->set_rules('lName','Last Name','required|trim');
        $this->form_validation->set_rules('pEmail','Personal Email','required|trim|valid_email');
        $this->form_validation->set_rules('pPhone','Personal Phone','required|trim');
        $this->form_validation->set_rules('add1','Address1','trim');
        $this->form_validation->set_rules('add2','Address2','trim');
        $this->form_validation->set_rules('city','City','trim');
        $this->form_validation->set_rules('state','State','trim');
        $this->form_validation->set_rules('zip','Zipcode','trim|numeric');
        $this->form_validation->set_rules('ssn','SSN','trim');
        $this->form_validation->set_rules('primary_skill','Primary Skills','required|trim');
        $this->form_validation->set_rules('detailed_skill','Secondary Skills','trim');
        $this->form_validation->set_rules('bd','Birthdate','trim');
        $this->form_validation->set_rules('conCompany','Contact Company','trim');
        $this->form_validation->set_rules('conPerson','Contact Person','trim');
        $this->form_validation->set_rules('empName','Employer Name','trim');
        $this->form_validation->set_rules('subPosition','Suitable Position','trim');
        $this->form_validation->set_rules('askRate','Asking Rate','trim');
        $this->form_validation->set_rules('available','Available Status','required|trim');
        $this->form_validation->set_rules('availDate','Available Date','required|trim');
        $this->form_validation->set_rules('imgStatus','Immigration Status','required|trim');
        $this->form_validation->set_rules('taxterm','Tax Term','required|trim');
        $this->form_validation->set_rules('nda','NDA Signed','required|trim');
        $this->form_validation->set_rules('willRelocate','Relocate','required|trim');
        $this->form_validation->set_rules('posType','Preferred Position Type','trim');
        $this->form_validation->set_rules('preLocation','Preferred Location','trim');
        
        if($this->form_validation->run())
        {
           $this->load->model('candidate_model');
           $this->load->model('contact_model');
           if(strtotime(date("Y-m-d"))<=strtotime($this->input->post('bd')))
            {
                $this->ibizErrors[] = 'Please Check Given Birth Date';
            }
            else
            {
                $addressdata=array(
               'Address_1' => $this->input->post('add1'),
               'Address_2' => $this->input->post('add2'),
               'City' => $this->input->post('city'),
               'State' => $this->input->post('state'),
               'Zip' => $this->input->post('zip'),
               'Cell' => $this->input->post('pPhone'),
               'Work_Phone' => $this->input->post('wPhone'),
               'Fax' => '',
               'Home_Phone' => '',
               'Created_Date' => date('Y-m-d'),
               'Created_By' => $this->session->userdata('Recruiter_ID')
           );
           $addressdata = $this->replaceEmptyValuesNull($addressdata);
           $addressid = $this->contact_model->insertAddressDetails($addressdata);
           
           /*$contactdata=array(
               'First_Name' => $this->input->post('fName'),
               'Last_Name' => $this->input->post('lName'),
               'Created_Date' => date('Y-m-d'),
               'Created_By' => $this->session->userdata('Recruiter_ID'),
               'Display_Name' => '',
               'Designation' => '',
               'Referred_By' => '',
               'Email1' => $this->input->post('pEmail'),
               'Email2' => $this->input->post('wEmail'),
               'Address_ID' => $addressid,
               'Status' => '19',
               'contact_type' => '',
               'entity_type_id' => '',
               'company_id' => ''
           );
           $contactdata = $this->replaceEmptyValuesNull($contactdata);
           $contactid = $this->contact_model->insertContactsDetails($contactdata);*/
           
           $canddata= array(
                    'First_Name' => $this->input->post('fName'),
                    'Last_Name' => $this->input->post('lName'),
                    'Created_Date' => date('Y-m-d'),
                    'Created_By' => $this->session->userdata('Recruiter_ID'),
                    'primary_skill' => $this->input->post('primary_skill'),
                    'detailed_skill' => $this->input->post('detailed_skill'),
                    'email1' => $this->input->post('pEmail'),
                    'email2' => $this->input->post('wEmail'),
                    'immi_status' => $this->input->post('zip'),
                    'available_yn' => $this->input->post('imgStatus'),
                    'available_date' => $this->input->post('availDate'),
                    'Address_Id' => $addressid,
                    'Status' => '10',
                    'Employer_Name' => $this->input->post('empName'),
                    'NDA_Signed' => $this->input->post('nda'),
                    'Asking_rate' => $this->input->post('askRate'),
                    'SSN' => $this->input->post('ssn'),
                    'Birth_Date' => $this->input->post('bd'),
                    'Suitable_Position' => $this->input->post('subPosition'),
                    'Tax_Term' => $this->input->post('taxterm'),
                    'company_id' => $this->input->post('conCompany'),
                    'contact_id' => $this->input->post('conPerson'),
                    'position_type' => $this->input->post('posType'),
                    'location' => $this->input->post('preLocation'),
                    'relocate' => $this->input->post('willRelocate'),
                    'duration' => $this->input->post('project')
               );
           $canddata = $this->replaceEmptyValuesNull($canddata);
           $candid = $this->candidate_model->insertCandidateDetails($canddata);
           $status='Candidates added Successfully';
            }
        }
        else
        {
            $this->ibizErrors[]=validation_errors();
        }
         $return = array(
                                'hasError' => !empty($this->ibizErrors),
                                'errors' => $this->ibizErrors,
                                'status' => $status
                        );
                echo json_encode($return);
        
    }
    
    public function getCandidateGridList()
        {
        $this->load->model('candidate_model');
        /* Array of database columns which should be read and sent back to DataTables. Use a space where
	 * you want to insert a non-database field (for example a counter or static image)
	 */
        $aColumns = $_GET['aColumns'];
        
        /* Indexed column (used for fast and accurate table cardinality) */
        $sIndexColumn = $_GET['sIndexColumn'];
        
        /* DB table to use */
	//$sTable = $_GET['sTable'];
                
        /* 
	 * Paging
	 */
        
	$sLimit = "";
	if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
	{
		$sLimit = " LIMIT ".intval( $_GET['iDisplayStart'] ).", ".
			intval( $_GET['iDisplayLength'] );
	}
	
	
	/*
	 * Ordering
	 */
	$sOrder = "";
	if ( isset( $_GET['iSortCol_0'] ) )
	{
		$sOrder = "ORDER BY  ";
		for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
		{
			if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
			{
				$sOrder .= "`".$aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."` ".
					($_GET['sSortDir_'.$i]==='asc' ? 'asc' : 'desc') .", ";
			}
		}
		
		$sOrder = substr_replace( $sOrder, "", -2 );
		if ( $sOrder == "ORDER BY" )
		{
			$sOrder = "";
		}
	}
	
	
	/* 
	 * Filtering
	 * NOTE this does not match the built-in DataTables filtering which does it
	 * word by word on any field. It's possible to do here, but concerned about efficiency
	 * on very large tables, and MySQL's regex functionality is very limited
	 */
	$sWhere = "";
	if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" )
	{
		$sWhere = "WHERE (";
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			$sWhere .= "A.`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string( $_GET['sSearch'] )."%' OR ";
		}
		$sWhere = substr_replace( $sWhere, "", -3 );
		$sWhere .= ')';
	}
	
	/* Individual column filtering */
	for ( $i=0 ; $i<count($aColumns) ; $i++ )
	{
		if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
		{
			if ( $sWhere == "" )
			{
				$sWhere = "WHERE ";
			}
			else
			{
				$sWhere .= " AND ";
			}
			$sWhere .= "`A.".$aColumns[$i]."` LIKE '%".mysql_real_escape_string($_GET['sSearch_'.$i])."%' ";
		}
	}
	
	/*
	 * SQL queries
	 * Get data to display
	 */
	$rResult = $this->candidate_model->getCandidateGridDetails($aColumns,$sWhere, $sOrder, $sLimit);
        
        //$rResult = mysqli_query( $sQuery ) or die(mysqli_error());
	
	/* Data set length after filtering */
	
	/*
	 * Output
	 */
	$output = array(
		"sEcho" => intval($_GET['sEcho']),
		"iTotalRecords" => $rResult['count'],
		"iTotalDisplayRecords" => $rResult['count'],
		"aaData" => array()
	);
	$output['aaData'] = $rResult['candidateList'];
        echo json_encode( $output );
    }
}

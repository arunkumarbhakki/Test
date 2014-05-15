<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Requirements extends MY_Session_Controller {

	private $page="requirement";
        
	public function index()
	{
            $data['page']=$this->page;
            $this->load->view('requirements',$data);
	}
        
        public function add()
        {
            $this->load->model("company_model");
            $this->load->model('lookup_model');
            $data['page']=$this->page;
            $data['company']=$this->company_model->getCompanies(1);
            $data['time_frame']=$this->lookup_model->getDisplayList('time_frame');
            $data['time_frame_desc']=$this->lookup_model->getDisplayList('time_frame_desc');
            $data['tax_term']=$this->lookup_model->getDisplayList('tax_term');
            $data['requirement_status']=$this->lookup_model->getStatus('JOB');
            $data['priority']=$this->lookup_model->getDisplayList('priority');
            $this->load->view('addRequirement',$data);
        }
        
        public function details($requirement_id)
        {
            $this->load->model('requirements_model');
            $this->load->model('notes_model');
            $data['page']=$this->page;
            $data['requirement_details']=$this->requirements_model->getRequirementDetails($requirement_id);
            $data['submited_candidates']=$this->requirements_model->getReqSubmitList($requirement_id);
            $data['notes_details']=$this->notes_model->getallnotes($requirement_id,'requirement');
            $this->load->view('requirementdetails',$data);
        }
        
        public function getRequirementGridDetails()
        {
        $this->load->model('requirements_model');
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
         if($this->session->userdata('Role')=="Admin")
        {
            $recruiter_id=false;
        }
        else
        {
            $recruiter_id=$this->session->userdata('Recruiter_ID');
        }
	$rResult = $this->requirements_model->getRequirementGridDetails($sWhere, $sOrder, $sLimit,$recruiter_id);
        
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
	$output['aaData'] = $rResult['reqList'];
        echo json_encode( $output );
    }
    
    public function saveRequirement()
    {
        $status='';
        $this->load->library('form_validation');
        //$this->form_validation->set_rules('pid','Postion Id','required|trim');
        $this->form_validation->set_rules('ptitle','Postion Title','required|trim');
        $this->form_validation->set_rules('sdate','Starting Date','required|trim');
        $this->form_validation->set_rules('cdate','Closing Date','required|trim');
        $this->form_validation->set_rules('skill','Skills','required|trim');
        $this->form_validation->set_rules('billrate','Billing Rate','required|trim|numeric');
        $this->form_validation->set_rules('tax_term','Tax Term','required|trim');
        $this->form_validation->set_rules('loc','Location','required|trim');
        $this->form_validation->set_rules('status','Status','required|trim');
        $this->form_validation->set_rules('company','Compnay Name','required|trim');
        $this->form_validation->set_rules('to_time_frame','Duration','trim');
        $this->form_validation->set_rules('from_time_frame','Duration','trim');
        $this->form_validation->set_rules('time_frame_desc','Duration','trim');
        
        $this->load->model('requirements_model');
        $this->load->model('contact_model');
        if($this->form_validation->run())
        {
            if(strtotime($this->input->post('cdate'))<=strtotime($this->input->post('sdate')))
            {
                $this->ibizErrors[]='Start Date Should Not Be More Than Close Date';
            }
            else if(strtotime(date("Y-m-d"))>=strtotime($this->input->post('cdate')))
            {
                $this->ibizErrors[]='Your Closing Date is Expired';
            }
            else
            {
                $addressdata=array(
               'Address_1' => '',
               'Address_2' => '',
               'City' => '',
               'State' => '',
               'Zip' => '',
               'Cell' => '',
               'Work_Phone' => $this->input->post('cphone'),
               'Fax' => '',
               'Home_Phone' => '',
               'Created_Date' => date('Y-m-d'),
               'Created_By' => $this->session->userdata('Recruiter_ID')
           );
           $addressdata = $this->replaceEmptyValuesNull($addressdata);
           $addressid = $this->contact_model->insertAddressDetails($addressdata);
           
            $contactdata=array(
               'First_Name' => $this->input->post('cp'),
               'Last_Name' => '',
               'Created_Date' => date('Y-m-d'),
               'Created_By' => $this->session->userdata('Recruiter_ID'),
               'Display_Name' => '',
               'Designation' => '',
               'Referred_By' => '',
               'Email1' => $this->input->post('cemail'),
               'Email2' => '',
               'Address_ID' => $addressid,
               'Status' => '19',
               'contact_type' => '',
               'entity_type_id' => '',
               'company_id' => ''
           );
           $contactdata = $this->replaceEmptyValuesNull($contactdata);
           $contactid = $this->contact_model->insertContactsDetails($contactdata);     
           
            $reqdata = array(
            'Position_id' => $this->input->post('pid'),
            'Position_title' => $this->input->post('ptitle'),
            'Start_Date' => $this->input->post('sdate'),
            'Close_Date' => $this->input->post('cdate'),
            'Requirement_Detail' => $this->input->post('posdes'),
            'Created_Date' => date('Y-m-d'),
            'Created_By' => $this->session->userdata('Recruiter_ID'),
            'Skills' => $this->input->post('skill'),
            'billing_rate' => $this->input->post('billrate'),
            'Tax_Term' => $this->input->post('tax_term'),
            'Location' => $this->input->post('loc'),
            'Source' => $this->input->post('source'),
            'End_Client_Name' => $this->input->post('ecn'),
            'Contact_ID' => $contactid,
            'status' => $this->input->post('status'),
            'priority' => $this->input->post('priority'),
            'company_id' => $this->input->post('company'),
            'to_time_frame' => $this->input->post('to_time_frame'),
            'from_time_frame' => $this->input->post('from_time_frame'),
            'time_frame_desc' => $this->input->post('time_frame_desc')
            );
            $reqdata = $this->replaceEmptyValuesNull($reqdata);
            $reqid = $this->requirements_model->insertRequirementDetails($reqdata);
            
            $assignRequirement=array(
                'Requirement_ID'=>$reqid,
                'Recruiter_ID'=>$this->session->userdata('Recruiter_ID'),
                'Assignment_Stauts'=>31,
                'Status_Change_date'=>'',
                'Modified_By'=>$this->session->userdata('Recruiter_ID'),
                'Assigned_By'=>$this->session->userdata('Recruiter_ID'),
                'Created_Date'=>date('Y-m-d'),
                'close_date'=>''
            );
            $assignRequirement=$this->replaceEmptyValuesNull($assignRequirement);
            $assignId = $this->requirements_model->insertAssignedRequirementDetails($assignRequirement);
            $status='Requirements added Successfully';
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
}


<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contacts extends MY_Session_Controller {

	private $page="contact";
        
	public function index()
	{
            
            $data['page']=$this->page;
            $this->load->view('contacts',$data);
	}
        
        public function add()
        {
            $this->load->model('lookup_model');
            $data['page']=$this->page;
            $this->Designation=$this->lookup_model->getDisplayList('designation');
            $this->load->view('addContact',$data);
        }
        
        public function details($contact_id)
        {
            $this->load->model('contact_model');
            $this->load->model('notes_model');
            $data['page']=$this->page;
            $data['contact_details']=$this->contact_model->getContactDetails($contact_id);
            $data['notes_details']=$this->notes_model->getallnotes($contact_id,'contact');
            $this->load->view('contactdetails',$data);
        }
        
        public function viewgroups()
        {
            $data['page']=$this->page;
            $this->load->view('contactgroups',$data);
        }
        
        public function addgroups()
        {
            $data['page']=$this->page;
            $this->load->view('addgroup',$data);
        }
        
        public function getContactGridList()
        {
        $this->load->model('contact_model');
        /* Array of database columns which should be read and sent back to DataTables. Use a space where
	 * you want to insert a non-database field (for example a counter or static image)
	 */
        $aColumns = $_GET['aColumns'];
        
        /* Indexed column (used for fast and accurate table cardinality) */
        //$sIndexColumn = $_GET['sIndexColumn'];
        
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
		$sOrder = " ORDER BY  ";
		for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
		{
			if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
			{
				$sOrder .= "A.`".$aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."` ".
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
			$sWhere .= "A.`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string($_GET['sSearch_'.$i])."%' ";
		}
	}
	
	/*
	 * SQL queries
	 * Get data to display
	 */
	$rResult = $this->contact_model->getContactGridList($aColumns, $sWhere, $sOrder, $sLimit);
        
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
	
        $output['aaData']=$rResult['contactList'];
	echo json_encode( $output );
    }
    
    public function saveContact()
    {
        $status='';
        $this->load->model('contact_model');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fName','First Name','required|trim');
        $this->form_validation->set_rules('lName','Last Name','required|trim');
        $this->form_validation->set_rules('pEmail','Personal Email','required|trim|valid_email');
        $this->form_validation->set_rules('pPhone','Personal Phone','required|trim');
        $this->form_validation->set_rules('wEmail','Work Email','trim|valid_email');
        $this->form_validation->set_rules('wPhone','Work Phone','trim');
        $this->form_validation->set_rules('desi','Contact Company','required|trim');
        $this->form_validation->set_rules('refby','Contact Person','trim');
        
        if($this->form_validation->run())
        {
            $addressdata=array(
               'Address_1' => '',
               'Address_2' => '',
               'City' => '',
               'State' => '',
               'Zip' => '',
               'Cell' => $this->input->post('wPhone'),
               'Work_Phone' => $this->input->post('pPhone'),
               'Fax' => '',
               'Home_Phone' => '',
               'Created_Date' => date("Y-m-d"),
               'Created_By' => $this->session->userdata('Recruiter_ID')
           );
           $addressdata=  $this->replaceEmptyValuesNull($addressdata);
           $addressid = $this->contact_model->insertAddressDetails($addressdata);
           
            $contactdata=array(
               'First_Name' => $this->input->post('fName'),
               'Last_Name' => $this->input->post('lName'),
               'Created_Date' => date("Y-m-d"),
               'Created_By' => $this->session->userdata('Recruiter_ID'),
               'Display_Name' => '',
               'Designation' => $this->input->post('desi'),
               'Referred_By' => $this->input->post('refby'),
               'Email1' => $this->input->post('pEmail'),
               'Email2' => $this->input->post('wEmail'),
               'Address_ID' => $addressid,
               'Status' => '19',
               'contact_type' => '',
               'entity_type_id' => '',
               'company_id' => ''
           );
           $contactdata=  $this->replaceEmptyValuesNull($contactdata);
           $contactid = $this->contact_model->insertContactsDetails($contactdata); 
           $status='Contact added Successfully';
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


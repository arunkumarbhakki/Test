<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Session_Controller extends CI_Controller {
    
    public $ibizErrors;
    public $status;
    function __construct() {
        parent::__construct();
        if ($this->session->userdata('is_logged')===FALSE) {
            redirect('/login', 'refresh');
        }
    }
    
    public function replaceEmptyValuesNull($array) {
        foreach ($array as $i => $value) {
        if ($value === ""){
		$array[$i] = NULL;
	}
        }
        return $array;
    }

}

?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_check extends CI_Controller{
    
    public function index(){
        
        echo $this->session->userdata('next');
 
    }

}

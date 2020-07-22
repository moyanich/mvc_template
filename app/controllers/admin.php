<?php

class Admin extends Controller {

    public function __construct() {
        
    }

    public function index() {

        $data = [
            'title' => 'Welcome',
            'description' => ''
        ];

        $this->view('admin/index', $data);
        
    }


  
   public function dashboard() {

   

        $data = [
            'title' => 'Dashboard',
            'description' => ''
        ];
        
       
            $this->view('admin/dashboard', $data);
        }
  

   

    public function addemployee() {
        $data = [
            'title' => 'About Us',
            'description' => 'HR Management'
        ];
        $this->view('page/add-employee', $data);
    } 

    
} 
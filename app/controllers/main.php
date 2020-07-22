<?php

class Main extends Controller {

    public function __construct() {
        if (!isUserLoggedIn())  {
            redirect('user/login');
        } 
    }

    public function index() {

        $data = [
            'title' => 'Welcome in main',
            'description' => 'User permission pending. Please contact the Administrator'
        ];

        $this->view('main/index', $data);
        
    }
    
} 
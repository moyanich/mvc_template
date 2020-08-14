<?php

class Main extends Controller {

    public function __construct() {
        if (!isUserRegistered())  {
            redirect('user/login');
        } 
    }

    public function index() {
       
        $data = [
            'title' => 'Welcome',
            'user' => '',
            'description' => 'User permission is pending. Please contact the Administrator.'
        ];

        $this->view('main/index', $data);
    }
    
} 
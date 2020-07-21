<?php

class Pages extends Controller {

    public function __construct(){
       
    }


    public function index() {

        $data = [
            'title' => 'Welcome to Swift Manager',
            'description' => 'When you use a theme created by Start Bootstrap, you know that the theme will look great on any device, whether it\'s a phone, tablet, or desktop the page will behave responsively!'
        ];
    
        $this->view('page/index', $data);
    }

    public function about() {
        $data = [
            'title' => 'About Us',
            'description' => 'HR Management'
        ];
        $this->view('page/about', $data);
    }

    public function dashboard() {
        $data = [
            'title' => 'Dashboard',
            'description' => 'App to share posts with other users'
        ];

        $this->view('page/dashboard', $data);
    }
} 
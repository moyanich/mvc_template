<?php

class Main extends Controller {

    public function __construct() {
        if (!isUserLoggedIn())  {
            redirect('user/login');
        } 
    }

    public function index() {
        //$posts = $this->postModel->getPosts();

        $data = [
            'title' => 'Welcome',
            'user' => '',
            'description' => 'User permission is pending. Please contact the Administrator.'
        ];

        $this->view('main/index', $data);
    }
    
} 
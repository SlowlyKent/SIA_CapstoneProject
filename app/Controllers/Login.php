<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Login extends BaseController
{
    public function __construct()
    {
        // Load the form helper
        helper('form');
    }

    public function index()
    {
        // Display the login form
        return view('index');
    }

    public function authenticate()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Basic validation
        if (empty($username) || empty($password)) {
            session()->setFlashdata('error', 'Username and password are required.');
            return redirect()->to('/login');
        }

        // For now, we'll use a simple hardcoded check
        // In a real application, you would check against a database
        if ($username === 'admin' && $password === 'password') {
            // Set session data
            session()->set([
                'user_id' => 1,
                'username' => $username,
                'logged_in' => true
            ]);
            
            // Redirect to dashboard
            return redirect()->to('/dashboard');
        } else {
            session()->setFlashdata('error', 'Invalid username or password.');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}

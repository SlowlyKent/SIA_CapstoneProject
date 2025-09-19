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

        // Load database
        $db = \Config\Database::connect();
        $builder = $db->table('users');

        // Find user by username
        $user = $builder->where('username', $username)->get()->getRowArray();

        if ($user && password_verify($password, $user['password'])) {
            // Set session data using the specific attributes
            session()->set([
                'user_id' => $user['user_id'],
                'username' => $user['username'],
                'role' => $user['role'],
                'logged_in' => true
            ]);
            
            // Update last login time
            $builder->where('user_id', $user['user_id'])
                   ->update(['updated_at' => date('Y-m-d H:i:s')]);
            
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

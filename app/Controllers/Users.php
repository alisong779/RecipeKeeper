<?php

namespace App\Controllers;

use App\Models\User;
use App\Libraries\Hash;


class Users extends BaseController
{
    protected $request;

    function __construct()
    {
        parent::__construct();
        helper(['form', 'url']);
    }

    public function index()
    {

        $data = [];
        helper(['form']);

        if ($this->request->is('post')) {
            //validation
            $rules = [
                'email' => 'required|valid_email',
                'password' => 'required|validateUser[email,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => 'Email or Password don\'t match'
                ]
            ];

            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
                return view('users/login', $data);
            } else {
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');

                $userModel = new User();
                $userInfo = $userModel->where('email', $email)->first();

                $checkPassword = Hash::check($password, $userInfo['password']);

                if (!$checkPassword) {
                    session()->setFlashdata('fail', 'Incorrect password provided');
                    return redirect()->to('/');
                } else {
                    $userId = $userInfo['id'];

                    //session()->set('loggedInUser', $userId);
                    $this->setUserSession($userInfo);
                    return redirect()->to('/profile');
                }
            }

            //$model = new User();

            //$user = $model->where('email', $this->request->getVar('email'))
            //->first();


            //$this->setUserSession($user);
            //return redirect()->to('/profile');
            //}
        }
        return view('users/login', $data);
    }


    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'first_name' => $user['first_name'],
            'last_name' => $user['last_name'],
            'email' => $user['email'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }

    public function register()
    {

        $data = [];
        helper(['form']);
        if (!$this->request->is('post')) {
            return view('users/register', $data);
        } else {

            //validation
            $rules = [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|valid_email',
                'password' => 'required|min_length[5]|max_length[20]',
                'password_confirm' => 'matches[password]',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                return view('users/register', $data);
            } else {

                $model = new User();

                $data = [
                    'first_name' => $this->request->getPost('first_name'),
                    'last_name' => $this->request->getPost('last_name'),
                    'email' => $this->request->getPost('email'),
                    'password' => $this->request->getPost('password'),
                ];
                $model->save($data);

                $session = session();
                $session->set($data); // setting session data
                $session->setFlashdata('success', 'Successful Registration. Lets get Cooking!');
                return redirect()->to(base_url('/profile'));
            }
        }
    }


    /*public function profile()
    {
        $session = session();
        $item = $session->get('firstname');
        $data = [
            'first_name' => $item,
        ];
        return view('users/profile', $data);

        helper(['form']);
        $session->set($data); // setting session data



    }*/

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}

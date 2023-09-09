<?php

namespace App\Controllers;

use App\Models\User;
use App\Libraries\Hash;
use App\Models\Image;

class Profile extends BaseController
{
    protected $request;

    function __construct()
    {
        parent::__construct();
        helper(['form', 'url', 'image']);
    }

    public function index()
    {

        $session = session();
        $imageModel = new Image();
        $first_name = $session->get('first_name');
        $user_id = $session->get('id');
        //$img_location = '/uploads/images/profile/silverware.png';
        $profile_img = $imageModel->get_user_img($user_id);

        $data = [
            'first_name' => $first_name,
            'img_location' => $profile_img,
        ];
        $data['validation'] = $this->validator;

        if ($this->request->is('post')) {

            $rules = [
                'profile_pic' => [
                    'rules' => 'uploaded[profile_pic]|max_size[profile_pic, 1024]|is_image[profile_pic]',
                    'label' => 'Profile Picture'
                ]
            ];



            if ($this->validate($rules)) {
                $file = $this->request->getFile('profile_pic');
                if ($file->isValid() && !$file->hasMoved()) {
                    $file->move('./uploads/images/profile/');
                    $file_name = $file->getName(); //use this to write name to table along with img location, user id etc
                    $location = '/uploads/images/profile/' . $file_name . '';
                    $user_id = $session->get('id');
                    //$model = new Image();
                    $img_data = [
                        'user_id' => $user_id,
                        'img_location' => $location,
                    ];
                    $imageModel->save($img_data);
                }
                return redirect()->to(base_url('profile'));
            } else {
                $data['validation'] = $this->validator;
                return view('profile/index', $data);
            }
        }
        return view('profile/index', $data);
    }
}

<?php

namespace App\Controllers;

use App\Models\Recipe;

class Recipes extends BaseController
{
    public function index()
    {
        $data = ['title' => 'Your Recipes Page'];

        return view('recipes/index', $data);
    }

    public function add()
    {
        helper('form');
        $data = [];

        if (!$this->request->is('post')) {
            return view('recipes/add', $data);
        } else {

            //validation
            $rules = [
                'recipe_name' => 'required',
                'recipe_desc'  => 'required',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                return view('recipes/add', $data);
            } else {
                $model = new Recipe();

                $data = [
                    'recipe_name' => $this->request->getPost('recipe_name'),
                    'recipe_desc' => $this->request->getPost('recipe_desc'),
                    'recipe_img' => $this->request->getPost('recipe_img'),
                ];

                $model->save($data);

                return redirect()->to(base_url('recipes/add'));
            }
        }
    }
}

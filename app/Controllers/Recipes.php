<?php

namespace App\Controllers;

use App\Models\Image;
use App\Models\Recipe;

class Recipes extends BaseController
{
    function __construct()
    {
        parent::__construct();
        helper(['form', 'url', 'image']);
    }


    public function index()
    {
        $recipeModel = new Recipe();
        $session = session();
        $user_id = $session->get('id');
        $user_recipes = $recipeModel->get_user_recipes($user_id);
        //var_dump($user_recipes);
        $data = [
            'title' => 'Your Recipes Page',
            'recipes' => $user_recipes,
        ];
        return view('recipes/index', $data);
    }

    public function add()
    {
        helper('form');
        $data = ['title' => 'Add Recipe Page'];
        $session = session();
        $user_id = $session->get('id');

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
                $post_data = [
                    'recipe_name' => $this->request->getPost('recipe_name'),
                    'recipe_desc' => $this->request->getPost('recipe_desc'),
                    'recipe_img' => $this->request->getPost('recipe_img'),
                    'user_id' => $user_id,
                    'created_by' => $user_id,
                ];

                $model->save($post_data);
                $session->setFlashdata('success', 'Success. Added!');
                return redirect()->to(base_url('recipes/add_ingredients'));
            }
        }
    }

    public function add_ingredients()
    {
        $data = ['title' => 'Add Ingredients'];

        return view('recipes/add_ingredients', $data);
    }

    public function view($id)
    {
        $recipeModel = new Recipe();
        $user_recipe = $recipeModel->find($id);
        $data = [
            'title' => 'View Recipe',
            'recipe' => $user_recipe,
        ];
        return view('recipes/view', $data);
    }

    public function edit_recipe($id)
    {
        $recipes = new Recipe();
        $recipe = $recipes->find($id);
        //var_dump($recipe);
        $data['recipe'] = $recipe;
        return view('recipes/edit_recipe', $data);
    }

    public function update($id)
    {
        $session = session();
        $user_id = $session->get('id');
        if (!$this->request->is('post')) {
            return view('recipes/edit_recipe/' . $id);
        } else {
            //validation
            $rules = [
                'recipe_name' => 'required',
                'recipe_desc'  => 'required',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                return view('recipes/edit_recipe/' . $id, $data);
            } else {

                $model = new Recipe();
                $post_data = [
                    'recipe_name' => $this->request->getPost('recipe_name'),
                    'recipe_desc' => $this->request->getPost('recipe_desc'),
                    'recipe_img' => $this->request->getPost('recipe_img'),
                    'updated_by' => $user_id,
                ];

                $model->update($id, $post_data);
                $session->setFlashdata('success', 'Success. Added!');
                return redirect()->to(base_url('recipes/view/' . $id));
            }
        }
    }
}

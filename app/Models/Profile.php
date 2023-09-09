<?php

namespace App\Models;

use CodeIgniter\Model;

class Profile extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'users';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $protectFields        = true;
    protected $allowedFields        = ['user_id', 'img_location', 'updated_at'];

    //protected $beforeInsert = ['beforeInsert'];
    //protected $beforeUpdate = ['beforeUpdate'];

    //public function get_profile_img($id) {
    //$qry = 'SELECT img_location FROM recipekeeper.images where user_id = 57;';

    //}
}

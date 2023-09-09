<?php

namespace App\Models;

use CodeIgniter\Model;

class Image extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'images';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $protectFields        = true;
    protected $allowedFields        = ['user_id', 'img_location', 'updated_at'];

    //protected $beforeInsert = ['beforeInsert'];
    //protected $beforeUpdate = ['beforeUpdate'];

    public function get_user_img($id)
    {
        $sql = 'SELECT img_location FROM recipekeeper.images WHERE user_id = ' . $id . '';
        $query = $this->db->query($sql);
        $row = $query->getLastRow();
        $data = '/uploads/images/profile/silverware.png';
        if (isset($row)) {
            $data = $row->img_location;
        }
        return $data;
    }
}

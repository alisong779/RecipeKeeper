<?php

namespace App\Models;

use CodeIgniter\Model;

class Ingredient extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'recipe_ingredients';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $protectFields        = true;
    protected $allowedFields        = ['ing_name', 'qty', 'measure', 'user_id', 'recipe_id', 'created_at', 'created_by', 'updated_at', 'updated_by'];

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data)
    {
        $data['data']['created_at'] = date('Y-m-d H:i:s');

        return $data;
    }

    protected function beforeUpdate(array $data)
    {
        $data['data']['updated_at'] = date('Y-m-d H:i:s');
        return $data;
    }

    public function get_ingredients($id)
    {
        $sql = 'SELECT * FROM recipe_ingredients WHERE recipe_ingredients.recipe_id = ' . $id;
        $query = $this->db->query($sql);

        $data = $query->getResult();

        return $data;
    }
}

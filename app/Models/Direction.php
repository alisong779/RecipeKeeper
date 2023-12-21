<?php

namespace App\Models;

use CodeIgniter\Model;

class Direction extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'recipe_steps';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $protectFields        = true;
    protected $allowedFields        = ['instructions', 'step_id', 'user_id', 'recipe_id', 'created_at', 'created_by', 'updated_at', 'updated_by'];

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
        $builder = $this->db->table('recipe_ingredients');
        $builder->where('recipe_id =', $id);
        $builder->where('deleted_at =', null);
        $builder->orderBy('ing_name', 'ASC');
        $query = $builder->get();
        $data = $query->getResult();

        //$sql = 'SELECT * FROM recipe_ingredients WHERE recipe_ingredients.recipe_id = ' . $id;
        //$query = $this->db->query($sql);
        //$data = $query->getResult();

        return $data;
    }

    public function get_directions($id)
    {
        $builder = $this->db->table('recipe_steps');
        $builder->where('recipe_id =', $id);
        $builder->where('deleted_at =', null);
        $builder->orderBy('id', 'ASC');
        $query = $builder->get();
        //$sql = 'SELECT * FROM recipe_steps WHERE recipe_steps.recipe_id = ' . $id . '';
        //$query = $this->db->query($sql);
        $data = $query->getResult();

        return $data;
    }
}

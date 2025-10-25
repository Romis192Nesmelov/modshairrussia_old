<?php namespace App\Models;

use CodeIgniter\Model;

class BlockSeoModel extends Model
{
    protected $table = 'blocks';
    protected $primaryKey = 'id';

    public function getBlockData($key)
    {
        return $this->where('url', $key)->first();
    }
}

<?php namespace App\Models;

use CodeIgniter\Model;

class ServicesModel extends Model
{
    protected $table = 'services';
    protected $primaryKey = 'id';

    public function getServiceByUrl($key)
    {
        return $this->where('url', $key)->first();
    }
}

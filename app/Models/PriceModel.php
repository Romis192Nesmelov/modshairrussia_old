<?php namespace App\Models;

use CodeIgniter\Model;

class PriceModel extends Model
{
    protected $table = 'price';
    protected $primaryKey = 'id';

    public function getPriceByServiceId($key)
    {
        return $this->where('service_id', $key)->findAll();
    }
}

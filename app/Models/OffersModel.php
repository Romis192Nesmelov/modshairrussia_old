<?php namespace App\Models;

use CodeIgniter\Model;

class OffersModel extends Model
{
    protected $table = 'promo';
    protected $primaryKey = 'id';

    public function getAllOffers()
    {
        return $this->where('expires >', 'NOW()', false)->orderBy('id', 'DESC')->findAll();
    }
}

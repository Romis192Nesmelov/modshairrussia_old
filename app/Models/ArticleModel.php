<?php namespace App\Models;

use CodeIgniter\Model;

class ArticleModel extends Model
{
    protected $table   = 'article';
    protected $primaryKey = 'id';

    public function getArticle($key)
    {
        return $this->where('url', $key)->first();
    }

    public function getArticles($limit, $offset)
    {
        return $this->orderBy('date', 'DESC')->findAll($limit, $offset);
    }

    public function getCountArticles()
    {
        return $this->countAll();
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
  protected $table = 'categories';
  protected $primaryKey = 'id';
  protected $useAutoIncrement = true;

  protected $returnType = 'array';
  protected $protectFields = true;
  protected $allowedFields = [
    'name',
    'slug',
    'description',
    'status',
  ];

  protected $useTimestamps = true;
  protected $dateFormat = 'datetime';
  protected $createdField = 'created_at';
  protected $updatedField = 'updated_at';
}




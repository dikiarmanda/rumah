<?php

namespace App\Models;

use CodeIgniter\Model;

class PropertyModel extends Model
{
  protected $table = 'properties';
  protected $primaryKey = 'id';
  protected $returnType = 'array';
  protected $allowedFields = [
    'title',
    'description',
    'type',
    'price',
    'address',
    'city',
    'province',
    'certificate',
    'status',
    'publish',
    'bedrooms',
    'bathrooms',
    'carport',
    'building_area',
    'land_area',
    'floors',
    'facilities',
  ];

  protected $useTimestamps = true;
  protected $dateFormat = 'datetime';
  protected $createdField = 'created_at';
  protected $updatedField = 'updated_at';

  public function getData($agent_id = null, $status = null, $kategori = null, $all = false)
  {
    $builder = $this->db->table($this->table . ' p');
    $builder->select('p.*, c.name AS kategori, t.status AS transaksi,
      (CASE WHEN f.id IS NULL THEN 0 ELSE 1 END) AS favorite');
    $builder->join('transactions t', 'p.id = t.property_id', 'left');
    $builder->join('categories c', 'p.type = c.id', 'left');
    $builder->join('favorites f', 'p.id = f.property_id', 'left');
    if (!$all) {
      $builder->where("(t.status != 'Valid' OR t.status IS NULL)");
    }
    if ($agent_id != null) {
      $builder->join('agents a', 'p.id = a.property_id');
      $builder->where('a.agent_id', $agent_id);
    }
    if ($status != null) {
      $builder->where('p.status', $status);
    }
    if ($kategori != null) {
      $builder->where('p.type', $kategori);
    }
    $builder->orderBy('p.publish', 'ASC');
    $builder->orderBy('p.status', 'ASC');
    $builder->orderBy('p.created_at', 'DESC');
    $builder->orderBy('c.name', 'ASC');
    $query = $builder->get();
    $data = $query->getResultArray();

    foreach ($data as $key => $value) {
      $builder = $this->db->table('agents a');
      $builder->select('u.name');
      $builder->join('users u', 'a.agent_id = u.id', 'left');
      $builder->where('a.property_id', $value['id']);
      $query = $builder->get();
      $tempAgents = $query->getResultArray();
      $agents = array_column($tempAgents, 'name');
      $data[$key]['agen'] = implode(';', $agents);

      $builder = $this->db->table('property_images pi');
      $builder->select('pi.*');
      $builder->where('pi.property_id', $value['id']);
      $builder->orderBy('pi.is_primary', 'DESC');
      $query = $builder->get();
      $images = $query->getResultArray();
      $data[$key]['images'] = $images;
    }

    return $data;
  }

  public function getDataById($id)
  {
    $builder = $this->db->table($this->table . ' p');
    $builder->select('p.*, c.name AS kategori, t.status AS transaksi,
      (CASE WHEN f.id IS NULL THEN 0 ELSE 1 END) AS favorite');
    $builder->join('transactions t', 'p.id = t.property_id', 'left');
    $builder->join('categories c', 'p.type = c.id', 'left');
    $builder->join('favorites f', 'p.id = f.property_id', 'left');
    $builder->where('p.id', $id);
    $query = $builder->get();
    $data = $query->getRowArray();

    $builder = $this->db->table('agents a');
    $builder->select('u.name, u.phone, u.location, u.email, u.photo');
    $builder->join('users u', 'a.agent_id = u.id', 'left');
    $builder->where('a.property_id', $data['id']);
    $query = $builder->get();
    $tempAgents = $query->getResultArray();
    $agents = array_column($tempAgents, 'name');
    $data['agen'] = implode(';', $agents);
    $data['agents'] = $tempAgents;

    $builder = $this->db->table('property_images pi');
    $builder->select('pi.*');
    $builder->where('pi.property_id', $data['id']);
    $builder->orderBy('pi.is_primary', 'DESC');
    $query = $builder->get();
    $images = $query->getResultArray();
    $data['images'] = $images;

    return $data;
  }

  public function getDataByAgent($agent_id)
  {
    $builder = $this->db->table('agents a');
    $builder->select('a.property_id');
    $builder->where('a.agent_id', $agent_id);
    $query = $builder->get();
    $tempProperties = $query->getResultArray();
    $property_ids = array_column($tempProperties, 'property_id');
    $properties = $this->getDataWhereIn('id', $property_ids);
  }

  /**
   * Mendapatkan data properti untuk halaman landing jual
   */
  public function getDataForLanding($limit = 6, $offset = 0, $filters = [])
  {
    $builder = $this->db->table($this->table . ' p');
    $builder->select('p.*, c.name AS kategori,
      (CASE WHEN f.id IS NULL THEN 0 ELSE 1 END) AS favorite');
    $builder->join('categories c', 'p.type = c.id', 'left');
    $builder->join('favorites f', 'p.id = f.property_id', 'left');
    $builder->where('p.status', 'dijual');
    $builder->where('p.publish', 1);

    // Filter berdasarkan lokasi
    if (!empty($filters['location'])) {
      $builder->groupStart();
      $builder->like('p.address', $filters['location']);
      $builder->orLike('p.city', $filters['location']);
      $builder->orLike('p.province', $filters['location']);
      $builder->groupEnd();
    }

    // Filter berdasarkan tipe properti
    if (!empty($filters['type'])) {
      $builder->where('p.type', $filters['type']);
    }

    // Filter berdasarkan kamar tidur
    if (!empty($filters['bedrooms'])) {
      if ($filters['bedrooms'] == '4+') {
        $builder->where('p.bedrooms >=', 4);
      } else {
        $builder->where('p.bedrooms', $filters['bedrooms']);
      }
    }

    // Filter berdasarkan rentang harga
    if (!empty($filters['min_price'])) {
      $builder->where('p.price >=', $filters['min_price']);
    }
    if (!empty($filters['max_price'])) {
      $builder->where('p.price <=', $filters['max_price']);
    }

    $builder->orderBy('favorite', 'DESC');
    $builder->orderBy('p.created_at', 'DESC');
    $builder->limit($limit, $offset);

    $query = $builder->get();
    $data = $query->getResultArray();

    // Ambil gambar utama untuk setiap properti
    foreach ($data as $key => $value) {
      $builder = $this->db->table('property_images pi');
      $builder->select('pi.*');
      $builder->where('pi.property_id', $value['id']);
      $builder->where('pi.is_primary', 1);
      $builder->limit(1);
      $query = $builder->get();
      $image = $query->getRowArray();
      $data[$key]['primary_image'] = $image ? $image['image_url'] : 'default.jpg';
    }

    return $data;
  }

  /**
   * Mendapatkan data kategori untuk filter
   */
  public function getCategoriesForFilter()
  {
    $builder = $this->db->table('categories c');
    $builder->select('c.*, COUNT(p.id) as property_count');
    $builder->join('properties p', 'c.id = p.type', 'left');
    $builder->where('c.status', 'aktif');
    $builder->where('p.publish', 1);
    $builder->groupBy('c.id, c.name, c.status');
    $builder->orderBy('c.name', 'ASC');

    return $builder->get()->getResultArray();
  }

  /**
   * Mendapatkan statistik properti untuk halaman jual
   */
  public function getPropertyStats()
  {
    $builder = $this->db->table($this->table);
    $builder->select('
      COUNT(*) as total_properties,
      AVG(price) as average_price,
      MIN(price) as min_price,
      MAX(price) as max_price
    ');
    $builder->where('status', 'dijual');
    $builder->where('publish', 1);

    return $builder->get()->getRowArray();
  }

  /**
   * Mendapatkan data properti untuk halaman sewa (disewakan)
   */
  public function getDataForRental($limit = 6, $offset = 0, $filters = [])
  {
    $builder = $this->db->table($this->table . ' p');
    $builder->select('p.*, c.name AS kategori');
    $builder->join('categories c', 'p.type = c.id', 'left');
    $builder->where('p.status', 'disewakan');
    $builder->where('p.publish', 1);

    // Filter berdasarkan lokasi
    if (!empty($filters['location'])) {
      $builder->groupStart();
      $builder->like('p.address', $filters['location']);
      $builder->orLike('p.city', $filters['location']);
      $builder->orLike('p.province', $filters['location']);
      $builder->groupEnd();
    }

    // Filter berdasarkan tipe properti
    if (!empty($filters['type'])) {
      $builder->where('p.type', $filters['type']);
    }

    // Filter berdasarkan kamar tidur
    if (!empty($filters['bedrooms'])) {
      if ($filters['bedrooms'] == '4+') {
        $builder->where('p.bedrooms >=', 4);
      } else {
        $builder->where('p.bedrooms', $filters['bedrooms']);
      }
    }

    // Filter berdasarkan rentang harga
    if (!empty($filters['min_price'])) {
      $builder->where('p.price >=', $filters['min_price']);
    }
    if (!empty($filters['max_price'])) {
      $builder->where('p.price <=', $filters['max_price']);
    }

    $builder->orderBy('p.created_at', 'DESC');
    $builder->limit($limit, $offset);

    $query = $builder->get();
    $data = $query->getResultArray();

    // Ambil gambar utama untuk setiap properti
    foreach ($data as $key => $value) {
      $builder = $this->db->table('property_images pi');
      $builder->select('pi.*');
      $builder->where('pi.property_id', $value['id']);
      $builder->where('pi.is_primary', 1);
      $builder->limit(1);
      $query = $builder->get();
      $image = $query->getRowArray();
      $data[$key]['primary_image'] = $image ? $image['image_url'] : 'default.jpg';
    }

    return $data;
  }

  /**
   * Mendapatkan data kategori untuk filter sewa
   */
  public function getCategoriesForRentalFilter()
  {
    $builder = $this->db->table('categories c');
    $builder->select('c.*, COUNT(p.id) as property_count');
    $builder->join('properties p', 'c.id = p.type', 'left');
    $builder->where('c.status', 'aktif');
    $builder->where('p.status', 'disewakan');
    $builder->where('p.publish', 1);
    $builder->groupBy('c.id, c.name, c.status');
    $builder->orderBy('c.name', 'ASC');

    return $builder->get()->getResultArray();
  }

  /**
   * Mendapatkan statistik properti sewa
   */
  public function getRentalStats()
  {
    $builder = $this->db->table($this->table);
    $builder->select('
      COUNT(*) as total_properties,
      AVG(price) as average_price,
      MIN(price) as min_price,
      MAX(price) as max_price
    ');
    $builder->where('status', 'disewakan');
    $builder->where('publish', 1);

    return $builder->get()->getRowArray();
  }
}



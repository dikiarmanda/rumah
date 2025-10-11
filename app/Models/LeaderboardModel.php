<?php

namespace App\Models;

use CodeIgniter\Model;

class LeaderboardModel extends Model
{
  protected $table = 'agen_berprestasi';
  protected $primaryKey = 'id';
  protected $useAutoIncrement = true;

  protected $returnType = 'array';
  protected $protectFields = true;
  protected $allowedFields = [
    'agent_id',
    'peringkat',
    'tahun',
    'photo',
    'tampil'
  ];

  protected $useTimestamps = false;

  public function getData($guest = false)
  {
    $builder = $this->db->table($this->table . ' ap');
    $builder->select('ap.*, u.name, u.photo AS photo_agen, u.email, u.phone, u.location');
    $builder->join('users u', 'u.id = ap.agent_id');
    if ($guest) {
      $builder->where('tampil', 1);
    }
    $builder->orderBy('tahun', 'desc');
    $builder->orderBy('peringkat', 'asc');
    return $builder->get()->getResultArray();
  }

  public function setTampil($tahun)
  {
    $builder = $this->db->table($this->table);
    $builder->update(['tampil' => 0]);

    $builder = $this->db->table($this->table);
    $builder->where('tahun', $tahun);
    $builder->update(['tampil' => 1]);

    return true;
  }
}

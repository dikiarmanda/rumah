<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ArticleModel;
use App\Models\ContactModel;
use App\Models\CategoryModel;
use App\Models\PropertyModel;
use App\Controllers\BaseController;

class Jual extends BaseController
{
  protected $userModel;
  protected $contactModel;
  protected $articleModel;
  protected $PropertyModel;
  protected $CategoryModel;

  public function __construct()
  {
    $this->userModel = new UserModel();
    $this->contactModel = new ContactModel();
    $this->articleModel = new ArticleModel();
    $this->PropertyModel = new PropertyModel();
    $this->CategoryModel = new CategoryModel();
  }

  public function index()
  {
    // Ambil filter dari request
    $filters = [
      'location' => $this->request->getGet('location'),
      'type' => $this->request->getGet('type'),
      'bedrooms' => $this->request->getGet('bedrooms'),
      'min_price' => $this->request->getGet('min_price'),
      'max_price' => $this->request->getGet('max_price')
    ];

    // Ambil data properti
    $properties = $this->PropertyModel->getDataForLanding(6, 0, $filters);

    // Ambil data kategori untuk filter
    $categories = $this->PropertyModel->getCategoriesForFilter();

    // Ambil statistik properti
    $stats = $this->PropertyModel->getPropertyStats();

    $articles = $this->articleModel->getDataForLanding(3, 0, []);

    $data = [
      'contact' => $this->contactModel->getData(),
      'properties' => $properties,
      'categories' => $categories,
      'stats' => $stats,
      'filters' => $filters,
      'articles' => $articles,
      'page' => 1
    ];

    return $this->template->displayLanding('jual', $data);
  }

  public function get_ajax()
  {
    // Ambil filter dari request
    $filters = [
      'location' => $this->request->getGet('location'),
      'type' => $this->request->getGet('type'),
      'bedrooms' => $this->request->getGet('bedrooms'),
      'min_price' => $this->request->getGet('min_price'),
      'max_price' => $this->request->getGet('max_price')
    ];

    $page = $this->request->getGet('page') ?? 1;
    $limit = 6;
    $offset = ($page - 1) * $limit;

    // Ambil data properti
    $properties = $this->PropertyModel->getDataForLanding($limit, $offset, $filters);

    return $this->response->setJSON([
      'success' => true,
      'data' => $properties,
      'page' => $page,
      'has_more' => count($properties) == $limit
    ]);
  }

  public function search()
  {
    // Ambil filter dari request
    $filters = [
      'location' => $this->request->getGet('location'),
      'type' => $this->request->getGet('type'),
      'bedrooms' => $this->request->getGet('bedrooms'),
      'min_price' => $this->request->getGet('min_price'),
      'max_price' => $this->request->getGet('max_price')
    ];

    // Ambil data properti dengan filter
    $properties = $this->PropertyModel->getDataForLanding(12, 0, $filters);

    // Ambil data kategori untuk filter
    $categories = $this->PropertyModel->getCategoriesForFilter();

    $data = [
      'contact' => $this->contactModel->getData(),
      'properties' => $properties,
      'categories' => $categories,
      'filters' => $filters,
      'search_results' => true,
      'page' => 1
    ];

    return $this->template->displayLanding('jual', $data);
  }

  public function detail($id)
  {
    $property = $this->PropertyModel->getDataById($id);
    $owner = stripos($property['description'], ';') !== false ? true : false;
    $explode = $owner ? explode(';', $property['description']) : [$property['description'], null];
    $property['description'] = $explode[0];
    $agents = $this->userModel->select('id, name, phone, location, photo')->where('role', 'agen')
    ->orderBy('name', 'random')->findAll();
    
    $data = [
      'contact' => $this->contactModel->getData(),
      'data' => $property,
      'agents' => $agents
    ];
    return $this->template->displayLanding('detail', $data);
  }
}

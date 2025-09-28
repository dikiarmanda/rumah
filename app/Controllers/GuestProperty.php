<?php

namespace App\Controllers;

use App\Models\ContactModel;
use App\Models\WilayahModel;
use App\Models\CategoryModel;
use App\Models\FacilityModel;
use App\Models\PropertyModel;
use App\Models\PropertyImageModel;
use App\Controllers\BaseController;

class GuestProperty extends BaseController
{
  protected $contactModel;
  protected $wilayahModel;
  protected $propertyModel;
  protected $categoryModel;
  protected $facilityModel;
  protected $propertyImageModel;

  public function __construct()
  {
    $this->contactModel = new ContactModel();
    $this->wilayahModel = new WilayahModel();
    $this->propertyModel = new PropertyModel();
    $this->categoryModel = new CategoryModel();
    $this->facilityModel = new FacilityModel();
    $this->propertyImageModel = new PropertyImageModel();
  }

  public function index()
  {
    // Ambil data kategori dan fasilitas untuk form
    $categories = $this->categoryModel->where('status', 'aktif')->findAll();
    $facilities = $this->facilityModel->where('status', 'aktif')->findAll();
    $contact = $this->contactModel->getData();

    $data = [
      'title' => 'Input Properti',
      'subtitle' => 'Masukkan detail properti Anda',
      'categories' => $categories,
      'facilities' => $facilities,
      'provinsi' => $this->wilayahModel->where('level', 'provinsi')->findAll(),
      'kota' => $this->wilayahModel->where('level', 'kabupaten')->findAll(),
      'contact' => $contact,
      'validation' => \Config\Services::validation()
    ];

    return $this->template->displayLanding('guest_property', $data);
  }

  public function submit()
  {
    // Validasi input
    $rules = [
      'title' => 'required|min_length[10]|max_length[200]',
      'description' => 'required|min_length[20]',
      'type' => 'required',
      'address' => 'required|min_length[10]',
      'city' => 'required',
      'province' => 'required',
      'certificate' => 'required',
      'status' => 'required',
      'owner_name' => 'required',
      'owner_phone' => 'required|min_length[10]',
      'owner_email' => 'required|valid_email'
    ];

    if (!$this->validate($rules)) {
      session()->setFlashdata([
        'title' => 'Validasi Gagal',
        'icon' => 'error',
        'text' => implode("\n", array_values($this->validator->getErrors())),
      ]);
      return redirect()->to(base_url('jual-rumah'))
        ->withInput()->with('validation', $this->validator);
    }

    // step 1
    $title = $this->request->getPost('title');
    $price = str_replace('.', '', $this->request->getPost('price'));
    $type = $this->request->getPost('type');
    $status = $this->request->getPost('status');
    $province = $this->request->getPost('province');
    $city = $this->request->getPost('city');
    $address = $this->request->getPost('address');
    $certificate = $this->request->getPost('certificate');
    // step 2
    $bedrooms = defaultValue($this->request->getPost('bedrooms'), 0);
    $bathrooms = defaultValue($this->request->getPost('bathrooms'), 0);
    $carport = defaultValue($this->request->getPost('carport'), 0);
    $building_area = defaultValue($this->request->getPost('building_area'), 0);
    $land_area = defaultValue($this->request->getPost('land_area'), 0);
    $floors = defaultValue($this->request->getPost('floors'), 0);
    // step 3
    $tempFasilitas = defaultValue($this->request->getPost('facilities'), []);
    $facilities = implode(',', $tempFasilitas);
    $images = defaultValue($this->request->getFileMultiple('images'), []);
    // step 4
    $description = $this->request->getPost('description');
    $owner_details = implode(', ', [
      $this->request->getPost('owner_name'),
      $this->request->getPost('owner_phone'),
      $this->request->getPost('owner_email')
    ]);
    $description = $description . ";" . $owner_details;

    $propertyData = [
      'title' => $title,
      'price' => $price,
      'type' => $type,
      'status' => $status,
      'province' => $province,
      'city' => $city,
      'address' => $address,
      'certificate' => $certificate,
      'bedrooms' => $bedrooms,
      'bathrooms' => $bathrooms,
      'carport' => $carport,
      'building_area' => $building_area,
      'land_area' => $land_area,
      'floors' => $floors,
      'facilities' => $facilities,
      'description' => $description,
      'publish' => 0,
    ];

    // Simpan ke database
    if ($this->propertyModel->insert($propertyData)) {
      $propertyId = $this->propertyModel->getInsertID();

      $fileName = $this->request->getPost('tipe');
      $uploaded = uploadPropertyImages($images, $propertyId, $fileName);

      // contoh simpan ke DB
      foreach ($uploaded as $key => $imgUrl) {
        $this->propertyImageModel->insert([
          'property_id' => $propertyId,
          'image_url' => $imgUrl,
          'is_primary' => $key == 0 ? 1 : 0,
        ]);
      }
      session()->setFlashdata([
        'title' => 'Properti berhasil disubmit',
        'icon' => 'success',
        'text' => 'Properti Anda telah berhasil disubmit dan sedang dalam proses verifikasi.'
      ]);
      return redirect()->to('jual-rumah/success');
    } else {
      session()->setFlashdata([
        'title' => 'Properti gagal disubmit',
        'icon' => 'error',
        'text' => 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.'
      ]);
      return redirect()->to('jual-rumah');
    }
  }

  public function success()
  {
    $contact = $this->contactModel->getData();

    $data = [
      'title' => 'Terima Kasih',
      'subtitle' => 'Properti Anda telah berhasil disubmit',
      'contact' => $contact
    ];

    return $this->template->displayLanding('guest_property_success', $data);
  }
}

<?php

namespace App\Controllers;

use App\Models\RegionModel;

class Region extends BaseController
{
    protected $regionModel;

    public function __construct() {
        $this->regionModel = new RegionModel();
    }

    public function index() {
        $data = [
            'title'   => 'Daftar Wilayah (Regions)',
            'regions' => $this->regionModel->findAll()
        ];
        return view('Region/index', $data);
    }

    public function store() {
        $this->regionModel->save(['name' => $this->request->getPost('name')]);
        return redirect()->to('/region')->with('success', 'Wilayah berhasil ditambahkan.');
    }

    public function delete($id) {
        $this->regionModel->delete($id);
        return redirect()->to('/region')->with('success', 'Wilayah berhasil dihapus.');
    }
}
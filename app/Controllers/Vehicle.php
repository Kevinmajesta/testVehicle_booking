<?php

namespace App\Controllers;

use App\Models\VehicleModel;
use App\Models\RegionModel;

class Vehicle extends BaseController
{
    protected $vehicleModel;

    public function __construct()
    {
        $this->vehicleModel = new VehicleModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Kendaraan',
            'vehicles' => $this->vehicleModel->getVehicles()
        ];
        return view('Vehicle/index', $data);
    }

    public function create()
    {
        $regionModel = new \App\Models\RegionModel();
        $data = [
            'title' => 'Tambah Kendaraan',
            'regions' => $regionModel->findAll()
        ];
        return view('Vehicle/create', $data);
    }

    public function store()
    {
        if (
            !$this->validate([
                'model' => 'required',
                'plate_number' => 'required|is_unique[vehicles.plate_number]',
            ])
        ) {
            return redirect()->back()->withInput()->with('error', 'Data tidak valid atau Plat Nomor sudah ada.');
        }

        $this->vehicleModel->save([
            'model' => $this->request->getPost('model'),
            'plate_number' => $this->request->getPost('plate_number'),
            'type' => $this->request->getPost('type'),
            'ownership' => $this->request->getPost('ownership'),
            'region_id' => $this->request->getPost('region_id'),
        ]);

        return redirect()->to(base_url('vehicle'))->with('success', 'Kendaraan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $regionModel = new \App\Models\RegionModel();
        $data = [
            'title' => 'Edit Kendaraan',
            'vehicle' => $this->vehicleModel->find($id),
            'regions' => $regionModel->findAll()
        ];
        return view('Vehicle/edit', $data);
    }

    public function update($id)
    {
        if (
            !$this->validate([
                'model' => 'required',
                'plate_number' => "required|is_unique[vehicles.plate_number,id,{$id}]", 
            ])
        ) {
            return redirect()->back()->withInput()->with('error', 'Data tidak valid atau Plat Nomor sudah digunakan.');
        }

        $this->vehicleModel->update($id, [
            'model' => $this->request->getPost('model'),
            'plate_number' => $this->request->getPost('plate_number'),
            'type' => $this->request->getPost('type'),
            'ownership' => $this->request->getPost('ownership'),
            'region_id' => $this->request->getPost('region_id'),
        ]);

        return redirect()->to(base_url('vehicle'))->with('success', 'Data berhasil diupdate');
    }

    public function delete($id)
    {
        $this->vehicleModel->delete($id);
        return redirect()->to(base_url('vehicle'))->with('success', 'Data berhasil dihapus');
    }
}
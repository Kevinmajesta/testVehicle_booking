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
        $vehicleLogModel = new \App\Models\VehicleLogModel();

        $data = [
            'title' => 'Daftar Kendaraan',
            'vehicles' => $this->vehicleModel->getVehicles(),
            // Mengambil semua log untuk ditampilkan di modal/halaman
            'vehicle_logs' => $vehicleLogModel->findAll()
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
        $vehicleLogModel = new \App\Models\VehicleLogModel(); // Tambahkan ini

        $data = [
            'title' => 'Edit & Monitoring Kendaraan',
            'vehicle' => $this->vehicleModel->find($id),
            'regions' => $regionModel->findAll(),
            'logs' => $vehicleLogModel->where('vehicle_id', $id)
                ->orderBy('date_logged', 'DESC')
                ->findAll()
        ];

        if (!$data['vehicle']) {
            return redirect()->to(base_url('vehicle'))->with('error', 'Kendaraan tidak ditemukan.');
        }

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

    public function saveLog()
    {
        $model = new \App\Models\VehicleLogModel();

        $vehicleId = $this->request->getPost('vehicle_id');

        $model->save([
            'vehicle_id' => $vehicleId,
            'log_type' => $this->request->getPost('type'),
            'description' => $this->request->getPost('description'),
            'fuel_consumption' => $this->request->getPost('amount') ?: 0,
            'date_logged' => $this->request->getPost('date'),
        ]);

        return redirect()->to(base_url('vehicle'))->with('success', 'Data monitoring berhasil disimpan');
    }

    public function detail($id)
    {
        $vehicleLogModel = new \App\Models\VehicleLogModel();
        $bookingModel = new \App\Models\BookingModel();

        $data = [
            'vehicle' => $this->vehicleModel->getVehiclesById($id),
            'logs' => $vehicleLogModel->where('vehicle_id', $id)->orderBy('date_logged', 'DESC')->findAll(),
            'usage_history' => $bookingModel->select('bookings.*, drivers.name as driver_name')
                ->join('drivers', 'drivers.id = bookings.driver_id')
                ->where('vehicle_id', $id)
                ->where('bookings.status', 'Approved')
                ->findAll()
        ];

        return view('Vehicle/detail', $data);
    }

    public function delete($id)
    {
        $this->vehicleModel->delete($id);
        return redirect()->to(base_url('vehicle'))->with('success', 'Data berhasil dihapus');
    }
}
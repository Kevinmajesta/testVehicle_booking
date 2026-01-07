<?php

namespace App\Controllers;

use App\Models\DriverModel;


class Driver extends BaseController
{
    protected $driverModel;

    public function __construct()
    {
        $this->driverModel = new DriverModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Driver',
            'drivers' => $this->driverModel->findAll()
        ];
        return view('Driver/index', $data);
    }

    public function create()
    {
        return view('Driver/create', ['title' => 'Tambah Driver']);
    }

    public function store()
    {
        $this->driverModel->save($this->request->getPost());
        return redirect()->to(base_url('driver'))->with('success', 'Driver berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Driver',
            'driver' => $this->driverModel->find($id)
        ];

        if (!$data['driver']) {
            return redirect()->to(base_url('driver'))->with('error', 'Data driver tidak ditemukan.');
        }

        return view('Driver/edit', $data);
    }

    public function update($id)
    {
        if (
            !$this->validate([
                'name' => 'required',
                'status' => 'required'
            ])
        ) {
            return redirect()->back()->withInput()->with('error', 'Mohon isi semua field dengan benar.');
        }

        $this->driverModel->update($id, [
            'name' => $this->request->getPost('name'),
            'status' => $this->request->getPost('status'),
        ]);

        return redirect()->to(base_url('driver'))->with('success', 'Data driver berhasil diupdate');
    }

    public function delete($id)
    {
        $this->driverModel->delete($id);
        return redirect()->to(base_url('driver'))->with('success', 'Driver berhasil dihapus');
    }
}
<?php

namespace App\Controllers;

use App\Models\BookingModel;
use App\Models\VehicleModel;
use App\Models\DriverModel;
use App\Models\UserModel; // Pastikan kamu punya model User

class Booking extends BaseController
{
    protected $bookingModel;

    public function __construct()
    {
        $this->bookingModel = new BookingModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Pemesanan',
            'bookings' => $this->bookingModel->getFullBookingData()
        ];
        return view('Booking/index', $data);
    }

    public function create()
    {
        $vehicleModel = new VehicleModel();
        $driverModel = new DriverModel();
        $userModel = new UserModel();

        $data = [
            'title' => 'Buat Pesanan Baru',
            'vehicles' => $vehicleModel->findAll(),
            'drivers' => $driverModel->where('status', 'Tersedia')->findAll(),
            'approvers' => $userModel->where('role !=', 'admin')->findAll() // Hanya non-admin
        ];
        return view('Booking/create', $data);
    }

    public function store()
    {
        $userId = session()->get('user_id');

        // Pastikan format tanggal datetime-local dibersihkan dari huruf 'T'
        $start = str_replace('T', ' ', $this->request->getPost('start_date'));
        $end = str_replace('T', ' ', $this->request->getPost('end_date'));

        $data = [
            'user_id' => $userId,
            'vehicle_id' => $this->request->getPost('vehicle_id'),
            'driver_id' => $this->request->getPost('driver_id'),
            'approver_1_id' => $this->request->getPost('approver_1_id'),
            'approver_2_id' => $this->request->getPost('approver_2_id'),
            'start_date' => $start,
            'end_date' => $end,
            'status' => 'Pending'
        ];

        if (!$this->bookingModel->insert($data)) {
            dd($this->bookingModel->errors());
        }

        return redirect()->to(base_url('booking'))->with('success', 'Pesanan berhasil dibuat!');
    }

    public function edit($id)
    {
        $vehicleModel = new \App\Models\VehicleModel();
        $driverModel = new \App\Models\DriverModel();
        $userModel = new \App\Models\UserModel();

        $data = [
            'title' => 'Edit Pemesanan',
            'booking' => $this->bookingModel->find($id),
            'vehicles' => $vehicleModel->findAll(),
            'drivers' => $driverModel->findAll(),
            'approvers' => $userModel->where('role !=', 'admin')->findAll()
        ];

        if (!$data['booking']) {
            return redirect()->to(base_url('booking'))->with('error', 'Data tidak ditemukan.');
        }

        return view('Booking/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'vehicle_id' => $this->request->getPost('vehicle_id'),
            'driver_id' => $this->request->getPost('driver_id'),
            'approver_1_id' => $this->request->getPost('approver_1_id'),
            'approver_2_id' => $this->request->getPost('approver_2_id'),
            'start_date' => str_replace('T', ' ', $this->request->getPost('start_date')),
            'end_date' => str_replace('T', ' ', $this->request->getPost('end_date')),
        ];

        $this->bookingModel->update($id, $data);
        return redirect()->to(base_url('booking'))->with('success', 'Pesanan berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->bookingModel->delete($id);
        return redirect()->to(base_url('booking'))->with('success', 'Pesanan berhasil dihapus.');
    }

    public function approvalList()
    {
        $userId = session()->get('user_id');

        if (!$userId) {
            return redirect()->to(base_url('login'));
        }

        $data = [
            'title' => 'Daftar Persetujuan',
            'bookings' => $this->bookingModel
                ->groupStart()
                ->where('approver_1_id', $userId)
                ->orWhere('approver_2_id', $userId)
                ->groupEnd()
                ->getFullBookingData()
        ];
        return view('Booking/approval_list', $data);
    }

    public function approveAction($id, $level)
    {
        $userId = session()->get('user_id');
        $status = ($level == 1) ? 'Waiting Level 2' : 'Approved';

        // 1. Update status di tabel utama bookings
        $this->bookingModel->update($id, ['status' => $status]);

        // 2. Simpan jejak ke tabel approvals
        $db = \Config\Database::connect();
        $db->table('approvals')->insert([
            'booking_id' => $id,
            'approver_id' => $userId,
            'level' => $level,
            'status' => 'Approved',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to(base_url('booking/approval'))->with('success', 'Persetujuan berhasil dicatat.');
    }
    
    public function detail($id)
    {
        $booking = $this->bookingModel->getDetailBooking($id); // Kita buat fungsi ini di model

        if (!$booking) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title' => 'Detail Pemesanan #' . $id,
            'booking' => $booking
        ];

        return view('Booking/detail', $data);
    }


    public function export()
    {
        // Mengambil semua data booking yang sudah di-join
        $data['bookings'] = $this->bookingModel->getFullBookingData();

        // Memberitahu browser bahwa ini adalah file Excel
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Laporan_Pemesanan_Kendaraan.xls");

        return view('Booking/export_excel', $data);
    }

}
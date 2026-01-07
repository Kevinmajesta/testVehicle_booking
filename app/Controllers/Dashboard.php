<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        $data['total_pending'] = $db->table('bookings')->where('status', 'Pending')->countAllResults();
        $data['total_approved'] = $db->table('bookings')->where('status', 'Approved')->countAllResults();
        $data['total_vehicle'] = $db->table('vehicles')->countAllResults();

        $query = $db->query("SELECT v.model as label, COUNT(b.id) as y 
                     FROM vehicles v 
                     LEFT JOIN bookings b ON v.id = b.vehicle_id 
                     GROUP BY v.id");
        $data['chart_results'] = $query->getResultArray();

        return view('dashboard/index', $data);
    }
    public function logout()
    {
        session()->destroy();

        return redirect()->to(base_url('login'))->with('success', 'Anda telah berhasil logout.');
    }
}

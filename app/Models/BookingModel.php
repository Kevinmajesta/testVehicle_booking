<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table = 'bookings';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id',
        'vehicle_id',
        'driver_id',
        'approver_1_id',
        'approver_2_id',
        'start_date',
        'end_date',
        'status'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = '';

    public function getFullBookingData()
    {
        return $this->select('bookings.*, vehicles.model as vehicle_name, drivers.name as driver_name, u1.username as approver_1, u2.username as approver_2, users.username as username')
            ->join('vehicles', 'vehicles.id = bookings.vehicle_id', 'left')
            ->join('drivers', 'drivers.id = bookings.driver_id', 'left')
            ->join('users', 'users.id = bookings.user_id', 'left') 
            ->join('users u1', 'u1.id = bookings.approver_1_id', 'left')
            ->join('users u2', 'u2.id = bookings.approver_2_id', 'left')
            ->findAll();
    }
}
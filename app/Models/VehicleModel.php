<?php

namespace App\Models;

use CodeIgniter\Model;

class VehicleModel extends Model
{
    protected $table = 'vehicles';
    protected $primaryKey = 'id';
    protected $allowedFields = ['model', 'plate_number', 'type', 'ownership', 'region_id'];

    public function getVehicles()
    {
        // Melakukan join agar kita bisa mengambil nama wilayah
        return $this->select('vehicles.*, regions.name as region_name')
                    ->join('regions', 'regions.id = vehicles.region_id', 'left')
                    ->findAll();
    }
}
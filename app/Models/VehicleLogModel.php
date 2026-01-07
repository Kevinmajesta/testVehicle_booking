<?php
namespace App\Models;
use CodeIgniter\Model;

class VehicleLogModel extends Model
{
    protected $table = 'vehicle_logs';
    protected $allowedFields = ['vehicle_id', 'log_type', 'description', 'fuel_consumption', 'date_logged'];
}
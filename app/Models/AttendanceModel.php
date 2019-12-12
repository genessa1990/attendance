<?php namespace App\Models;
use CodeIgniter\Model;

class AttendanceModel extends Model
{
    protected $table = 'attendancetable';
    protected $allowedFields = ['student_id','status','date_attendance'];
}
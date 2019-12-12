<?php namespace App\Models;
use CodeIgniter\Model;

class StudentsModel extends Model
{
    protected $table = 'students';
    protected $allowedFields = ['student_id','firstname','lastname','block','student_num'];
}
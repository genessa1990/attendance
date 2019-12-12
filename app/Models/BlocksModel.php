<?php namespace App\Models;
use CodeIgniter\Model;

class BlocksModel extends Model
{
    protected $table = 'blocks';
    protected $allowedFields = ['block'];
}
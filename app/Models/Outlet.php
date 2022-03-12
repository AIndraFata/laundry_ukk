<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    protected $table = 'outlet';
    public $timestamps = false;
    protected $primarykey = 'id';

    protected $fillable = ['nama_outlet', 'alamat', 'no_telp_outlet'];
}

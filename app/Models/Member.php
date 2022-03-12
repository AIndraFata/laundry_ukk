<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'member';
    public $timestamps = false;
    protected $primarykey = 'id';

    protected $fillable = ['nama', 'alamat', 'jenis_kelamin', 'no_telp'];
}

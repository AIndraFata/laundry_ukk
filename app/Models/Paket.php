<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'paket';
    public $timestamps = false;
    protected  $primarykey = 'id';

    protected $fillable = ['jenis', 'harga'];
}

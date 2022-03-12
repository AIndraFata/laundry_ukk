<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detil_transaksi extends Model
{
    protected $table = 'detil_transaksi';
    public $timestamps = false;
    protected $primarykey ='id';

    protected $fillable = ['id_transaksi', 'id_paket', 'qty'];
}

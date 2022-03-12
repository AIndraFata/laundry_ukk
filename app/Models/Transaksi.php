<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    public $timestamps = false;
    protected $primarykey = 'id';

    protected $fillable = ['id_member', 'id_outlet', 'tgl', 
                            'batas_waktu', 'tgl_bayar', 'status', 
                            'pembayaran', 'id_user'];
}

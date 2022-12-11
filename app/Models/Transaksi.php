<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $fillable = ['money_in', 'money_out', 'keterangan', 'siswa_id'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}

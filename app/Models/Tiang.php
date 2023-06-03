<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiang extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'tiang_master';

    protected $fillable = ['kode_tiang', 'name', 'provinsi', 'kabupaten', 'kecamatan', 'desa', 'alamat', 'maps', 'description', 'id_users_add'];

    protected $hidden = [];
}

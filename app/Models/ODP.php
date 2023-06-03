<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ODP extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'odp_master';

    protected $fillable = ['kode_odp', 'name', 'provinsi', 'kabupaten', 'kecamatan', 'desa', 'alamat', 'maps', 'description', 'id_users_add'];

    protected $hidden = [];
}

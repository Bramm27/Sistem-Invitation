<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;
    protected $table = 'guests'; // Sesuaikan dengan nama tabel di database
    protected $fillable = ['name', 'number_phone', 'company_name', 'respons']; // Isi sesuai kolom yang dapat diisi
}

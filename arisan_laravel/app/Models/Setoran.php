<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setoran extends Model
{
	protected $fillable = ['id_peserta','nm_peserta','jml_setoran','tgl_setoran'];
    use HasFactory;
}

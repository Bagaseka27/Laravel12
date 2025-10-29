<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Fctories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    use HasFactory;

    protected $table = 'kategori';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nama_kategori',
    ];
}

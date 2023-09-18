<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use HasFactory;
    // burada protected ile tablo adini, pk, tabloya doldurulacak larini yaziyoruz
    protected $table = "Companies";
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'address', 'phone', 'email', 'logo', 'web_site',];
}
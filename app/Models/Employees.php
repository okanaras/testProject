<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;
    // burada protected ile tablo adini, pk, tabloya doldurulacak larini yaziyoruz
    protected $table = "Employees";
    protected $primaryKey = "id";
    protected $fillable = ["id", "comp_id", "first_name", "last_name", "email", "phone", "created_at", "updated_at"];
}
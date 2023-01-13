<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = ['ten_TH','tinhtrang_TH'];
    protected $primaryKey = 'ma_TH';
    protected $table = 'thuonghieu';
}

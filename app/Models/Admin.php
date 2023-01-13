<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $fillable = ['ten_AM','email_AM','matkhau_AM','chucvu','diachi_AM','sdt_AM'];
    protected $primaryKey = 'ma_AM';
    protected $table = 'admin';
}

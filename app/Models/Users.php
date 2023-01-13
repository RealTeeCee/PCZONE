<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $fillable = ['ten_KH','email_KH','password','diachi_KH','sdt_KH','gioitinh_KH','avarta_KH'];
    protected $primaryKey = 'ma_KH';
    protected $table = 'khachhang';


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;
    protected $fillable = ['ten_KH','email_KH','sdt_KH','ghichu','diachi_GH'];
    protected $primaryKey = 'ma_GH';
    const CREATED_AT = 'ngaybatdau_GH';
    const UPDATED_AT = 'ngayhoantat_GH';
    protected $table = 'giaohang';
}

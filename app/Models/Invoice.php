<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = ['so_DH','soluong','tongtien'];
    protected $primaryKey = 'ma_DH';
    protected $foreignKey = ['ma_KH','ma_GH'];
    protected $table = 'donhang';
    const CREATED_AT = 'ngaytao';
    const UPDATED_AT = 'ngayhoantat';

    public function user(){
        return $this->belongsTo(Users::class,'ma_KH');
    }

    public function shipping(){
        return $this->belongsTo(Shipping::class,'ma_GH');
    }
}

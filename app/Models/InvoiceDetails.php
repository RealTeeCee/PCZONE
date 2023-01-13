<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetails extends Model
{
    use HasFactory;
    protected $fillable = ['hinh_SP','ten_SP','loai_SP','soluong_CT','tongsotien_CT'];
    protected $primaryKey ='ma_DHCT';
    protected $foreignKey = ['ma_DH','ma_SP'];
    const CREATED_AT = 'ngaytao';
    const UPDATED_AT = 'ngayhoanthanh';
    protected $table = 'donhang_chitiet';


}

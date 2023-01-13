<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $timestamp = true;
    protected $fillable = ['ten_SP','gia_SP',
    'product_sku','slug_SP','sort_mota_SP',
    'mota_SP','hinh_SP','tinhtrang_SP','product_isHot','product_isNew','product_inStock',
    'component'];
    protected $foreignKey = ['ma_PL','ma_TH','spec_ram','spec_cpu','spec_keyboard','spec_vga','spec_psu','spec_storage','spec_motherboard','spec_headphone','spec_mouse'];
    protected $primaryKey = 'ma_SP';
    protected $table = 'san_pham';

    public function brands(){
        return $this->belongsTo(Brand::class,'ma_TH');
    }

    public function categories(){
        return $this->belongsTo(Category::class,'ma_PL');
    }

    public function ram(){
        return $this->belongsTo(Product::class,'spec_ram');
    }

    public function cpu(){
        return $this->belongsTo(Product::class,'spec_cpu');
    }

    public function keyboard(){
        return $this->belongsTo(Product::class,'spec_keyboard');
    }

    public function vga(){
        return $this->belongsTo(Product::class,'spec_vga');
    }

    public function psu(){
        return $this->belongsTo(Product::class,'spec_psu');
    }

    public function storage(){
        return $this->belongsTo(Product::class,'spec_storage');
    }

    public function motherboard(){
        return $this->belongsTo(Product::class,'spec_motherboard');
    }

    public function headphone(){
        return $this->belongsTo(Product::class,'spec_headphone');
    }


}




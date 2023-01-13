<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['ten_PL','tinhtrang_PL'];
    protected $primaryKey = 'ma_PL';
    protected $table = 'phanloai';

    public function categoryChildren(){
        return $this->hasMany(Category::class,'parent_id');
    }
}

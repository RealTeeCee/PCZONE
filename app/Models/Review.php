<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = ['ma_KH','ma_SP','comment','rating'];
    protected $primaryKey = 'ma_BL';
    protected $table = 'binhluan';

    public function user(){
        return $this->belongsTo(Users::class, 'ma_KH');
    }
}

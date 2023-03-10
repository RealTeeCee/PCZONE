<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;
    protected $fillable = ['provider_id','provider'];
    protected $primaryKey = 'social_id';
    protected $foreignKey = ['user_id'];
    protected $table = 'socials';

    public function login(){
       return $this->belongsTo(Users::class,'ten_KH');
    }
}

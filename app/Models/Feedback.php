<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    public $incrementing = true;
    protected $fillable = ['feed_name','feed_title', 'feed_content', 'feed_phone',
                                                'feed_status', 'feed_email','feed_rep'];
    protected $primaryKey = 'faq_id';
    protected $table = "feedbacks";
}

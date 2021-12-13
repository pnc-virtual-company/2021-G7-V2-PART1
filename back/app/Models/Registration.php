<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;
    protected $fillable=["user_id","event_id"];


    public function User(){
        return $this->belongsTo(User::class);

    }
    public function Event(){
        return $this->belongsTo(Event::class);
    }
}

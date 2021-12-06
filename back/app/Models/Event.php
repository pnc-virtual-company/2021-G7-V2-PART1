<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillale = ['eventName','start_time', 'end_time', 'start_date', 'end_date', 'image','city', 'country', 'participants', 'discription'];

    public function getDate ($date) {
        return Carbon::parse($date)->format('d-m-Y');
    }

    public function crateDate ($date) {
        return Carbon::parse($date)->format('d-m-Y');
    }

    public function getTime ($time) {
        return Carbon::parse($time)->format('H:i');
    }

    public function crateTime ($time) {
        return Carbon::parse($time)->format('H:i');
    }

    
    
    // public function category() {
    //     return $this->belongsTo(Category::class);
    // }
}

<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Event extends Model
{
    use HasFactory;
    protected $fillale = ['eventName' , 'start_date', 'end_date', 'city', 'country', 'participants', 'category', 'description'];
    protected $hidden = ['created_at', 'updated_at'];
    public function getDate ($date) {
        return Carbon::parse($date)->format('d-m-Y');
    }
    public function crateDate ($date) {
        return Carbon::parse($date)->format('d-m-Y');
    }
}

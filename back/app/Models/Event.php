<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Event extends Model
{
    use HasFactory;
    protected $fillable = ['eventName' , 'start_date', 'end_date', 'city', 'country', 'participants', 'description'];

    protected $hidden = ['created_at', 'updated_at'];

    // public function getDate ($date) {
    //     return Carbon::parse($date)->format('d-m-Y');
    // }
    // public function crateDate ($date) {
    //     return Carbon::parse($date)->format('d-m-Y');
    // }
    
    public function Category(){
        return $this->belongsTo(Category::class);
    }
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Registration(){
        return $this->hasMany(Registration::class);
    }
  

}

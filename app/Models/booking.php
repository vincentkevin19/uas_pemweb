<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    protected $with = ['facility','User'];

    public function facility(){
        return $this->belongsTo(facility::class,'facility_id');
    }
    public function User(){
        return $this->belongsTo(User::class, 'user_id');
    }

}

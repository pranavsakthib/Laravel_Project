<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentForm extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'firstname', 'lastname', 'email','standard_id', 'phone', 'gender', 'dob', 'address'
    ];
    
    protected $table = 'studentstable';

    public function standard()
    {
        // return $this->belongsTo(Standard::class, 'standard_id');
        return $this->belongsTo(Standard::class);
    }

}
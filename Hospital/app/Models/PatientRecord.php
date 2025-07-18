<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientRecord extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'report_file', 'medications', 'past_record'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}


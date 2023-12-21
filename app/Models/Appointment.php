<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    /**
     * 
     * 
     * @var string
     * 
     */

    //protected $primaryKey = 'appointment_id';

    protected $fillable = [
        'reason',
        'desc',
        'begin',
        'start',
        'end',
        'session',
        'date_at',
        'date_end',
        'hour',
        'hour_end'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}

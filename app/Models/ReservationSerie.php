<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationSerie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'allow_participation',
        'allow_anon_participation',
        'repeat_type',
        'repeat_options',
        'created_by',
        'updated_by',
        'owned_by',
    ];

    public function reservationInstance()
    {
        return $this->hasMany(ReservationInstance::class);
    }  

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }   

    public function owner()
    {
        return $this->belongsTo(User::class, 'owned_by');
    }

    public function instance()
    {
        return $this->hasMany(ReservationInstance::class);
    }

    public function reservationResource()
    {
        return $this->hasMany(ReservationResource::class);
    }
}


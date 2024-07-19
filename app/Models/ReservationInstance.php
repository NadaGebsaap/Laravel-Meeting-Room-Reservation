<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationInstance extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'end_date',
        'reference_number',
        'reservation_series_id',
    ];

    public function reservationSerie()
    {
        return $this->belongsTo(ReservationSerie::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationResource extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_series_id',
        'resource_id',
    ];

    /**
     * Get the reservation series that owns the reservation resource.
     */
    public function reservationSeries()
    {
        return $this->belongsTo(ReservationSerie::class);
    }

    /**
     * Get the resource that owns the reservation resource.
     */
    public function resource()
    {
        return $this->belongsTo(Resource::class);
    }
}

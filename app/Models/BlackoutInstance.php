<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlackoutInstance extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'end_date',
        'blackout_series_id',
    ];

    public function blackoutSeries()
    {
        return $this->belongsTo(BlackoutSeries::class, 'blackout_series_id');
    }
}

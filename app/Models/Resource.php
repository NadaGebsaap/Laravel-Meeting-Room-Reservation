<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'description',
        'location',
        'min_notice_duration',
        'max_notice_duration',
        'min_booking_duration',	
        'max_booking_duration',
        'schedule_id',
    ];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($record) {
            if ($record->isDirty('image')) {
                $oldImagePath = $record->getOriginal('image');
                self::deleteImage($oldImagePath);
            }
        });

        static::deleting(function ($record) {
            $imagePath = $record->image;
            self::deleteImage($record->image);
        });
    }

    public static function deleteImage($imagePath)
    {
        if ($imagePath) {
            Storage::disk('public')->delete($imagePath);
        }
    }

    public function scheduleLayout()
    {
        return $this->belongsTo(ScheduleLayout::class);
    }
}

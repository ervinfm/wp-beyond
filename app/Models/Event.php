<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [ 'title', 'slug', 'description', 'speaker_name', 'speaker_title', 'speaker_image', 'event_date', 'status', 'registration_link', 'video_recording_url' ];
    protected $casts = [ 'event_date' => 'datetime' ];
}

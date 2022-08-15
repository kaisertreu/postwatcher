<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use App\Website;

class Comic extends Model
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'url_id',
        'slug',
        'chapter',
        'reading_status',
        'publication_status',
        'note',
        'rating',
    ];


    public function link()
    {
        return $this->belongsTo(Website::class, 'url_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

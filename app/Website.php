<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comic;

class Website extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['url'];


    public function link()
    {
        return $this->hasMany(Comic::class, 'url_id');
    }
}

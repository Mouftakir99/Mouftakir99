<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name_website',
        'logo_website',
        'favicon_website',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}

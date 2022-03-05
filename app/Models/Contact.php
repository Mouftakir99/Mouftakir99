<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name_contact',
        'email_contact',
        'subject_contact',
        'message_contact',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }


}

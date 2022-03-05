<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Education extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name_education',
        'statut_education',
        'description_education',
        'start_education',
        'end_education',
        'user_id'
    ];

     /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'start_education' => 'date',
        'end_education' => 'date',
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExtraSkill extends Model
{
    use HasFactory;


      /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name_extra_skill',
        'desciption_extra_skill',
        'pourcentage_extra_skill',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}

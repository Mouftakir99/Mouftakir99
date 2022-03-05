<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
       'name_reference',
       'poste_reference',
       'company_reference',
       'description_reference',
       'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}

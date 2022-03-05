<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portefolio extends Model
{
    use HasFactory;

      /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name_website',
        'poste_website',
        'link_website',
        'photo_website',
        'user_id'
     ];

     public function user(){
         return $this->belongsTo(User::class);
     }
}

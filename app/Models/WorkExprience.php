<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkExprience extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name_work_exprience',
        'statut_work_exprience',
        'description_work_exprience',
        'start_work_exprience',
        'end_work_exprience',
        'user_id'
    ];

       /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'start_work_exprience' => 'date',
        'end_work_exprience' => 'date',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}

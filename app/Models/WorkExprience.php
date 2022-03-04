<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}

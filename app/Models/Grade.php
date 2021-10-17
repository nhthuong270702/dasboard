<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


class Grade extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table='grades';
    protected $fillable = [
        'id','name'
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Resources\StudentResource;

class Student extends Model
{
    use SoftDeletes;
    protected $table='students';
    protected $fillable = [
        'id','name'
    ];

    public function grades()
    {
        return $this->belongsToMany(Student::class);
    }
}

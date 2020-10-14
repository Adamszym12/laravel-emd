<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];

    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}

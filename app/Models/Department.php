<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;
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

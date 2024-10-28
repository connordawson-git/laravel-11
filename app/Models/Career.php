<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Career extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'careers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'salary',
    ];


    public static function find( int $id):array
    {
        $career = Arr::first(static::all(), fn($career) => $career['id'] == $id);
        if(!$career){
            abort(404);
        }else{
            return $career;
        }
    }
}

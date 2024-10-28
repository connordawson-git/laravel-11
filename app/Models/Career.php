<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Career
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'salary',
    ];

    public static function all(): array
    {
        return  [
            [
                'id' => 1,
                'title' => 'Developer',
                'salary' => '£40000'
            ],
            [
                'id' => 2,
                'title' => 'Senior Developer',
                'salary' => '£60000'
            ],
            [
                'id' => 3,
                'title' => 'Project Manager',
                'salary' => '£35000'
            ]
        ];
    }

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

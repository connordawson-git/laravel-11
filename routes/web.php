<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/careers', function () {
    return view('careers', [
        'careers' => [
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
            ],

        ]
    ]);
});

Route::get('/careers/{id}', function ($id) {
    $careers = [
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
   $career = Arr::first($careers, fn($career) => $career['id'] == $id);

    return view('career', ['career' => $career]);
});

Route::get('/contact-us', function () {
    return view('contact');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

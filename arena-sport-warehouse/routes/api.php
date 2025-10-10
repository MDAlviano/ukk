<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/secret', function() {
    return response()->json([
        'isSuccess' => true,
        'message' => 'Success get data',
        'data' => [
            [
                'id' => 1,
                'name' => 'John Doe',
                'age' => '24',
                'gender' => 'Male',
                'city' => 'Semarang',
                'country' => 'Indonesia',
            ],
            [
                'id' => 2,
                'name' => 'John Doe',
                'age' => '24',
                'gender' => 'Male',
                'city' => 'Semarang',
                'country' => 'Indonesia',
            ],
            [
                'id' => 3,
                'name' => 'John Doe',
                'age' => '24',
                'gender' => 'Male',
                'city' => 'Semarang',
                'country' => 'Indonesia',
            ],
            [
                'id' => 4,
                'name' => 'John Doe',
                'age' => '24',
                'gender' => 'Male',
                'city' => 'Semarang',
                'country' => 'Indonesia',
            ],
        ]
    ]);
});

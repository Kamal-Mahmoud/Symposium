<?php

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware(['throttle:public-api'])->group(function () {

    Route::get('/user', function (Request $request) {
        return UserResource::collection(User::all());
    })->middleware('auth:sanctum');

    Route::get('talks', function () {
        return "Talker";
    });
});

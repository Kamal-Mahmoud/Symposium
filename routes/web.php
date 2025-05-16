<?php

use App\Http\Controllers\ConferenceController;
use App\Http\Controllers\FavortieConferenceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TalkController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get("/talks", [TalkController::class, 'index'])->name("talks.index");
    Route::get("/talks/create", [TalkController::class, 'create'])->name("talks.create");
    Route::post("/talks", [TalkController::class, 'store'])->name("talks.store");
    Route::get("talks/{talk}", [TalkController::class, "show"])->name("talks.show")->can("view", "talk");
    Route::delete("talks/{talk}", [TalkController::class, "destroy"])->name("talks.destroy");
    Route::get("talks/{talk}/edit", [TalkController::class, "edit"])->name("talks.edit");
    Route::patch("talks/{talk}", [TalkController::class, "update"])->name("talks.update");




    Route::get("/conferences", [ConferenceController::class, 'index'])->name("conferences.index");
    Route::get("conferences/{conference}", [ConferenceController::class, "show"])->name("conferences.show");

    Route::post("conferences/{conference}/favorite", [FavortieConferenceController::class, 'store'])->name("conferences.favorite");
    Route::delete("conferences/{conference}/favorite", [FavortieConferenceController::class, "destroy"])->name("conferences.unfavorite");
    // Route::get("/talks/create", [ConferenceController::class, 'create'])->name("talks.create");
    // Route::post("/talks", [ConferenceController::class, 'store'])->name("talks.store");

    // Route::delete("talks/{talk}", [ConferenceController::class, "destroy"])->name("talks.destroy");
    // Route::get("talks/{talk}/edit", [ConferenceController::class, "edit"])->name("talks.edit");
    // Route::patch("talks/{talk}", [ConferenceController::class, "update"])->name("talks.update");




});

require __DIR__ . '/auth.php';

Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', function () {
    // $user = Socialite::driver('github')->user();

    $githubUser = Socialite::driver('github')->user();
    $user = User::updateOrCreate([
        'github_id' => $githubUser->id,
    ], [
        'name' => $githubUser->name,
        'email' => $githubUser->email,
        'github_token' => $githubUser->token,
        'github_refresh_token' => $githubUser->refreshToken,
    ]);

    Auth::login($user);

    return redirect('/dashboard');
});

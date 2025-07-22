<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Home Page
Route::get('/', [HomeController::class, "index"]);
// Authorization
Route::get("/login", [UserController::class, "loginView"])->name("loginView");
Route::post("/login", [UserController::class, "login"])->name("login");
Route::get("/register", [UserController::class, "registerView"])->name("registerView");
Route::post("/register", [UserController::class, "register"])->name("register");
// vote increament
Route::get('/vote/{id}', [HomeController::class, "voteIncreament"])->name('vote.inc');

Route::prefix("admin")->middleware("isadmin")->group(function () {
    // Panel
    Route::get("/panel", [AdminController::class, "index"])->name("admin.panel");
    // Create
    Route::get('/vote/add', [AdminController::class, "addVoteView"])->name('vote.add.form');
    Route::post('/vote/add', [AdminController::class, "addVote"])->name('vote.add');
    // Delete
    Route::get("/vote/delete/{id}", [AdminController::class, "deleteVote"])->name('vote.delete');

});

// Log out
Route::get("/logout", [UserController::class, "logout"])->name("logout");
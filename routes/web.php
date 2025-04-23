<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

use App\Models\Project;

Route::get('/', function () {
    $projects = Project::latest()->get(); // Fetch latest 6 projects
    return view('home', compact('projects'));
});



Route::post('/projects/{id}/comments', [ProjectController::class, 'addComment'])->name('projects.addComment');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //project routes


    Route::get('/projects',  [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');

    Route::post('/projects/store', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
});
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

require __DIR__ . '/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;
use App\Http\Controllers\CourseController;

use function PHPUnit\TestFixture\func;

Route::get('/', function () {
    return view('welcome');
})->name('home');

//Lista de cursos.
Route::get('courses', [
    CourseController::class,
    'index'
])->name('courses.index');

Route::get('courses/create', [
    CourseController::class,
    'create'
])->name('courses.create');

Route::post('courses', [
    CourseController::class,
    'store'
])->name('courses.store');

Route::get('courses/{course}', [
    CourseController::class,
    'show'
])->name('courses.show');

Route::get('/courses/{course}/edit', [
    CourseController::class,
    'edit'
])->name('courses.edit');

Route::put('/courses/{course}', [
    CourseController::class,
    'update'
])->name('courses.update');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});

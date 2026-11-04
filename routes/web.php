<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;

//Controladores.
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LanguageController;

//Middlewares
use App\Http\Middleware\EnsureUserHasRole;
use App\Http\Middleware\SetLanguage;

use function PHPUnit\TestFixture\func;

Route::get('/greeting/{locale}', [
    LanguageController::class,
    'switch'
])->name('greeting');

Route::get('/', function () {
    return view('welcome');
})->name('home');

//Lista de cursos.

Route::resource('courses', CourseController::class)
    ->middleware([
        'auth', 
        'verified',
        EnsureUserHasRole::class.':Admin',
        SetLanguage::class
    ]);

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified', SetLanguage::class])
    ->name('dashboard');

Route::view('tasks', 'tasks')
    ->middleware([
        'auth', 
        'verified',
        EnsureUserHasRole::class.':Admin'
    ])
    ->name('tasks');

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

<?php

use App\Http\Controllers\CredentialController;
use App\Http\Livewire\Credentials\Index as CredentialsIndex;
use App\Http\Livewire\Credentials\Show as CredentialsShow;
use App\Http\Livewire\Credentials\Edit as CredentialsEdit;
use App\Http\Livewire\Credentials\Create as CredentialsCreate;
use App\Http\Livewire\Credentials\Types as CredentialsTypes;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Credentials index
    Route::get('/credentials', CredentialsIndex::class)->name('credentials.index');

    // Create credential
    Route::get('/credentials/create', CredentialsCreate::class)->name('credentials.create');

    // Credential signle page
    Route::get('/credentials/{credential}', CredentialsShow::class)->name('credentials.show');

    // Credential signle page (Edit)
    Route::get('/credentials/{credential}/edit', CredentialsEdit::class)->name('credentials.edit');

    // Delete credential
    Route::delete('/credentials/{credential}', [CredentialController::class, 'remove'])->name('credentials.remove');

    // Credential types
    Route::get('/credential-types', CredentialsTypes::class)->name('credentials.types');
});

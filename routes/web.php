<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProspectController;
use App\Http\Controllers\ProspectionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DevisController;
use App\Http\Controllers\CommercialController;
use Spatie\Permission\Models\Role;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // $create_entreprise = Role::create(['name'=> 'Entreprise']);
    return view('welcome');
});

// Route::group(['middleware' => ['admin']], function() {

//     Route::resource('permissions', App\Http\Controllers\PermissionController::class);
//     Route::get('permissions/{permissionId}/delete', [App\Http\Controllers\PermissionController::class, 'destroy']);

//     Route::resource('roles', App\Http\Controllers\RoleController::class);
//     Route::get('roles/{roleId}/delete', [App\Http\Controllers\RoleController::class, 'destroy']);
//     Route::get('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'addPermissionToRole']);
//     Route::put('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'givePermissionToRole']);

//     Route::resource('users', App\Http\Controllers\UserController::class);
//     Route::get('users/{userId}/delete', [App\Http\Controllers\UserController::class, 'destroy']);

// });




Route::middleware(['auth', 'role:admin'])->group(function () {
    // Route::get('/create-commercial', [CommercialController::class, 'create'])->name('commercials.create');
    // Route::get('/index-commercial', [CommercialController::class, 'index'])->name('commercials.index');
    // Route::post('/create-commercial', [CommercialController::class, 'store'])->name('commercials.store');
    Route::resource('/commercials', CommercialController::class);
    // Route::resource('/commercials',CommercialController::class);
    Route::get('/home_admin', [CommercialController::class, 'adminIndex'])->name('home_admin');

});



Route::get('/layout', function () {
    return view('layout');
});
Route::get('/home_admin', function () {
    return view('home_admin');
})->middleware(['auth', 'role:admin', 'verified'])->name('home_admin');

Route::get('/dashboard', function () {
    return view('home_com');
});

Route::get('/home_com', function () {
    return view('home_com');
})->middleware(['auth', 'role:commercial', 'verified'])->name('home_com');

Route::get('/home_admin', [ProspectController::class, 'adminIndex'])->name('home_admin');
Route::get('/home_com', [ProspectController::class, 'adminIndex'])->name('home_com');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('/categories', CategorieController::class);
Route::resource('/prospects', ProspectController::class);
Route::resource('/prospections', ProspectionController::class);
Route::resource('devis', DevisController::class);

Route::resource('/documents', DocumentController::class);
// Route::get('/clients', [ProspectController::class, 'clients'])->name('clients.index');


Route::get('/downloadfiles/{id}', [DocumentController::class, 'downloadfiles']);

require __DIR__ . '/auth.php';

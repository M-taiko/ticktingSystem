<?php

use App\Http\Controllers\ProblemestypeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentesController;


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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});







/************************************ start department Routes **************************************************************** */
Route::get('ajax/departmentes', [\App\Http\Controllers\DepartmentesController::class, 'index'])->name('departmentes.index'); 

Route::get('ajax/departmentes/all', [\App\Http\Controllers\DepartmentesController::class, 'getdepartmentesTable'])->name('departmentes.getdepartmentesTable');  

Route::resource('departmentes', DepartmentesController::class); 

/************************************* End departmentes Routes *************************************************************** */

/************************************ start problemestype Routes **************************************************************** */
Route::get('ajax/problemestype', [\App\Http\Controllers\ProblemestypeController::class, 'index'])->name('problemestype.index'); 

Route::get('ajax/problemestype/all', [\App\Http\Controllers\ProblemestypeController::class, 'getproblemestypeTable'])->name('problemestype.getproblemestypeTable');  


Route::resource('problemestype' , ProblemestypeController::class );

/************************************* End problemestype Routes *************************************************************** */





/************************************* start Auth  Routes *************************************************************** */



Route::group(['middleware' => ['auth']], function() {
    
   Route::resource('roles', RoleController::class);
   Route::resource('users', UserController::class);
});

/************************************* End Auth Routes *************************************************************** */

Auth::routes(['register'=>false , 'reset'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



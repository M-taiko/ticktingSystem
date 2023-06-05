<?php

use App\Http\Controllers\DepartmentesController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PrioritiesController;
use App\Http\Controllers\ProblemestypeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use BeyondCode\LaravelWebSockets\Dashboard\Http\Controllers\ShowDashboard;
use Illuminate\Support\Facades\Auth;
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


Route::get('ajax/tickets', [\App\Http\Controllers\TicketsController::class, 'index'])->name('tickets.index'); 

Route::get('ajax/tickets/all', [\App\Http\Controllers\TicketsController::class, 'getticketsTable'])->name('tickets.getticketsTable');  


Route::get('/tickets/{id}', [\App\Http\Controllers\TicketsController::class, 'show'])->name('show');

Route::post('assign', [\App\Http\Controllers\TicketsController::class, 'assign'])->name('assign');

Route::resource('tickets', \App\Http\Controllers\TicketsController::class); 



/************************************* End Tickets Routes *************************************************************** */



/************************************ start department Tickets Routes **************************************************************** */
/*
*/
Route::get('ajax/departmentticket', [\App\Http\Controllers\departmentticketController::class, 'index'])->name('departmentticket.index'); 

Route::get('ajax/departmentticket/all', [\App\Http\Controllers\departmentticketController::class, 'getdepatmentticketsTable'])->name('departmentticket.getdepatmentticketsTable');  

Route::resource('departmentticket', \App\Http\Controllers\departmentticketController::class);  
/************************************ start department Tickets Routes **************************************************************** */






/************************************ start Ticket Comment Routes **************************************************************** */
Route::get('ajax/tickethistory', [\App\Http\Controllers\TickethistoryController::class, 'index'])->name('comments.index'); 

Route::get('ajax/tickethistory/all', [\App\Http\Controllers\TickethistoryController::class, 'getcommentsTable'])->name('tickethistory.getcommentsTable');  


Route::get('update/{id}', [ \App\Http\Controllers\TickethistoryController::class , 'update'])->name('update');

Route::resource('tickethistory', \App\Http\Controllers\TickethistoryController::class); 

/************************************* End  Ticket Comment Routes *************************************************************** */




/************************************ start priorities Routes **************************************************************** */

Route::resource('priorities', PrioritiesController::class ); 

/************************************* End priorities Routes *************************************************************** */


/************************************* Notifecation  Routes *************************************************************** */
Route::get('notifications/unread', [NotificationController::class, 'unread'])->name('notifications.unread');
/*************************************  Notiefcation  Routes *************************************************************** */





/************************************* start Auth  Routes *************************************************************** */
Route::group(['middleware' => ['auth']], function() {
    
   Route::resource('roles', RoleController::class);
   Route::resource('users', UserController::class);

});
/************************************* End Auth Routes *************************************************************** */















Auth::routes(['register'=>false , 'reset'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



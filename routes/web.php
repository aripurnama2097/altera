<?php



use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AlterationController;
use App\Http\Controllers\ResetPasswordController;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\alterationImport;







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
    return view(
        'home',
        ["title" => "Home"]
    );
});




Route::get('/home', function() {
    return view('home'); })->name('home')->middleware('auth');

// LOGIN
Route::get('/login',[LoginController::class, 'index'])->name('login'); //->middleware('guest'); // penamaan route login
Route::post('/login',[LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']); // method lgogout
Route::get('/login/reset_password',[ResetPasswordController::class, 'index']);

Route::post('/login/reset_password',[ResetPasswordController::class, 'resetPassword']);

// Routing Register User
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);


//===================================ROUTE DASHBOARD=================================
Route::get('/dashboard',[DashboardController::class,'index']);

//===================================ROUTE UPLOAD ALTERATION MASTER=================================
Route::get('/alteration',[AlterationController::class,'index']);
Route::post('/alteration/create',[AlterationController::class,'create']);

Route::post('/alteration/upload',[AlterationController::class,'importCSV']);















// Route::get('/picking',[PickingController::class,'show'] );
// Route::resource('/picking',PickingController::class);

// route get => register_part => Index
// route get=>register_part/create=>Create
// route post=>register_part=>Store

// route put=>register_part/{id}=>update
// route delete=>register_part/{id}=>delete
// route get=>register_part/{id}/edit=>edit

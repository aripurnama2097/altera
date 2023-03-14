<?php



use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\Imports\alterationImport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\CompareController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AlterationController;
use App\Http\Controllers\RecordFilterController;
use App\Http\Controllers\ResetPasswordController;





//===================================ROUTE HOME=================================

Route::get('/', function () {
    return view(
        'home',
        ["title" => "Home"]
    );
});
Route::get('/home', function() {
    return view('home'); })->name('home')->middleware('auth');

//===================================ROUTE LOGIN=================================
Route::get('/login',[LoginController::class, 'index'])->name('login'); //->middleware('guest'); // penamaan route login
Route::post('/login',[LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']); // method lgogout
Route::get('/login/reset_password',[ResetPasswordController::class, 'index']);
Route::post('/login/reset_password',[ResetPasswordController::class, 'resetPassword']);


//===================================ROUTE REGISTER=================================
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);


//===================================ROUTE DASHBOARD=================================
Route::get('/dashboard',[DashboardController::class,'index']);


//===================================ROUTE  ALTERATION MASTER=================================
Route::get('/alteration',[AlterationController::class,'index']);
Route::post('/alteration/create',[AlterationController::class,'create']);
Route::post('/alteration/upload',[AlterationController::class,'importCSV']);
Route::get('alteration/delete',[AlterationController::class,'deleteAll']);
Route::get('alteration/{id}/destroy/',[AlterationController::class,'destroy']);
Route::get('alteration/export',[AlterationController::class,'export']);
Route::post('alteration/update/{id}',[AlterationController::class,'update']);


//===================================ROUTE COMPARE=================================
Route::get('/compare',[CompareController::class,'index']);
Route::post('/compare/startCompare',[CompareController::class,'startCompare']);


//===================================ROUTE RECORD=================================
Route::get('records',[RecordController::class,'index']);
Route::post('/records/filter',[RecordController::class,'filter']);
Route::get('/records/backup',[RecordController::class,'backup']);


//===================================ROUTE RECORDFILTER=================================
Route::get('recordsFilter',[RecordFilterController::class,'index']);


//===================================ROUTE BACKUP=================================
Route::get('backup',[BackupController::class,'index']);
Route::post('/backup/filter',[BackupController::class,'filter']);









// Route::get('/picking',[PickingController::class,'show'] );
// Route::resource('/picking',PickingController::class);

// route get => register_part => Index
// route get=>register_part/create=>Create
// route post=>register_part=>Store

// route put=>register_part/{id}=>update
// route delete=>register_part/{id}=>delete
// route get=>register_part/{id}/edit=>edit

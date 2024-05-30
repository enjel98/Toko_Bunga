<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TestingController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login/verify', [AuthController::class, 'verify']);
Route::get('/logout', function () {
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect('/login');
});


Route::group(['middleware' => 'auth', 'prefix' => 'user'], function () {
    Route::get('/change-password', [TestingController::class, 'changePassword'])->name('user.change-password');
    Route::post('/change-password', [TestingController::class, 'updatePassword']);
});

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registerProceed']);
Route::get('/register/activation/{token}', [AuthController::class, 'registerVerify']);


Route::get('mail/test',function (){
    Illuminate\Support\Facades\Mail::to('enjel@gamail.com')
        ->queue(new \App\Mail\TestMail());

});

Route::group(['middleware' => 'auth', 'prefix' => 'kategori'], function () {
    Route::get('/', [App\Http\Controllers\KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/tambah', [App\Http\Controllers\KategoriController::class, 'tambah'])->name('kategori.tambah');
    Route::post('/prosesTambah', [App\Http\Controllers\KategoriController::class, 'prosesTambah'])->name('kategori.prosesTambah');
    Route::get('/ubah/{id}', [App\Http\Controllers\KategoriController::class, 'ubah'])->name('kategori.ubah');
    Route::post('/prosesUbah', [App\Http\Controllers\KategoriController::class, 'prosesUbah'])->name('kategori.prosesUbah');
    Route::get('/hapus/{id}', [App\Http\Controllers\KategoriController::class, 'hapus'])->name('kategori.hapus');
    Route::get('/export-pdf', [App\Http\Controllers\KategoriController::class, 'exportPdf'])->name('kategori.exportPdf');
});



Route::group(['prefix' => 'app', 'middleware' => 'auth'], function () {
    Route::get('/', [KasirController::class, 'index']);

    Route::post('/search-barcode', [KasirController::class, 'searchProduct']);
    Route::post('/insert', [KasirController::class, 'insert']);

    });

Route::group(['middleware' => 'auth', 'prefix' => 'products'], function () {
    Route::get('/', [ProductController::class, 'list'])->name('products.index');
    Route::get('/add', [ProductController::class, 'add']);
    Route::get('/edit/{id}', [ProductController::class, 'edit']);

    Route::post('/update', [ProductController::class, 'update']);
    Route::post('/insert', [ProductController::class, 'insert']);
    Route::post('/delete', [ProductController::class, 'delete']);
});

Route::group(['prefix' => 'transaksi', 'middleware' => 'auth'], function () {
    Route::get('/', [TransaksiController::class, 'index']);
    Route::get('/{id}/pdf', [TransaksiController::class, 'printPDF']);

});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth');

Route::get('files/{filename}', function ($filename) {
    $path = storage_path('app/public/' . $filename);
    if (!File::exists($path)) {
        abort(404);
    }
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = new Response($file, 200);
    $response->header("Content-Type", $type);
    return $response;
})->name('storage');



//Route::group([
//    'middleware' => ['auth', 'role.admin'],
//    'prefix' => 'teacher'
//], function () {
//    Route::get('/', [TeacherController::class, 'list']);
////    Route::get('/{id}',[TeacherController::class,'detail']);
//    Route::get('/add', [TeacherController::class, 'add']);
//    Route::get('/export/excel', [TeacherController::class, 'excel'])->name('tch.excel');
//    Route::get('/edit/{id}', [TeacherController::class, 'edit'])->middleware('role.superadmin');
//
//    Route::post('/insert', [TeacherController::class, 'insert']);
//    Route::post('/update', [TeacherController::class, 'update'])->middleware('role.superadmin');
//    Route::post('/delete', [TeacherController::class, 'delete'])->middleware('role.superadmin');
//});
//
//
//Route::group(['middleware'=>'auth','prefix'=>'student'], function(){
//    Route::get('/',[StudentController::class,'list']);
//    Route::get('/add',[StudentController::class,'add']);
//    Route::get('/edit/{id}',[StudentController::class,'edit']);
//
//    Route::post('/update',[StudentController::class,'update']);
//    Route::post('/insert',[StudentController::class,'insert']);
//    Route::post('/delete',[StudentController::class,'delete']);
//});
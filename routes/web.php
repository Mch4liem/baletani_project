<?php

use App\Models\Farmer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RentalController;
use App\Models\Admin;
use App\Models\Member;
use App\Models\Rental;

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

/* Hitung Data Petani pada Beranda*/

Route::get('/', function () {
    $jumlahpetani = Farmer::count();
    $jumlahadmin = Admin::count();
    $jumlahmember = Member::count();
    $jumlahsewa = Rental::count();

    return view('welcome', compact('jumlahpetani', 'jumlahadmin', 'jumlahmember', 'jumlahsewa'));
});


/**
 * Route untuk Tabel Data
 */
Route::get('/petani', [FarmerController::class, 'index'])->name('petani')->middleware('auth');

Route::get('/member',[MemberController::class, 'index'])->name('member')->middleware('auth');

Route::get('/admin',[AdminController::class, 'index'])->name('admin')->middleware('auth');

Route::get('/sewa',[RentalController::class, 'index'])->name('sewa')->middleware('auth');


/*
Route untuk Tambah Data (GET)
 */

Route::get('/addpetani',[FarmerController::class, 'addpetani'])->name('addpetani');

Route::get('/addmember',[MemberController::class, 'addmember'])->name('addmember');

Route::get('/addadmin',[AdminController::class, 'addadmin'])->name('addadmin');

Route::get('/addsewa',[RentalController::class, 'addsewa'])->name('addsewa');

/*
Route untuk Insert Data (POST)
 */

Route::post('/insertpetani',[FarmerController::class, 'insertpetani'])->name('insertpetani');

Route::post('/insertmember',[MemberController::class, 'insertmember'])->name('insertmember');

Route::post('/insertadmin',[AdminController::class, 'insertadmin'])->name('insertadmin');

Route::post('/insertsewa',[RentalController::class, 'insertsewa'])->name('insertsewa');

// route untuk EDIT data

Route::get('/editpetani/{id}',[FarmerController::class, 'editpetani'])->name('editpetani');

Route::get('/editmember/{id}',[MemberController::class, 'editmember'])->name('editmember');

Route::get('/editadmin/{id}',[AdminController::class, 'editadmin'])->name('editadmin');

Route::get('/editsewa/{id}',[RentalController::class, 'editsewa'])->name('editsewa');

// Route untuk Update (submit button) data

Route::post('/updatepetani/{id}',[FarmerController::class, 'updatepetani'])->name('updatepetani');

Route::post('/updatemember/{id}',[MemberController::class, 'updatemember'])->name('updatemember');

Route::post('/updateadmin/{id}',[AdminController::class, 'updateadmin'])->name('updateadmin');

// Route untuk delete data

Route::get('/deletepetani/{id}',[FarmerController::class, 'deletepetani'])->name('deletepetani');

Route::get('/deletemember/{id}',[MemberController::class, 'deletemember'])->name('deletemember');

Route::get('/deleteadmin/{id}',[AdminController::class, 'deleteadmin'])->name('deleteadmin');

// Route untuk eksport PDF
Route::get('/exportpetani',[FarmerController::class, 'exportpetani'])->name('exportpetani');

Route::get('/exportmember',[MemberController::class, 'exportmember'])->name('exportmember');

Route::get('/exportadmin',[AdminController::class, 'exportadmin'])->name('exportadmin');

Route::get('/exportsewa',[RentalController::class, 'exportsewa'])->name('exportsewa');

// login 
Route::get('/login',[LoginController::class, 'login'])->name('login');

Route::post('/loginproses',[LoginController::class, 'loginproses'])->name('loginproses');

//Daftar atau Register
Route::get('/register',[LoginController::class, 'register'])->name('register');

Route::post('/registeradmin',[LoginController::class, 'registeradmin'])->name('registeradmin');

//Logout Akun admin
Route::get('/logout',[LoginController::class, 'logout'])->name('logout');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\GrupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\InclasspromotorController;
use App\Http\Controllers\InclassfsmController;
use App\Http\Controllers\InclasssalesmanController;
use App\Http\Controllers\InclasslainController;
use App\Http\Controllers\InstorepromotorController;
use App\Http\Controllers\InstorelainController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\VisitorController;
use App\Imports\employeeImport;

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

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'App\Http\Middleware\admin'], function()
    {
        Route::get('/',[DashboardController::class, 'index'])->name('dashboardadmin');
        Route::get('/filterinstore/{bulan}',[DashboardController::class, 'filterinstore']);
        Route::get('/filterinclass/{bulan}',[DashboardController::class, 'filterinclass']);

        Route::patch('/trainer/update/{trainer}',[TrainerController::class, 'update'])->name('updatetrainer');
        Route::post('/trainer/{id}/ubahkatasandi',[TrainerController::class, 'editpasswordproses']);
        Route::post('/trainer',[TrainerController::class, 'store'])->name('trainer');
        Route::get('/trainer/{id}/ubahkatasandi',[TrainerController::class, 'editpasswordform']);
        Route::get('/trainer/{id}/hapus',[TrainerController::class, 'destroy']);
        Route::get('/trainer/{id}/edit',[TrainerController::class, 'edit'])->name('edittrainer');
        Route::get('/trainer/tambah',[TrainerController::class, 'create'])->name('tambahtrainer');
        Route::get('/trainer',[TrainerController::class, 'index'])->name('trainer');

        Route::post('importemployee',[EmployeeController::class, 'pegawaiimportexcel'])->name('import');
        Route::get('exportemployee', [EmployeeController::class, 'pegawaiexportexcel'])->name('export');
        Route::patch('/employee/update/{employee}',[EmployeeController::class, 'update'])->name('updatetrainer');
        Route::post('/employee',[EmployeeController::class, 'store']);
        Route::get('/employee/{id}/hapus',[EmployeeController::class, 'destroy']);
        Route::get('/employee/{id}/edit',[EmployeeController::class, 'edit'])->name('edittrainer');
        Route::get('/employee/tambah',[EmployeeController::class, 'create'])->name('tambahemployee');
        Route::get('/employee',[EmployeeController::class, 'index'])->name('employee');
        Route::get('/test',[EmployeeController::class, 'show']);

        Route::post('/reportAdmin',[ReportController::class, 'export_mapping'])->name('report');
        Route::get('/reportAdmin',[ReportController::class, 'index'])->name('report');

        Route::post('/category',[CategoryController::class, 'store']);
        Route::get('/category/{id}/hapus',[CategoryController::class, 'destroy']);
        Route::get('/category/tambah',[CategoryController::class, 'create'])->name('tambahcategory');
        Route::get('/category',[CategoryController::class, 'index'])->name('category');

        Route::post('/product',[ProductController::class, 'store']);
        Route::get('/product/{id}/hapus',[ProductController::class, 'destroy']);
        Route::get('/product/tambah',[ProductController::class, 'create'])->name('tambahproduct');
        Route::get('/product',[ProductController::class, 'index'])->name('product');
        Route::get('/product/{id}/edit',[ProductController::class, 'edit'])->name('editproduct');
        Route::patch('/product/update/{id}',[ProductController::class, 'update'])->name('updateproduct');

    });

    Route::group(['middleware' => 'App\Http\Middleware\trainer'], function()
    {
        

        Route::post('/grup/tambah/ambildata',[GrupController::class, 'ambildata']);
        Route::post('/grup/tambah',[GrupController::class, 'store']);
        Route::get('/grup/{id}/hapus',[GrupController::class, 'destroy']);
        Route::get('/grup/tambah',[GrupController::class, 'create'])->name('tambahgrup');
        Route::get('/grup',[GrupController::class, 'index'])->name('grup');

        Route::post('/reportTrainer',[ReportController::class, 'export_mapping'])->name('report');
        Route::get('/reportTrainer',[ReportController::class, 'index'])->name('report');
    });

    Route::group(['middleware' => 'App\Http\Middleware\visitor'], function()
    {
        Route::post('/visitor/ambildata',[VisitorController::class, 'ambildata']);
        Route::get('/visitor',[VisitorController::class, 'index'])->name('visitor');
    });
    Route::PATCH('/training/icp/update/{icp}',[InclasspromotorController::class, 'update'])->name('updateicp');
        Route::post('/training/icp',[InclasspromotorController::class, 'store'])->name('tambahdataicp');
        Route::get('/training/icp/{id}/edit',[InclasspromotorController::class, 'edit'])->name('editicp');
        Route::get('/training/icp/tambah',[InclasspromotorController::class, 'create'])->name('tambahicp');
        Route::get('/training/icp',[InclasspromotorController::class, 'index'])->name('icp');
        Route::get('/training/icp/{id}/hapus',[InclasspromotorController::class, 'destroy'])->name('deleteicp');
        // Route::get('/training/icp/ajax',[InclasspromotorController::class, 'ajax']);

        Route::patch('/training/icfsm/update/{icfsm}',[InclassfsmController::class, 'update'])->name('updateicfsm');
        Route::post('/training/icfsm',[InclassfsmController::class, 'store'])->name('tambahdataicfsm');
        Route::get('/training/icfsm/{id}/edit',[InclassfsmController::class, 'edit'])->name('editicfsm');
        Route::get('/training/icfsm/tambah',[InclassfsmController::class, 'create'])->name('tambahicfsm');
        Route::get('/training/icfsm/{id}/hapus',[InclassfsmController::class, 'destroy'])->name('deleteicfsm');
        Route::get('/training/icfsm',[InclassfsmController::class, 'index'])->name('icfsm');

        Route::patch('/training/ics/update/{ics}',[InclasssalesmanController::class, 'update'])->name('updateics');
        Route::post('/training/ics',[InclasssalesmanController::class, 'store'])->name('tambahdataics');
        Route::get('/training/ics/{id}/edit',[InclasssalesmanController::class, 'edit'])->name('editics');
        Route::get('/training/ics/tambah',[InclasssalesmanController::class, 'create'])->name('tambahics');
        Route::get('/training/ics/{id}/hapus',[InclasssalesmanController::class, 'destroy'])->name('deleteics');
        Route::get('/training/ics',[InclasssalesmanController::class, 'index'])->name('ics');

        Route::patch('/training/icll/update/{icll}',[InclasslainController::class, 'update'])->name('updateicll');
        Route::post('/training/icll',[InclasslainController::class, 'store'])->name('tambahdataicll');
        Route::get('/training/icll/{id}/edit',[InclasslainController::class, 'edit'])->name('editicll');
        Route::get('/training/icll/tambah',[InclasslainController::class, 'create'])->name('tambahicll');
        Route::get('/training/icll/{id}/hapus',[InclasslainController::class, 'destroy'])->name('deleteicfsm');
        Route::get('/training/icll',[InclasslainController::class, 'index'])->name('icll');

        Route::patch('/training/isp/update/{isp}',[InstorepromotorController::class, 'update'])->name('updateisp');
        Route::post('/training/isp',[InstorepromotorController::class, 'store'])->name('tambahdataisp');
        Route::get('/training/isp/{id}/edit',[InstorepromotorController::class, 'edit'])->name('editisp');
        Route::get('/training/isp/tambah',[InstorepromotorController::class, 'create'])->name('tambahisp');
        Route::get('/training/isp',[InstorepromotorController::class, 'index'])->name('isp');
        Route::get('/training/isp/{id}/hapus',[InstorepromotorController::class, 'destroy'])->name('deleteisp');
        Route::get('/training/{id}/gambar_aktivitas',[InstorepromotorController::class, 'download']);

        Route::patch('/training/isll/update/{isll}',[InstorelainController::class, 'update'])->name('updateisll');
        Route::post('/training/isll',[InstorelainController::class, 'store'])->name('tambahdataisll');
        Route::get('/training/isll/{id}/edit',[InstorelainController::class, 'edit'])->name('editisll');
        Route::get('/training/isll/tambah',[InstorelainController::class, 'create'])->name('tambahisll');
        Route::get('/training/isll',[InstorelainController::class, 'index'])->name('isll');
        Route::get('/training/gambar_aktivitas/{id}',[InstorelainController::class, 'download1']);

        Route::get('/training/ajax/{test}',[TrainingController::class, 'getProduct']);
        Route::get('/training/ajax',[TrainingController::class, 'ajax']);


    Route::post('/ubahkatasandi', [DashboardController::class, 'updatepassword']);
    Route::get('/ubahkatasandi', [DashboardController::class, 'editpassword']);
});


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddressChangeController;
use App\Http\Controllers\NameChangeRequestController;
use App\Http\Controllers\CpeProgramController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\GrnController;
use App\Http\Controllers\JobcardController;
use App\Http\Controllers\RewindingController;



use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentRequestMail;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/keep-alive', fn() => response()->json(['alive' => true]))->name('keep-alive');
Route::get('/auto-logout', function () {
    Auth::logout();
    Session::flush();
    return redirect('/login')->with('message', 'You were logged out due to inactivity.');
})->name('auto.logout');
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login');

// pages

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);


Route::get('admin/masters', function () {
    return view('masters');
});
Route::get('masters/cpe-programs/data', [App\Http\Controllers\CpeProgramController::class, 'getPrograms'])->name('masterscpe-programs.data');
Route::post('admin/cpe-programs/store', [CpeProgramController::class, 'store'])->name('cpe.store');
Route::delete('admin/cpe-programs/delete', [CpeProgramController::class, 'destroy'])->name('cpe-programs.destroy');
Route::get('admin/cpe-programs/edit', [App\Http\Controllers\CpeProgramController::class, 'editProgram'])->name('cpe-programs.edit');
Route::post('admin/cpe-programs/update', [App\Http\Controllers\CpeProgramController::class, 'updateProgram'])->name('cpe-programs.update');






Route::get('printingprocess', [App\Http\Controllers\PrintingprocessController::class, 'index'])->name('printingprocess.index');


Route::get('pouching',[App\Http\Controllers\PouchingController::class, 'index'])->name('pouching.index');
Route::get('slitting',[App\Http\Controllers\SlittingController::class, 'index'])->name('slitting.index');
Route::get('lamination',[App\Http\Controllers\LaminationController::class, 'index'])->name('lamination.index');
Route::get('inspection',[App\Http\Controllers\InspectionController::class, 'index'])->name('inspection.index');
Route::get('folding',[App\Http\Controllers\FoldingController::class, 'index'])->name('folding.index');
Route::get('production_process',[App\Http\Controllers\ProductionprocessController::class, 'index'])->name('production_process.index');


//job-card
Route::post('get_material_details',[JobcardController::class, 'get_material_details']);
Route::post('get_material_stock',[JobcardController::class, 'get_material_stock']);
                               

//GRN
Route::get('goods-receipt-notes', [GrnController::class, 'index'])->name('goods-receipt-notes.index');
Route::get('/grns/fetch', [GrnController::class, 'getGrnData']);
Route::post('/grns/store', [GrnController::class, 'store']);
// Route::get('/grns/show/{id}', [GrnController::class, 'show']);
// Route::post('/grns/update/{id}', [GrnController::class, 'update']);
// Route::delete('/grns/delete/{id}', [GrnController::class, 'destroy']);

// po
Route::get('purchaseorder',[PurchaseOrderController::class, 'index'])->name('purchaseorder.index');
Route::post('/po/store', [PurchaseOrderController::class, 'store']);
Route::get('/po/fetch', [PurchaseOrderController::class, 'list']);


// Rewinf
Route::get('rewinding',[RewindingController::class, 'index'])->name('rewinding.index');
Route::post('/rewinding/store', [RewindingController::class, 'store']);
Route::get('/rewinding/created_fetch', [RewindingController::class, 'created_list']);
Route::get('/rewinding/inprogress_fetch', [RewindingController::class, 'inprogress_list']);
Route::get('/rewinding/completed_fetch', [RewindingController::class, 'completed_list']);

//job-card
Route::get('jobcards', [App\Http\Controllers\JobcardController::class, 'index'])->name('jobcards.index');
Route::post('jobcards_create', [App\Http\Controllers\JobcardController::class, 'create'])->name('jobcard.create');

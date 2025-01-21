<?php

use Illuminate\Support\Facades\Route;

//Admin Panel
//Account Login Admin
use App\Http\Controllers\AdminPanel\Setting\Account\UserController;
//Dashboard Module
use App\Http\Controllers\AdminPanel\DashboardController;
//Resident Module
use App\Http\Controllers\AdminPanel\ResidentInfoController;
//Blotter Module
use App\Http\Controllers\AdminPanel\SBDocumentsController;
//Setttlement Module
use App\Http\Controllers\AdminPanel\Settlement\PersonInvolveController;
use App\Http\Controllers\AdminPanel\Settlement\ScheduleController;
use App\Http\Controllers\AdminPanel\Settlement\UnscheduleController;
use App\Http\Controllers\AdminPanel\Settlement\ScheduleTodayController;
use App\Http\Controllers\AdminPanel\Settlement\SettledCasesController;
//Certificate Module
use App\Http\Controllers\AdminPanel\CertificateController;
use App\Http\Controllers\AdminPanel\PrintController;
use Barryvdh\DomPDF\Facade as PDF;
//Setting Module:Account Section
use App\Http\Controllers\AdminPanel\Setting\Account\AccountController;
use App\Http\Controllers\AdminPanel\AccountController as AccountManager;

//Setting Module:Barangay Section
use App\Http\Controllers\AdminPanel\Setting\Barangay\BrgyOfficialController;
use App\Http\Controllers\AdminPanel\Setting\Barangay\BarangayimageController;
//Admin Panel End

//Client Side

//Account Login
use App\Http\Controllers\ClientSide\ResidentAccountController;
//Home Module
use App\Http\Controllers\ClientSide\ClearanceController;
//Schedule
use App\Http\Controllers\ClientSide\ScheduleClientController;
use App\Http\Controllers\ClientSide\HomeController;
//AccountSettings
use App\Http\Controllers\ClientSide\ResidentUserAccountController;

// Blotter
use App\Http\Controllers\ClientSide\BlotterController as ClientBlotterController;

//Client Side End
//Testing Area
use App\Http\Controllers\BooksController;
use App\Http\Controllers\PagesController;

//SB Members Controller Module
use App\Http\Controllers\AdminPanel\SBController;

//Other Documents Controller Module
use App\Http\Controllers\AdminPanel\OtherDocumentsController;

//News Controller Module
use App\Http\Controllers\AdminPanel\NewsController;

//Schedules Contoller Module
use App\Http\Controllers\AdminPanel\EventController;
use App\Http\Controllers\AdminPanel\CommitteeController;

//Document Report Controller Module
use App\Http\Controllers\AdminPanel\DocumentController;

//Redirect
Route::get('/', function () {
    return redirect('/management/home');
});


//Admin Panel Start

//Document Report Module
Route::post('/documents/generate-report', [DocumentController::class, 'generateReport'])->name('documents.generateReport');
Route::get('/documents/download-report/{fileName}', [DocumentController::class, 'downloadReport'])->name('documents.downloadReport');

//Dashboard Module
Route::get('/dashboard', [DashboardController::class, 'dashboard']);

//Resident Module
Route::resource('resident', ResidentInfoController::class);
Route::get('resident/person/{resident_id}', [ResidentInfoController::class, 'person']);
Route::get('resident/person/{resident_id}/blotter/', [ResidentInfoController::class, 'blotter']);


// Blotter Module
Route::get('/documents', [SBDocumentsController::class, 'show']);
Route::get('/documents/{id}/download', [SBDocumentsController::class, 'downloadPDF'])->name('documents.download');
Route::resource('document', SBDocumentsController::class);
Route::get('/documents/list', [SBDocumentsController::class, 'client_index'])->name('documents.client_index');
Route::get('/documents/view', [SBDocumentsController::class, 'admin_index'])->name('documents.list');
Route::get('/documents/{id}/edit', [SBDocumentsController::class, 'edit'])->name('documents.edit');  
Route::post('/documents/bulk-store', [SBDocumentsController::class,'bulkStore'])->name('documents.bulkStore');
Route::post('/documents/{id}/update', [SBDocumentsController::class,'update'])->name('documents.update');
Route::post('/documents/check-duplicate', [DocumentController::class,'checkDuplicate'])->name('documents.checkDuplicate');
Route::post('/documents/check-bulk-duplicate', [DocumentController::class,'checkBulkDuplicate'])->name('documents.checkBulkDuplicate');
Route::get('/documents/stats', [SBDocumentsController::class, 'getStats']);
Route::get('/documents/recent', [SBDocumentsController::class, 'getRecent']);

//Settlement Module
Route::get('/schedule', [ScheduleController::class, 'index']);
Route::resource('schedules', ScheduleController::class);
Route::resource('unschedules', UnscheduleController::class);
Route::resource('scheduletoday', ScheduleTodayController::class);
Route::resource('settled', SettledCasesController::class);

//News Module
Route::get('/api/news', [NewsController::class, 'index']);
Route::get('/api/serve/{id}', [NewsController::class, 'serve']);
Route::post('/api/news', [NewsController::class, 'store']);
Route::get('/api/news/{id}', [NewsController::class, 'show']);
Route::post('/api/news/{id}', [NewsController::class, 'update']);
Route::delete('/api/news/{id}', [NewsController::class, 'destroy']);

// SB Members Module
Route::get('/sb-members/view', [SBController::class, 'show'])->name('sb.view');
Route::get('/sb-members/view/{id}', [SBController::class, 'viewMember'])->name('sb.viewMember');
Route::get('/sb-members/serve/{id}', [SBController::class, 'serve'])->name('sb.serve');
Route::post('/sb-members/members', [SBController::class, 'store'])->name('sb.store');
Route::delete('/sb-members/members/{id}', [SBController::class, 'destroy']);
Route::put('/sb-members/members/{id}', [SBController::class, 'update']);


//Schedules Module
Route::get('/api/events', [EventController::class, 'index']);
Route::post('/api/events/save', [EventController::class, 'store']);
Route::put('/api/events/save', [EventController::class, 'update']);
Route::delete('/api/events/{event}', [EventController::class, 'destroy']);
Route::get('api/committees', [CommitteeController::class,'index']);
Route::get('/api/user-data', [CommitteeController::class, 'getUserData']);

//Certificate Module

Route::resource('certificate', CertificateController::class);
Route::get('certificate/table/paid', [CertificateController::class, 'certrequestpaid'])->name('certrequestpaid.index');
Route::get('certificate/table/unpaid', [CertificateController::class, 'index'])->name('certrequestunpaid.index');

Route::post('certificate/table/paid', [CertificateController::class, 'storerequest'])->name('storerequest.post');
Route::delete('certificate/table/paid/{request_id}', [CertificateController::class, 'deleterequest'])->name('deleterequest.delete');
Route::get('certificate/table/type', [CertificateController::class, 'certificate_type'])->name('certificate_type.index');
Route::post('certificate/table/type', [CertificateController::class, 'certtypesubmit'])->name('certtypesubmit.post');
Route::get('certificate/table/type/{cert_id}/edit', [CertificateController::class, 'certtypeedit'])->name('certtypesubmit.edit');
Route::delete('certificate/table/type/{cert_id}', [CertificateController::class, 'certtypedelete'])->name('certtypedelete.delete');
Route::GET('certificate/print/cert', [PrintController::class, 'Print'])->name('Print.post');
//Route::get('certificate/print/cert', [PrintController::class, 'index'])->name('Print.index');

//Route::post('certificate/print/cert', [CertificateController::class, 'storerequest'])->name('storerequest.post');



//Maintenance Moduule
// Barangay Setting Section
Route::resource('setting/maintenance', BrgyOfficialController::class);
Route::get('setting/maintenance/official/table', [BrgyOfficialController::class, 'barangay'])->name('barangay.index');
Route::post('setting/maintenance/official/table', [BrgyOfficialController::class, 'barangayPOST'])->name('barangay.post');
Route::get('setting/maintenance/official/table/{barangay}/edit', [BrgyOfficialController::class, 'barangayedit'])->name('barangay.edit');
Route::delete('setting/maintenance/official/table/{barangay}/', [BrgyOfficialController::class, 'barangaydelete'])->name('barangay.destroy');
Route::post('setting/maintenance/barangay/image', [BarangayimageController::class, 'store'])->name('image.store');

// Account Setting Section
Route::resource('/setting/account', AccountController::class);
//Route::resource('accounts', AccountManager::class);
Route::post("/setting/account/form",[AccountController::class, 'accountSettingCheck'])->name("accountSettingCheck");

    // Session
    Route::get("/setting/account/session/table", [AccountController::class, 'getSessionTable'])->name("getSessionTable");

    // Resident Manage Account
    Route::get("/setting/account/resident_account/table", [AccountController::class, 'getResidentAccountTable'])->name("ResidentAccountTable");
    Route::patch("/setting/account/resident_account/{id}", [AccountController::class, 'resident_update']);
    Route::delete("/setting/account/resident_account/{id}", [AccountController::class, 'resident_delete']);

    // User Login Section
    Route::get("/login", [UserController::class, 'login']);
    Route::get("/profile", [UserController::class, 'profile']);
    Route::post("/login", [UserController::class, 'check']);
    Route::get("/logout", [UserController::class, 'logout']);

//account management
Route::post('/account/store', [AccountManager::class, 'store'])->name('account.store');
Route::get('/get-sb-members', [AccountManager::class, 'getSBMembers']);
Route::get('/pending-accounts', [AccountManager::class, 'getPendingAccounts'])->middleware('admin.only');
Route::post('/approve-reject-account', [AccountManager::class, 'approveRejectAccount'])->middleware('admin.only');

//Admin Panel End

// Other Documents Module
    Route::get('other-documents/{id}/download', [OtherDocumentsController::class, 'download'])
    ->name('other-documents.download');
    Route::get('/other-documents', [OtherDocumentsController::class, 'index'])->name('other-documents.index');
    Route::get('/other-documents/create', [OtherDocumentsController::class, 'create'])->name('other-documents.create');
    Route::post('/other-documents', [OtherDocumentsController::class, 'store'])->name('other-documents.store');
    Route::get('/other-documents/{id}/edit', [OtherDocumentsController::class, 'edit'])->name('other-documents.edit');
    Route::put('/other-documents/{id}', [OtherDocumentsController::class, 'update'])->name('other-documents.update');
    Route::delete('/other-documents/{id}', [OtherDocumentsController::class, 'destroy'])->name('other-documents.destroy');


// Client Side Start

//Certificate page
Route::get("/management/certificate/", [ClearanceController::class, 'index'])->name("certificateclient.index");
Route::post("/management/certificate/", [ClearanceController::class, 'store'])->name("certificateclient.store");

//Schedule page
Route::get('/management/schedule/', [ScheduleClientController::class, 'index'])->name("scheduleclientindex.get");
Route::get('/management/schedule/{schedule}', [ScheduleClientController::class, 'show'])->name("scheduleclientshow.get");
Route::get('/management/schedule/print/{schedule_id}', [ScheduleClientController::class, 'printclient'])->name("scheduleclientprint.get");

//Miscellaneous
Route::get('management/home', [HomeController::class, 'resident_home']);
Route::get('/management/news', [HomeController::class, 'resident_news']);
Route::get('/management/info', [HomeController::class, 'info']);
Route::get('/management/docs', [HomeController::class, 'docs']);
Route::get('/management/schedules', [HomeController::class, 'schedules']);

//Account Setting
Route::get('/management/accountsetting', [ResidentAccountController::class, 'index']);
Route::get("/management/{resident_id}/edit", [ResidentAccountController::class, 'edit']);
Route::post("/management/accountsetting/check",[ResidentAccountController::class, 'clientaccountsettingcheck'])->name("client_accountsetting_check");

//Blotter
Route::get("/management/blotter/{residentid}", [ClientBlotterController::class, 'index']);
Route::get("/management/blotter/pdf/{resident_id}/{blotterid}", [ClientBlotterController::class, 'pdf']);
Route::resource("/management/blotter", ClientBlotterController::class);

// Client Login
Route::get("/management/login", [ResidentUserAccountController::class, 'client_login']);
Route::post("/management/login", [ResidentUserAccountController::class, 'client_check']);
Route::get("/management/register", [ResidentUserAccountController::class, 'client_register']);
Route::post("/management/register", [ResidentUserAccountController::class, 'client_register_check']);
Route::get("/management/logout", [ResidentUserAccountController::class, 'client_logout']);
Route::get("/management/forgot_password", [ResidentUserAccountController::class, 'client_forgot_password']);



//barangay Side End





























//Testing Area
Route::resource('books', BooksController::class);
Route::get('/invoice', function () {
    return view('Testing.invoice');
    $pdf = PDF::loadView('Testing.invoice')->setOptions(['defaultFont' => 'sans-serif']);;
    return $pdf->download('invoice.pdf');
});
Route::get('/invoice-pdf', function () {
    //   return view('/invoice-pdf');
    $pdf = PDF::loadView('Testing.invoice-pdf')->setOptions(['defaultFont' => 'sans-serif', 'isRemoteEnabled' => true, 'format' => 'letter']);;
    return $pdf->download('invoice.pdf');
});

Route::get('/certificates', function () {
    return view('Testing.certificate');
});
Route::get('/certificate-pdf', function () {
    return view('Testing.certificate-pdf');
    $pdf = PDF::loadView('Testing.certificate-pdf')->setPaper('A4','portrait')->setOptions(['defaultFont' => 'sans-serif','isRemoteEnabled' => true]) ;
    return $pdf->download('certificate.pdf');
});
Route::resource('books', BooksController::class);
Route::get('sampledata', [PagesController::class, 'sampledata']);

// Testing Area End

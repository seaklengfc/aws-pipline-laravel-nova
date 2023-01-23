<?php

use App\Const\PermissionActionConstant;
use App\Const\PermissionConstant;
use App\Util\PermissionHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

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

Route::get('/index', function () {
    return redirect('/');
})->name('index');

Route::get('/health', function () {
    return "OK";
});

Route::get('/info', function () {
    echo phpinfo();
});

// Clear application cache:
Route::get('/clear-cache', function() {
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    return 'Application cache has been cleared';
});

Route::get('/connection', function () {
    if(DB::connection()->getDatabaseName())
    {
        return "Connected to database ".DB::connection()->getDatabaseName();
    }
    return 'Connection Failed';
});

Route::group(['middleware' => ['auth']], function () {

    Route::get('export/transaction/{startDate}/{endDate}', function ($startDate, $endDate){
        return Excel::download(
            new \App\Exports\ExportTransaction($startDate, $endDate),
            "report_". $startDate ."_". $endDate .".xlsx"
        );
    });

    Route::get('export/transaction/{startDate}/{endDate}', function ($startDate, $endDate){
        return Excel::download(
            new \App\Exports\ExportTransaction($startDate, $endDate),
            "report_". $startDate ."_". $endDate .".xlsx"
        );
    });
});


<?php

use App\Http\Controllers\azaleaController;
use App\Http\Controllers\akasiaController;
use App\Http\Controllers\asokaController;
use App\Http\Controllers\perinatologiController;
use App\Http\Controllers\intensifdewasaController;
use App\Http\Controllers\anthuriumController;
use App\Http\Controllers\bedController;
use App\Http\Controllers\CleaningController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\dokterController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\pendaftaranController;
use App\Http\Controllers\penjaminController;
use App\Http\Controllers\ppjaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AllysumController;
use App\Http\Controllers\AlamandaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[loginController::class,'index']);


Route::controller(loginController::class)->group(function(){
    Route::get('login','index')->name('login');
    Route::post('login-proses','proses')->name('login.proses');
    Route::get('/logout','logout')->name('logout');
});

Route::middleware('auth')->group(function(){
    Route::post('dashboard/mulaiBersihkan/{id}',[CleaningController::class,'MulaiBersihkan'])->name('cleaning.MulaiBersihkan');
    Route::post('dashboard/selesaiBersihkan/{id}',[CleaningController::class,'SelesaiBersihkan'])->name('cleaning.SelesaiBersihkan');
    Route::resource('dashboard',dashboardController::class);
    Route::controller(bedController::class)->group(function(){
        Route::get('master/bed','index')->name('bed.index');
        Route::post('master/bed/store','store')->name('bed.store');
        Route::get('master/bed/{id}/edit','edit')->name('bed.edit');
        Route::get('master/bed/{id}/nonaktif','bedNonaktif')->name('bed.Nonaktif');
        Route::get('master/bed/{id}/aktif','bedAktif')->name('bed.Aktif');
        Route::get('master/bed/{id}/Delete','bedDelete')->name('bed.Delete');
    });
    
    Route::controller(LaporanController::class)->group(function(){
        Route::get('laporan/index','index')->name('laporan.index');
        Route::get('laporan/index/sortirdata','getDataDokter')->name('laporan.getDataDokter');
        Route::get('laporan/index/ppja','getDataPPJA')->name('laporan.getDataPPJA');
    });

    Route::controller(dokterController::class)->group(function(){
        Route::get('master/dokter','index')->name('dokter.index');
        Route::post('master/dokter/store','store')->name('dokter.store');
        Route::get('master/dokter/{id}/nonaktif','nonaktif')->name('dokter.nonaktif');
        Route::get('master/dokter/{id}/aktif','aktif')->name('dokter.aktif');
        // Route::get('master/dokter/{id}/Delete','delete')->name('dokter.Delete');
    });

    Route::controller(penjaminController::class)->group(function(){
        Route::get('master/penjamin','index')->name('penjamin.index');
        Route::get('master/penjamin/{id}/nonaktif','nonaktif')->name('penjamin.nonaktif');
        Route::get('master/penjamin/{id}/aktif','aktif')->name('penjamin.aktif');
    });

    Route::controller(ppjaController::class)->group(function(){
        Route::get('master/ppja','index')->name('ppja.index');
        Route::post('master/ppja/{id}/update','update')->name('ppja.update');
        Route::post('master/ppja/tambahperawat','tambahperawat')->name('ppja.tambahperawat');
        Route::get('master/ppja/{id}/aktif','aktif')->name('ppja.aktif');
        Route::get('master/ppja/{id}/nonaktif','nonaktif')->name('ppja.nonaktif');

    });

    Route::resource('pendaftaran',pendaftaranController::class);

    Route::controller(azaleaController::class)->group(function(){
        Route::get('azalea','index')->name('azalea.index');
        Route::get('azalea/{id}/edit','edit')->name('azalea.edit');
        Route::get('azalea/{id}/approve','approveBooking')->name('azalea.approveBooking');
        Route::get('azalea/{id}/batalranap','batalranap')->name('azalea.batalranap');
        Route::get('azalea/{id}/rencanapulang', 'rencanaPulang')->name('azalea.rencanaPulang');
        Route::get('azalea/{id}/batalrencanapulang', 'batalrencanaPulang')->name('azalea.batalrencanaPulang');
        Route::get('azalea/{id}/pulangkanpasien', 'pulangkanPasien')->name('azalea.pulangkanPasien');
        Route::get('azalea/{id}/cleaned', 'cleaned')->name('azalea.cleaned');
        Route::post('azalea/{id}/updatebed','updatebed')->name('azalea.updatebed');
        Route::put('azalea/{id}/hci', 'hci')->name('azalea.hci');
        Route::post('azalea/{id}/updateDatapasien', 'updateDatapasien')->name('azalea.updateDatapasien');
        Route::post('azalea/{id}/updateDataMedisPasien','updateDataMedisPasien')->name('azalea.updateDataMedisPasien');
        Route::post('azalea/{id}/updatePpjaPasien','updatePpjaPasien')->name('azalea.updatePpjaPasien');
        Route::get('azalea/{id}/renovasi','renovasi')->name('azalea.renovasi');
        Route::get('azalea/{id}/batalRenovasi','batalRenovasi')->name('azalea.batalRenovasi');
        Route::get('azalea/{id}/doneRenovasi','doneRenovasi')->name('azalea.doneRenovasi');
        Route::get('azalea/{id}/hciClear', 'hciClear')->name('azalea.hciClear');
    });

    Route::controller(akasiaController::class)->group(function(){
        Route::get('akasia','index')->name('akasia.index');
        Route::get('akasia/{id}/edit','edit')->name('akasia.edit');
        Route::get('akasia/{id}/approve','approveBooking')->name('akasia.approveBooking');
        Route::get('akasia/{id}/batalranap','batalranap')->name('akasia.batalranap');
        Route::get('akasia/{id}/rencanapulang','rencanaPulang')->name('akasia.rencanaPulang');
        Route::get('akasia/{id}/batalrencanapulang', 'batalrencanaPulang')->name('akasia.batalrencanaPulang');
        Route::get('akasia/{id}/pulangkanpasien', 'pulangkanPasien')->name('akasia.pulangkanPasien');
        Route::get('akasia/{id}/cleaned', 'cleaned')->name('akasia.cleaned');
        Route::post('akasia/{id}/updatebed', 'updatebed')->name('akasia.updatebed');
        Route::put('akasia/{id}/hci', 'hci')->name('akasia.hci');
        Route::post('akasia/{id}/updateDatapasien', 'updateDatapasien')->name('akasia.updateDatapasien');
        Route::post('akasia/{id}/updateDataMedisPasien','updateDataMedisPasien')->name('akasia.updateDataMedisPasien');
        Route::post('akasia/{id}/updatePpjaPasien','updatePpjaPasien')->name('akasia.updatePpjaPasien');
        Route::get('akasia/{id}/renovasi','renovasi')->name('akasia.renovasi');
        Route::get('akasia/{id}/batalRenovasi','batalRenovasi')->name('akasia.batalRenovasi');
        Route::get('akasia/{id}/doneRenovasi','doneRenovasi')->name('akasia.doneRenovasi');
        Route::get('akasia/{id}/hciClear', 'hciClear')->name('akasia.hciClear');
    });

    Route::controller(asokaController::class)->group(function(){
        Route::get('asoka','index')->name('asoka.index');
        Route::get('asoka/{id}/edit','edit')->name('asoka.edit');
        Route::get('asoka/{id}/approve', 'approveBooking')->name('asoka.approveBooking');
        Route::get('asoka/{id}/batalranap', 'batalranap')->name('asoka.batalranap');
        Route::get('asoka/{id}/rencanapulang', 'rencanaPulang')->name('asoka.rencanaPulang');
        Route::get('asoka/{id}/batalrencanapulang', 'batalrencanaPulang')->name('asoka.batalrencanaPulang');
        Route::get('asoka/{id}/pulangkanpasien', 'pulangkanPasien')->name('asoka.pulangkanPasien');
        Route::get('asoka/{id}/cleaned', 'cleaned')->name('asoka.cleaned');
        Route::post('asoka/{id}/updatebed', 'updatebed')->name('asoka.updatebed');
        Route::put('asoka/{id}/hci', 'hci')->name('asoka.hci');
        Route::post('asoka/{id}/updateDatapasien', 'updateDatapasien')->name('asoka.updateDatapasien');
        Route::post('asoka/{id}/updateDataMedisPasien','updateDataMedisPasien')->name('asoka.updateDataMedisPasien');
        Route::post('asoka/{id}/updatePpjaPasien','updatePpjaPasien')->name('asoka.updatePpjaPasien');
        Route::get('asoka/{id}/renovasi','renovasi')->name('asoka.renovasi');
        Route::get('asoka/{id}/batalRenovasi','batalRenovasi')->name('asoka.batalRenovasi');
        Route::get('asoka/{id}/doneRenovasi','doneRenovasi')->name('asoka.doneRenovasi');
        Route::get('asoka/{id}/hciClear', 'hciClear')->name('asoka.hciClear');
    });

    Route::controller(anthuriumController::class)->group(function(){
        Route::get('anthurium','index')->name('anthurium.index');
        Route::get('anthurium/{id}/edit', 'edit')->name('anthurium.edit');
        Route::get('anthurium/{id}/approve', 'approveBooking')->name('anthurium.approveBooking');
        Route::get('anthurium/{id}/batalranap', 'batalranap')->name('anthurium.batalranap');
        Route::get('anthurium/{id}/rencanapulang', 'rencanaPulang')->name('anthurium.rencanaPulang');
        Route::get('anthurium/{id}/batalrencanapulang', 'batalrencanaPulang')->name('anthurium.batalrencanaPulang');
        Route::get('anthurium/{id}/pulangkanpasien', 'pulangkanPasien')->name('anthurium.pulangkanPasien');
        Route::get('anthurium/{id}/cleaned','cleaned')->name('anthurium.cleaned');
        Route::post('anthurium/{id}/updatebed', 'updatebed')->name('anthurium.updatebed');
        Route::put('anthurium/{id}/hci', 'hci')->name('anthurium.hci');
        Route::post('anthurium/{id}/updateDatapasien', 'updateDatapasien')->name('anthurium.updateDatapasien');
        Route::post('anthurium/{id}/updateDataMedisPasien','updateDataMedisPasien')->name('anthurium.updateDataMedisPasien');
        Route::post('anthurium/{id}/updatePpjaPasien','updatePpjaPasien')->name('anthurium.updatePpjaPasien');
        Route::get('anthurium/{id}/renovasi','renovasi')->name('anthurium.renovasi');
        Route::get('anthurium/{id}/batalRenovasi','batalRenovasi')->name('anthurium.batalRenovasi');
        Route::get('anthurium/{id}/doneRenovasi','doneRenovasi')->name('anthurium.doneRenovasi');
        Route::get('anthurium/{id}/hciClear', 'hciClear')->name('anthurium.hciClear');
    });

    Route::controller(perinatologiController::class)->group(function(){
        Route::get('perinatologi', 'index')->name('perinatologi.index');
        Route::get('perinatologi/{id}/edit', 'edit')->name('perinatologi.edit');
        Route::get('perinatologi/{id}/approve', 'approveBooking')->name('perinatologi.approveBooking');
        Route::get('perinatologi/{id}/batalranap', 'batalranap')->name('perinatologi.batalranap');
        Route::get('perinatologi/{id}/rencanapulang', [perinatologiController::class, 'rencanaPulang'])->name('perinatologi.rencanaPulang');
        Route::get('perinatologi/{id}/batalrencanapulang', [perinatologiController::class, 'batalrencanaPulang'])->name('perinatologi.batalrencanaPulang');
        Route::get('perinatologi/{id}/pulangkanpasien', [perinatologiController::class, 'pulangkanPasien'])->name('perinatologi.pulangkanPasien');
        Route::get('perinatologi/{id}/cleaned', [perinatologiController::class, 'cleaned'])->name('perinatologi.cleaned');
        Route::post('perinatologi/{id}/updatebed', [perinatologiController::class, 'updatebed'])->name('perinatologi.updatebed');
        Route::put('perinatologi/{id}/hci', 'hci')->name('perinatologi.hci');
        Route::post('perinatologi/{id}/updateDatapasien', [perinatologiController::class, 'updateDatapasien'])->name('perinatologi.updateDatapasien');
        Route::post('perinatologi/{id}/updateDataMedisPasien','updateDataMedisPasien')->name('perinatologi.updateDataMedisPasien');
        Route::post('perinatologi/{id}/updatePpjaPasien','updatePpjaPasien')->name('perinatologi.updatePpjaPasien');
        Route::get('perinatologi/{id}/renovasi','renovasi')->name('perinatologi.renovasi');
        Route::get('perinatologi/{id}/batalRenovasi','batalRenovasi')->name('perinatologi.batalRenovasi');
        Route::get('perinatologi/{id}/doneRenovasi','doneRenovasi')->name('perinatologi.doneRenovasi');
        Route::get('perinatologi/{id}/hciClear', 'hciClear')->name('perinatologi.hciClear');
    });

    Route::controller(intensifdewasaController::class)->group(function(){
        Route::get('intensifdewasa', 'index')->name('intensifdewasa.index');
        Route::get('intensifdewasa/{id}/edit', 'edit')->name('intensifdewasa.edit');
        Route::get('intensifdewasa/{id}/approve', 'approveBooking')->name('intensifdewasa.approveBooking');
        Route::get('intensifdewasa/{id}/batalranap', 'batalranap')->name('intensifdewasa.batalranap');
        Route::get('intensifdewasa/{id}/rencanapulang', 'rencanaPulang')->name('intensifdewasa.rencanaPulang');
        Route::get('intensifdewasa/{id}/batalrencanapulang', 'batalrencanaPulang')->name('intensifdewasa.batalrencanaPulang');
        Route::get('intensifdewasa/{id}/pulangkanpasien', 'pulangkanPasien')->name('intensifdewasa.pulangkanPasien');
        Route::get('intensifdewasa/{id}/cleaned', 'cleaned')->name('intensifdewasa.cleaned');
        Route::post('intensifdewasa/{id}/updatebed', 'updatebed')->name('intensifdewasa.updatebed');
        Route::put('intensifdewasa/{id}/hci', 'hci')->name('intensifdewasa.hci');
        Route::post('intensifdewasa/{id}/updateDatapasien', 'updateDatapasien')->name('intensifdewasa.updateDatapasien');
        Route::post('intensifdewasa/{id}/updateDataMedisPasien','updateDataMedisPasien')->name('intensifdewasa.updateDataMedisPasien');
        Route::post('intensifdewasa/{id}/updatePpjaPasien','updatePpjaPasien')->name('intensifdewasa.updatePpjaPasien');
        Route::get('intensifdewasa/{id}/renovasi','renovasi')->name('intensifdewasa.renovasi');
        Route::get('intensifdewasa/{id}/batalRenovasi','batalRenovasi')->name('intensifdewasa.batalRenovasi');
        Route::get('intensifdewasa/{id}/doneRenovasi','doneRenovasi')->name('intensifdewasa.doneRenovasi');
    });
    
    Route::controller(AllysumController::class)->group(function(){
        Route::get('allysum','index')->name('allysum.index');
        Route::get('allysum/{id}/edit', 'edit')->name('allysum.edit');
        Route::get('allysum/{id}/approve', 'approveBooking')->name('allysum.approveBooking');
        Route::get('allysum/{id}/batalranap', 'batalranap')->name('allysum.batalranap');
        Route::get('allysum/{id}/rencanapulang', 'rencanaPulang')->name('allysum.rencanaPulang');
        Route::get('allysum/{id}/batalrencanapulang', 'batalrencanaPulang')->name('allysum.batalrencanaPulang');
        Route::get('allysum/{id}/pulangkanpasien', 'pulangkanPasien')->name('allysum.pulangkanPasien');
        Route::get('allysum/{id}/cleaned', 'cleaned')->name('allysum.cleaned');
        Route::post('allysum/{id}/updatebed', 'updatebed')->name('allysum.updatebed');
        Route::put('allysum/{id}/hci', 'hci')->name('allysum.hci');
        Route::post('allysum/{id}/updateDatapasien', 'updateDatapasien')->name('allysum.updateDatapasien');
        Route::post('allysum/{id}/updateDataMedisPasien','updateDataMedisPasien')->name('allysum.updateDataMedisPasien');
        Route::post('allysum/{id}/updatePpjaPasien','updatePpjaPasien')->name('allysum.updatePpjaPasien');
        Route::get('allysum/{id}/hciClear','hciClear')->name('allysum.hciClear');
    });
    
    Route::controller(AlamandaController::class)->group(Function(){
        Route::get('alamanda','index')->name('alamanda.index');
        Route::get('alamanda/{id}/edit','edit')->name('alamanda.edit');
        Route::get('alamanda/{id}/approve','approveBooking')->name('alamanda.approveBooking');
        Route::get('alamanda/{id}/batalranap','batalranap')->name('alamanda.batalranap');
        Route::get('alamanda/{id}/rencanapulang','rencanaPulang')->name('alamanda.rencanaPulang');
        Route::get('alamanda/{id}/batalrencanapulang','batalrencanaPulang')->name('alamanda.batalrencanaPulang');
        Route::get('alamanda/{id}/pulangkanpasien','pulangkanPasien')->name('alamanda.pulangkanPasien');
        Route::get('alamanda/{id}/cleaned','cleaned')->name('alamanda.cleaned');
        Route::post('alamanda/{id}/updatebed','updatebed')->name('alamanda.updatebed');
        Route::put('alamanda/{id}/hci','hci')->name('alamanda.hci');
        Route::post('alamanda/{id}/updateDatapasien','updateDatapasien')->name('alamanda.updateDatapasien');
        Route::post('alamanda/{id}/updateDataMedisPasien','updateDataMedisPasien')->name('alamanda.updateDataMedisPasien');
        Route::post('alamanda/{id}/updatePpjaPasien','updatePpjaPasien')->name('alamanda.updatePpjaPasien');
        Route::get('alamanda/{id}/hciClear','hciClear')->name('alamanda.hciClear');
    });
    
});
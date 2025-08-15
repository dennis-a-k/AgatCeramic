<?php

use App\Http\Controllers\AppDataController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/admin-panel/app-data',
    'middleware' => ['auth', 'verified'],
], function () {
    Route::get('/', [AppDataController::class, 'index'])->name('app.data');
    Route::post('/update-phone', [AppDataController::class, 'updatePhone'])->name('data.update.phone');
    Route::post('/update-email', [AppDataController::class, 'updateEmail'])->name('data.update.email');
    Route::post('/update-organization', [AppDataController::class, 'updateOrganization'])->name('data.update.organization');
    Route::post('/update-inn', [AppDataController::class, 'updateINN'])->name('data.update.inn');
    Route::post('/update-ogrn', [AppDataController::class, 'updateOGRN'])->name('data.update.ogrn');
    Route::post('/update-okato', [AppDataController::class, 'updateOKATO'])->name('data.update.okato');
    Route::post('/update-okpo', [AppDataController::class, 'updateOKPO'])->name('data.update.okpo');
    Route::post('/update-bank', [AppDataController::class, 'updateBank'])->name('data.update.bank');
    Route::post('/update-bik', [AppDataController::class, 'updateBIK'])->name('data.update.bik');
    Route::post('/update-k_s', [AppDataController::class, 'updateK_s'])->name('data.update.k_s');
    Route::post('/update-r_s', [AppDataController::class, 'updateR_s'])->name('data.update.r_s');
    Route::post('/update-adress', [AppDataController::class, 'updateAdress'])->name('data.update.adress');
    Route::post('/update-telegram', [AppDataController::class, 'updateTelegram'])->name('data.update.telegram');
    Route::post('/update-whatsapp', [AppDataController::class, 'updateWhatsApp'])->name('data.update.whatsapp');
});

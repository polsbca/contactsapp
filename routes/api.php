<?php
use App\Http\Controllers\ContactController;

Route::apiResource('contacts', ContactController::class);
Route::post('contacts/import-xml', [ContactController::class, 'importXML']);

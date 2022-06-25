<?php

use App\Http\Controllers\Datatables\DraftDatatables;
use App\Http\Controllers\Datatables\PublishDatatables;
use App\Http\Controllers\Datatables\ThrashDatatables;
use Illuminate\Support\Facades\Route;

Route::post('datatables-publish', PublishDatatables::class)->name('datatables.publish');
Route::post('datatables-draft', DraftDatatables::class)->name('datatables.draft');
Route::post('datatables-thrash', ThrashDatatables::class)->name('datatables.thrash');
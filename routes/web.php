<?php

use App\Livewire\EditableTable;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', EditableTable::class)->name('editable.table');

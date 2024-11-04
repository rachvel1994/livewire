<?php

use App\Livewire\EditableTable;
use Illuminate\Support\Facades\Route;

Route::get('/', EditableTable::class)->name('editable.table');

<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;

class EditableTable extends Component
{
    private string $cacheKey = 'rows';

    public array $rows = [['alpineInput' => '', 'input' => '']];

    public function mount(): void
    {
        $this->rows = Cache::get($this->cacheKey, [['alpineInput' => '', 'input' => '']]);
    }

    public function addRow(): void
    {
        $this->rows[] = ['alpineInput' => '', 'input' => ''];
    }

    public function removeRow($key): void
    {
        unset($this->rows[$key]);
        $this->rows = array_values($this->rows);
    }

    public function save(array $rows): void
    {
        $this->rows = $rows;
        Cache::put($this->cacheKey, $this->rows);
    }

    public function render(): View
    {
        return view('livewire.editable-table')->title('Динамическая таблица');
    }
}

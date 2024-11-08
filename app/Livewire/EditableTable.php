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

    public function hydrate(): void
    {
        $this->dispatch('save');
    }

    public function saveRows(array $rows): void
    {
        $this->rows = $rows;
        Cache::put($this->cacheKey, $this->rows);
    }

    public function render(): View
    {
        return view('livewire.editable-table')->title('Динамическая таблица');
    }
}

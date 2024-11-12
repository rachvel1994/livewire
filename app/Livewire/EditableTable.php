<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;

class EditableTable extends Component
{
    private string $cacheKey = 'rows';
    public bool $shouldHydrate = true;
    public array $rows = [['alpineInput' => '', 'input' => '']];

    public function mount(): void
    {
        $this->shouldHydrate = true;
        $this->rows = Cache::get($this->cacheKey, [['alpineInput' => '', 'input' => '']]);
    }

    public function boot(): void
    {
        if ($this->shouldHydrate){
            $this->dispatch('save');
            $this->shouldHydrate = false;
        }
    }


    public function saveRows(array $rows): void
    {
        $this->rows = $rows;
        Cache::put($this->cacheKey, $this->rows);
        $this->shouldHydrate = true;
        $this->redirect('/');
    }

    public function render(): View
    {
        return view('livewire.editable-table')->title('Динамическая таблица');
    }
}

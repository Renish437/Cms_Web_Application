<?php

namespace App\Livewire\Filament\Widgets;

use Filament\Widgets\Widget;
use Livewire\Component;

class MyCustomWidget extends Widget
{
    protected $listeners = ['refresh-all-components' => '$refresh'];

    protected static string $view = 'filament.widgets.my-custom-widget';

}

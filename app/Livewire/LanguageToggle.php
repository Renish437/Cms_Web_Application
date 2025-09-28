<?php
namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageToggle extends Component
{
    public $currentLang;
    public $availableLangs;

    protected $listeners = ['refresh-all-components' => '$refresh'];

    public function mount()
    {
        $this->currentLang = Session::get('locale', App::getLocale());
        $this->availableLangs = config('languages');
    }

    public function switchLang($lang)
    {
        if (array_key_exists($lang, $this->availableLangs)) {
            Session::put('locale', $lang);
            App::setLocale($lang);
            $this->currentLang = $lang;

            // // SPA-style refresh of this component
            // $this->refresh(); // Livewire v3 method
            // $this->js('window.location.reload()');
// Emit the global event
        $this->dispatch('refresh-all-components');
        }
    }

    public function render()
    {
        return view('livewire.language-toggle');
    }
}

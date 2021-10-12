<?php

namespace App\Http\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class Profile extends Component {

    public string $email = '';
    public string $name = '';
    public string $roles = '';

    public function mount()
    {
        $this->email = auth()->user()->email;
        $this->name = auth()->user()->name;
        $this->roles = auth()->user()->getRoleNames()->map(function ($role) {
            return ucwords(str_replace('-', ' ', $role));
        })->join(', ', __(', and '));
    }

    public function render(): View
    {
        return view('livewire.profile');
    }
}

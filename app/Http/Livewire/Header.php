<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Header extends Component
{
    public $user;
    public $isAdmin;

    public function mount()
    {
        $this->setUser();
    }

    protected function setUser()
    {
        if(!!auth()->user()){
            $this->user = User::find(auth()->user()->id);
            $this->isAdmin = $this->checkIsAdmin();
        }
    }

    protected function checkIsAdmin()
    {
        return $this->user->isAdmin;
    }

    public function render()
    {
        return view('livewire.header');
    }
}

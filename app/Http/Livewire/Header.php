<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Header extends Component
{
    public $user;
    public $name;
    public $isAdmin;
    public $email, $password, $password_confirmation;

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

    public function registerUser(){
        $this->user = User::create(['email' => $this->email, 'password' => Hash::make($this->password), 'name' => $this->name]);
        Auth::guard('web')->login($this->user);
        return redirect()->to('/');
    }

    public function render()
    {
        return view('livewire.header');
    }
}

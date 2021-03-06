<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Header extends Component
{
    public $user;
    public $name;
    public $isAdmin;
    public $email, $password, $password_confirmation, $new_password, $new_email, $videocount;

    public function mount()
    {
        $this->setUser();
        $this->videocount = Video::count();
    }

    protected $messages = [
        'name.required' => 'Обязательное поле.',
        'name.min' => 'Имя минимум 3 символа.',
        'email.required' => 'Обязательное поле.',
        'email.email' => 'Email в формате email@domain.com',
        'new_email.required' => 'Обязательное поле.',
        'new_email.email' => 'Email в формате email@domain.com',
        'new_email.unique' => 'Эта почта уже зарегистрированна',
        'password.min' => 'Пароль минимум 6 символов',
        'password.string' => 'Обязательное поле.',
        'new_password.min' => 'Пароль минимум 6 символов',
        'new_password.required' => 'Обязательное поле.',
        'password_confirmation.same' => 'Пароли должны совпадать',
    ];

    protected $rules = [
        'name' => 'min:3',
        'email' => 'email',
        'new_email' => 'email|unique:users,email',
        'new_password' => 'min:6',
        'password_confirmation' => 'same:new_password'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    protected function setUser()
    {
        if(!!auth()->user()){
            $this->user = User::find(auth()->user()->id);
            $this->isAdmin = $this->checkIsAdmin();
        }
    }

    public function authUser()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'string',
        ]);
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            $this->setUser();
            return redirect()->to('/');
        }
        $this->addError('email', 'Учетные данные не верны.');
    }

    public function logoutUser()
    {
        Auth::logout();
        return redirect()->to('/');
    }

    protected function checkIsAdmin()
    {
        return $this->user->isAdmin;
    }

    public function registerUser(){

        $this->validate([
            'name' => 'required|min:3',
            'new_email' => 'required|email|unique:users,email',
            'new_password' => 'required|min:6',
            'password_confirmation' => 'same:new_password'
        ]);
        $this->user = User::create(['email' => $this->new_email, 'password' => Hash::make($this->new_password), 'name' => $this->name]);
        Auth::guard('web')->login($this->user);
        return redirect()->to('/');
    }

    public function changePassword()
    {
        $this->validate([
            'new_password' => 'required|min:6',
            'password_confirmation' => 'same:new_password'
        ]);
        $this->user->update(['password' => Hash::make($this->new_password)]);
        return redirect()->to('/');
    }

    public function render()
    {
        return view('livewire.header');
    }
}

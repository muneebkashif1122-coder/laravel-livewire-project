<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;

#[Title('Admin Login Portal')]
class AdminLogin extends Component
{
    public $email = '';
    public $password = '';

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function render()
    {
        return view('livewire.admin-login');
    }

    public function submitLogin()
    {
        $this->validate();

        if (Auth::guard('admins')->attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->regenerate();
            return redirect()->to('/dashboard');
        }

        $this->addError('email', 'The credentials provided do not match our records.');
    }
}



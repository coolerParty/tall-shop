<?php

namespace App\Http\Livewire\User\Password;

use App\Http\Requests\user\password\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserChangePasswordComponent extends Component
{
    public $current_password;
    public $password;
    public $password_confirmation;

    public function rules(): array
    {
        return (new UserRequest())->rules();
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function changePassword()
    {
        $this->validate();

        if (Hash::check($this->current_password, Auth::user()->password)) {
            $user = User::findorFail(Auth::user()->id);
            $user->password = Hash::make($this->password);
            $user->save();
            Session()->flash('password_success', 'Password has been changed successfully!');
        } else {
            Session()->flash('password_error', 'Password does not match!');
        }
    }

    public function render()
    {
        return view('livewire.user.password.user-change-password-component')->layout('layouts.front');
    }
}

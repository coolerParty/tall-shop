<?php

namespace App\Http\Livewire\User;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserProfileComponent extends Component
{
    public function render()
    {
        $userProfile = Profile::select('id', 'user_id', 'image', 'mobile', 'line1', 'line2', 'city', 'province', 'country', 'zipcode')
            ->where('user_id', Auth::user()->id)->first();
        if (!$userProfile) {
            $profile = new Profile();
            $profile->user_id = Auth::user()->id;
            $profile->save();
            return redirect()->to(route('user.profile'));
        }
        $user = User::select('name', 'lastname', 'email', 'profile_photo_path')->find(Auth::user()->id);

        return view('livewire.user.user-profile-component', ['userProfile' => $userProfile, 'user' => $user])
                            ->layout('layouts.front');
    }
}

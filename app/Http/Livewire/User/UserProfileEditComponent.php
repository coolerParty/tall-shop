<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class UserProfileEditComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $lastname;
    public $email;
    public $profile_photo_path;

    public $mobile;
    public $line1;
    public $line2;
    public $city;
    public $province;
    public $country;
    public $zipcode;

    public $newimage;

    public function mount()
    {
        $userProfile = Profile::select('id', 'user_id', 'mobile', 'line1', 'line2', 'city', 'province', 'country', 'zipcode')
            ->where('user_id', Auth::user()->id)->first();

        if (empty($userProfile)) {
            $profile = new Profile();
            $profile->user_id = Auth::user()->id;
            $profile->save();
            return redirect()->to(route('user.profile.edit'));
        }

        $this->mobile   = $userProfile->mobile;
        $this->line1    = $userProfile->line1;
        $this->line2    = $userProfile->line2;
        $this->city     = $userProfile->city;
        $this->province = $userProfile->province;
        $this->country  = $userProfile->country;
        $this->zipcode  = $userProfile->zipcode;

        $user = User::select('name', 'lastname', 'email','profile_photo_path')->where('id', Auth::user()->id)->first();
        $this->name               = $user->name;
        $this->lastname           = $user->lastname;
        $this->email              = $user->email;
        $this->profile_photo_path = $user->profile_photo_path;
    }

    public function updated($fields)
    {

        $this->validateOnly($fields, [
            'name'     => ['required', 'min:3'],
            'lastname' => ['required', 'min:3'],
            'email'    => ['required', 'max:150', Rule::unique('users')->ignore(Auth::user()->id)],
            'mobile'   => ['nullable', 'numeric', 'min:11'],
            'line1'    => ['nullable'],
            'line2'    => ['nullable'],
            'city'     => ['nullable'],
            'province' => ['nullable'],
            'country'  => ['nullable'],
            'zipcode'  => ['nullable'],

        ]);

        if ($this->newimage) {
            $this->validateOnly($fields, ['newimage' => 'required|mimes:jpeg,jpg,png|max:2000',]);
        }
    }

    public function update()
    {
        $this->validate([
            'name'     => ['required', 'min:3'],
            'lastname' => ['required', 'min:3'],
            'email'    => ['required', 'max:150', Rule::unique('users')->ignore(Auth::user()->id)],
            'mobile'   => ['nullable', 'numeric', 'min:11'],
            'line1'    => ['nullable'],
            'line2'    => ['nullable'],
            'city'     => ['nullable'],
            'province' => ['nullable'],
            'country'  => ['nullable'],
            'zipcode'  => ['nullable'],
        ]);

        $profile           = Profile::where('user_id', Auth::user()->id)->first();
        $profile->mobile   = $this->mobile;
        $profile->line1    = $this->line1;
        $profile->line2    = $this->line2;
        $profile->city     = $this->city;
        $profile->province = $this->province;
        $profile->country  = $this->country;
        $profile->zipcode  = $this->zipcode;

        $profile->save();

        $user           = User::find(Auth::user()->id);
        $user->name     = $this->name;
        $user->lastname = $this->lastname;
        $user->email    = $this->email;
        if ($this->newimage) {
            if (!empty($user->profile_photo_path) && file_exists('storage/assets/user/profile-photo/large' . '/' . $user->profile_photo_path)) {
                unlink('storage/assets/user/profile-photo/large' . '/' . $user->profile_photo_path); // Deleting Image
            }
            if (!empty($user->profile_photo_path) && file_exists('storage/assets/user/profile-photo/thumbnail' . '/' . $user->profile_photo_path)) {
                unlink('storage/assets/user/profile-photo/thumbnail' . '/' . $user->profile_photo_path); // Deleting Image
            }
            $imagename     = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $originalPath  = storage_path() . '/app/public/assets/user/profile-photo/large/';
            $thumbnailPath = storage_path() . '/app/public/assets/user/profile-photo/thumbnail/';
            $imageFile     = Image::make($this->newimage);
            $imageFile->fit(800, 800);
            $imageFile->save($originalPath . $imagename);
            $imageFile->fit(190, 190);
            $imageFile->save($thumbnailPath . $imagename);
            $user->profile_photo_path = $imagename;
        }
        $user->save();

        session()->flash('message', 'Profile has been updated successfully!');
        return redirect()->to(route('user.profile'));
    }

    public function render()
    {
        return view('livewire.user.user-profile-edit-component')->layout('layouts.front');
    }
}

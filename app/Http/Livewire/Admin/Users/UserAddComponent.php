<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Rules\Password;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserAddComponent extends Component
{
    use AuthorizesRequests;

    use WithFileUploads;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $image;
    public $userRoles = [];

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'password'  => ['required', 'min:8', 'string', new Password, 'confirmed'],
            'email'     => ['required', 'email', 'unique:users'],
            'name'      => ['required', 'min:3'],
            'image'     => ['nullable', 'image', 'max:2048'],
            'userRoles' => ['required'],
        ]);
    }

    public function store()
    {
        $this->confirmation();

        $this->validate([
            'password'  => ['required', 'min:8', 'string', new Password, 'confirmed'],
            'email'     => ['required', 'email', 'unique:users'],
            'name'      => ['required', 'min:3'],
            'image'     => ['nullable', 'image', 'max:2048'],
            'userRoles' => ['required'],
        ]);


        $roles = Role::whereIn('name', ['super-admin'])->pluck('id')->all();

        foreach ($this->userRoles as $p) {
            if (in_array($p, $roles)  && !auth()->user()->can('super-admin')) {
                abort(403);
            }
        }

        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);

        if ($this->image) {
            $imagename = Carbon::now()->timestamp . '.' . $this->image->extension();

            $originalPath   = storage_path() . '/app/public/assets/profile/medium/';
            $thumbnailPath   = storage_path() . '/app/public/assets/profile/small/';
            $thumbnailImage = Image::make($this->image);
            $thumbnailImage->fit(500, 500);
            $thumbnailImage->save($originalPath . $imagename);
            $thumbnailImage->fit(100, 100);
            $thumbnailImage->save($thumbnailPath . $imagename);

            $user->profile_photo_path = $imagename;
        }
        $user->save();

        $user->syncRoles($this->userRoles);

        return redirect()->route('users.index')
            ->with('create-success', 'User "' . $this->name . '" created successfully.');
    }

    public function confirmation()
    {
        // if (!auth()->user()->can('user-create')) {
        //     abort(404);
        // }

        $this->authorize('user-create');
    }

    public function removeImage()
    {
        $this->image = null;
    }

    public function render()
    {
        $this->confirmation();

        if (auth()->user()->can('Super Admin')) {
            $roles = Role::get();
        } else {
            $roles = Role::whereNotIn('name', ['super-admin'])->get();
        }

        return view('livewire.admin.users.user-add-component', ['roles' => $roles])->layout('layouts.base');
    }
}

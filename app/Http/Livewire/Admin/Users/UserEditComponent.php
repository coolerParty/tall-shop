<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Rules\Password;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserEditComponent extends Component
{
    use AuthorizesRequests;

    use WithFileUploads;
    public $user_id;
    public $name;
    public $userRoles = [];

    public function mount($user_id)
    {
        $user = User::where('id', $user_id)->select('id', 'name')->first();
        $this->user_id = $user->id;
        $this->name    = $user->name;

        $this->userRoles = DB::table('model_has_roles')
            ->where('model_has_roles.model_id', $this->user_id)
            ->pluck('model_has_roles.role_id')
            ->all();
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'userRoles' => ['required'],
        ]);
    }

    public function updateUserRole()
    {
        $this->confirmation();

        $this->validate([
            'userRoles' => ['required'],
        ]);

        $roles = Role::whereIn('name', ['super-admin'])->pluck('id')->all();

        foreach ($this->userRoles as $p) {
            if (in_array($p, $roles)  && !auth()->user()->can('super-admin')) {
                abort(403);
            }
        }

        $user = User::where('id', $this->user_id)->first();

        $user->syncRoles($this->userRoles);


        return redirect()->route('users.index')
            ->with('update-success', 'User "' . $user->name . '" updated successfully.');
    }

    public function confirmation()
    {
        // if (!auth()->user()->can('user-edit')) {
        //     abort(404);
        // }

        $this->authorize('user-edit');
    }

    public function render()
    {
        $this->confirmation();

        if (auth()->user()->can('super-admin')) {
            $roles = Role::get();
        } else {
            $roles = Role::whereNotIn('name', ['super-admin'])->get();
        }

        return view('livewire.admin.users.user-edit-component', ['roles' => $roles])->layout('layouts.base');
    }
}

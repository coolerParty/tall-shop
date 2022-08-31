<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserComponent extends Component
{
    use AuthorizesRequests;

    public function destroy($user_id)
    {

        $this->authorize('user-delete');

        $user = User::find($user_id);
        if($user->profile_photo_path)
            {
                unlink('storage/assets/profile/medium'.'/'.$user->profile_photo_path); // Deleting Image
                unlink('storage/assets/profile/small'.'/'.$user->profile_photo_path); // Deleting Image
            }
        $user->delete();

        return redirect()->route('users.index')
            ->with('delete-success', 'User has been deleted successfully.');
    }

    public function render()
    {
        $this->authorize('user-show');

        $users = User::with('roles')->get();

        return view('livewire.admin.users.user-component', ['users'=>$users])->layout('layouts.base');
    }
}

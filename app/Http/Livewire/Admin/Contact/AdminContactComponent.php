<?php

namespace App\Http\Livewire\Admin\Contact;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdminContactComponent extends Component
{
    use AuthorizesRequests;
    use WithPagination;

    public function render()
    {
        $this->authorize('contact-show');

        $contacts = Contact::orderBy('created_at', 'DESC')->paginate(10);
        return view('livewire.admin.contact.admin-contact-component', ['contacts' => $contacts])->layout('layouts.base');
    }
}

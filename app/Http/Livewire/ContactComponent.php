<?php

namespace App\Http\Livewire;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Livewire\Component;

class ContactComponent extends Component
{
    public $name;
    public $email;
    public $phone;
    public $comment;

    public function rules(): array
    {
        return (new ContactRequest())->rules();
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function sendMessage()
    {
        $this->validate();

        $contact          = new Contact();
        $contact->name    = $this->name;
        $contact->email   = $this->email;
        $contact->phone   = $this->phone;
        $contact->comment = $this->comment;
        $contact->save();
        session()->flash('message', 'Thanks, Your message has been sent successfully!.');
        $this->resetMessage();
    }

    public function resetMessage()
    {
        $this->name = "";
        $this->email = "";
        $this->phone = "";
        $this->comment = "";
    }

    public function render()
    {
        return view('livewire.contact-component');
    }
}

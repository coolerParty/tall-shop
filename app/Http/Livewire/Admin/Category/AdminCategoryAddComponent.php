<?php

namespace App\Http\Livewire\Admin\Category;

use App\Http\Requests\Category\CategoryAddRequest;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Str;

class AdminCategoryAddComponent extends Component
{
    use AuthorizesRequests;
    public $name;

    public function rules(): array
    {
        return (new CategoryAddRequest())->rules();
    }

    public function updated($fields)
    {
        // $this->validateOnly($fields, [
        //     'name' => ['required', 'min:3', 'max:30', 'string', 'unique:categories'],
        // ]);
        $this->validateOnly($fields);
    }

    public function store()
    {
        $this->confirmation();

        $this->validate();

        // $this->validate([
        //     'name' => ['required', 'min:3', 'max:30', 'string', 'unique:categories'],
        // ]);

        $category       = new Category();
        $category->name = $this->name;
        $category->slug = Str::slug($this->name);
        $category->save();

        return redirect()->route('admin.category.index')
            ->with('success', 'Category "' . $this->name . '" created successfully.');
    }

    public function confirmation()
    {
        $this->authorize('category-create');
    }

    public function render()
    {
        $this->confirmation();
        return view('livewire.admin.category.admin-category-add-component')->layout('layouts.base');
    }
}

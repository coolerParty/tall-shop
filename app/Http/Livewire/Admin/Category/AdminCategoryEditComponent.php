<?php

namespace App\Http\Livewire\Admin\Category;

use App\Http\Requests\Category\CategoryEditRequest;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminCategoryEditComponent extends Component
{
    use AuthorizesRequests;

    public $name;
    public $category_id;

    public function rules(): array
    {
        return (new CategoryEditRequest())->rules($this->category_id);
    }

    public function mount($category_id)
    {
        $category          = Category::find($category_id);
        $this->category_id = $category->id;
        $this->name        = $category->name;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function update()
    {
        $this->confirmation();
        $this->validate();

        $category       = Category::find($this->category_id);
        $category->name = $this->name;
        $category->slug = Str::slug($this->name);
        $category->save();

        return redirect()->route('admin.category.index')
            ->with('success', 'Category "' . $this->name . '" updated successfully.');
    }

    public function confirmation()
    {
        $this->authorize('category-edit');
    }

    public function render()
    {
        $this->confirmation();

        return view('livewire.admin.category.admin-category-edit-component')->layout('layouts.base');
    }
}

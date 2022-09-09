<?php

namespace App\Http\Livewire\Admin\Category;

use App\Http\Requests\Category\CategoryRequest;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class AdminCategoryComponent extends Component
{
    use AuthorizesRequests;
    use WithPagination;

    public $category_id;
    public $name;
    public $cat; // short for category
    public $showCategoryModal = false;
    public $modalType = 1; // 1 for store, 2 for edit

    public function rules(): array
    {
        return (new CategoryRequest())->rules($this->category_id, $this->modalType);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function showAddModal()
    {
        $this->authorize('category-create');
        $this->resetCategory();
        $this->resetValidation();
        $this->showCategoryModal = true;
        $this->modalType = 1;
    }

    public function showEditModal($category_id)
    {
        $this->authorize('category-edit');
        $this->resetCategory();
        $this->resetValidation();
        $this->modalType = 2;
        $this->category_id = $category_id;
        $this->loadCategory();
        $this->showCategoryModal = true;
    }

    public function loadCategory()
    {
        $this->cat  = Category::findOrFail($this->category_id);
        $this->name = $this->cat->name;
    }

    public function store()
    {
        $this->authorize('category-create');
        $this->validate();

        $category       = new Category();
        $category->name = $this->name;
        $category->slug = Str::slug($this->name);
        $category->save();
        $this->resetCategory();
        return session()->flash('success', 'Category created successfully.');

    }

    public function update()
    {
        $this->authorize('category-edit');
        $this->validate();

        $category       = Category::find($this->category_id);
        $category->name = $this->name;
        $category->slug = Str::slug($this->name);
        $category->save();
        $this->resetCategory();
        return session()->flash('success', 'Category updated successfully.');
    }

    public function closeCategoryModal()
    {
        $this->resetCategory();
    }

    public function resetCategory()
    {
        $this->category_id = '';
        $this->name = '';
        $this->cat = []; // short for category
        $this->showCategoryModal = false;
        $this->modalType = 1;
    }

    public function destroy($category_id)
    {
        $this->authorize('category-delete');

        $category = Category::find($category_id);
        if(empty($category))
        {
            return session()->flash('error', 'No Item Found!');
        }
        $category->delete();
        return session()->flash('success', 'Category has been deleted successfully');
    }

    public function render()
    {
        $this->authorize('category-show');
        $categories = Category::select('id','name','slug')->orderBy('name','ASC')->paginate(10);
        return view('livewire.admin.category.admin-category-component',['categories'=>$categories])->layout('layouts.base');
    }
}

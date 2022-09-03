<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithPagination;

class AdminCategoryComponent extends Component
{
    use AuthorizesRequests;
    use WithPagination;

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

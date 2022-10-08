<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Gallery;
use Livewire\Component;

class GalleryComponent extends Component
{
    public $image_max_number = 12;
    public $category_selected_id = 0;  // 0 means view all category
    public $galleries_total = 0;

    public function viewMoreImage()
    {
        $this->image_max_number = $this->image_max_number + 6;
    }

    public function selectCategory($cat_id)
    {
        $this->category_selected_id = $cat_id;
    }

    public function render()
    {
        $this->galleries_total = Gallery::
        where('active', true)
        ->when($this->category_selected_id <> 0, function ($q) {
            return $q->where('category_id', $this->category_selected_id);
        })
        ->count();

        $galleries = Gallery::with('category')
            ->select('name', 'image', 'category_id')
            ->where('active', true)
            ->when($this->category_selected_id <> 0, function ($q) {
                return $q->where('category_id', $this->category_selected_id);
            })
            ->take($this->image_max_number)
            ->orderBy('created_at', 'ASC')
            ->get();

        $categories = Category::select('id', 'name')
            ->orderBy('name', 'ASC')
            ->get();
        return view('livewire.gallery-component', [
            'galleries' => $galleries, 'categories' => $categories
        ])->layout('layouts.front');
    }
}

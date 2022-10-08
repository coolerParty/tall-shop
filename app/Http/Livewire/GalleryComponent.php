<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Gallery;
use Livewire\Component;

class GalleryComponent extends Component
{
    public function render()
    {
        $galleries = Gallery::with('category')
            ->select('name', 'image', 'category_id')
            ->where('featured', true)
            ->where('active', true)
            ->take(12)
            ->orderBy('created_at', 'ASC')
            ->get();
        $array = $galleries->pluck('category_id');
        $categories = Category::select('name')->whereIn('id', $array)->orderBy('name', 'ASC')->get();
        return view('livewire.gallery-component', ['galleries' => $galleries, 'categories' => $categories]);
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Gallery;
use Livewire\Component;

class GalleryComponent extends Component
{
    public $imageMaxNumber     = 12;
    public $categorySelectedId = 0;   // 0 means view all category
    public $galleriesTotal     = 0;

    public function viewMoreImage()
    {
        $this->imageMaxNumber = $this->imageMaxNumber + 6;
    }

    public function selectCategory($cat_id)
    {
        $this->categorySelectedId = $cat_id;
    }

    public function getTotalCount()
    {
        return Gallery::where('active', true)
            ->when($this->categorySelectedId <> 0, function ($q) {
                return $q->where('category_id', $this->categorySelectedId);
            })
            ->count();
    }

    public function getGalleries()
    {
        return Gallery::with('category')
            ->select('name', 'image', 'category_id')
            ->where('active', true)
            ->when($this->categorySelectedId <> 0, function ($q) {
                return $q->where('category_id', $this->categorySelectedId);
            })
            ->take($this->imageMaxNumber)
            ->orderBy('created_at', 'ASC')
            ->get();
    }

    public function getCategories()
    {
        return Category::select('id', 'name')
            ->orderBy('name', 'ASC')
            ->get();
    }

    public function render()
    {
        $this->galleriesTotal = $this->getTotalCount();
        $galleries = $this->getGalleries();
        $categories = $this->getCategories();

        return view('livewire.gallery-component', [
                        'galleries' => $galleries, 'categories' => $categories
                    ])->layout('layouts.front');
    }
}

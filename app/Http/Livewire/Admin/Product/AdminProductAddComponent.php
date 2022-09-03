<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class AdminProductAddComponent extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;

    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price = 0.00;
    public $sale_price;
    public $stock_status = 'instock';
    public $featured = false;
    public $quantity = 0;
    public $image;
    public $active = false;
    public $category_id;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name'              => ['required', 'min:3', 'max:30', 'string', 'unique:products'],
            'slug'              => ['required', 'string'],
            'short_description' => ['required', 'min:5', 'max:150'],
            'description'       => ['required', 'string'],
            'regular_price'     => ['required', 'numeric'],
            'sale_price'        => ['nullable', 'numeric'],
            'stock_status'      => ['required', Rule::in(['instock', 'outofstock'])],
            'featured'          => ['required', 'boolean'],
            'quantity'          => ['required', 'integer'],
            'image'             => ['required', 'image'],
            'active'            => ['required', 'boolean'],
            'category_id'       => ['required', 'integer'],
        ]);
    }

    public function store()
    {
        $this->confirmation();

        $this->validate([
            'name'              => ['required', 'min:3', 'max:30', 'string', 'unique:products'],
            'short_description' => ['required', 'min:5', 'max:150'],
            'description'       => ['required', 'string'],
            'regular_price'     => ['required', 'numeric'],
            'sale_price'        => ['nullable', 'numeric'],
            'stock_status'      => ['required', Rule::in(['instock', 'outofstock'])],
            'featured'          => ['required', 'boolean'],
            'quantity'          => ['required', 'integer'],
            'image'             => ['required', 'image'],
            'active'            => ['required', 'boolean'],
            'category_id'       => ['required', 'integer'],
        ]);

        $product                    = new Product();
        $product->name              = $this->name;
        $product->slug              = Str::slug($this->name);
        $product->short_description = $this->short_description;
        $product->description       = $this->description;
        $product->regular_price     = $this->regular_price;
        $product->sale_price        = $this->sale_price;
        $product->stock_status      = $this->stock_status;
        $product->featured          = $this->featured;
        $product->quantity          = $this->quantity;
        $product->active            = $this->active;
        $product->category_id       = $this->category_id;

        if ($this->image) {
            $imagename = Carbon::now()->timestamp . '.' . $this->image->extension();

            $originalPath   = storage_path() . '/app/public/assets/product/large/';
            $mediumPath     = storage_path() . '/app/public/assets/product/medium/';
            $thumbnailPath  = storage_path() . '/app/public/assets/product/thumbnail/';
            $thumbnailImage = Image::make($this->image);
            $thumbnailImage->fit(800, 800);
            $thumbnailImage->save($originalPath . $imagename);
            $thumbnailImage->fit(400, 400);
            $thumbnailImage->save($mediumPath . $imagename);
            $thumbnailImage->fit(100, 100);
            $thumbnailImage->save($thumbnailPath . $imagename);

            $product->image = $imagename;
        }
        $product->save();

        return redirect()->route('admin.product.index')
            ->with('create-success', 'Product "' . $this->name . '" created successfully.');
    }

    public function confirmation()
    {
        $this->authorize('product-create');
    }

    public function removeImage()
    {
        $this->image = null;
    }

    public function render()
    {
        $this->confirmation();

        $categories = Category::select('id', 'name')->orderBy('name', 'ASC')->get();
        return view('livewire.admin.product.admin-product-add-component', ['categories' => $categories])->layout('layouts.base');
    }
}

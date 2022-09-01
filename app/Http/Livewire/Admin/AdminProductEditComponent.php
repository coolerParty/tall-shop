<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class AdminProductEditComponent extends Component
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

    public $product_id;
    public $new_image;

    public function mount($product_id)
    {
        $product = Product::find($product_id);
        if(empty($product)){
            abort(404);
        }
        $this->product_id        = $product->id;
        $this->name              = $product->name;
        $this->slug              = $product->slug;
        $this->short_description = $product->short_description;
        $this->description       = $product->description;
        $this->regular_price     = $product->regular_price;
        $this->sale_price        = $product->sale_price;
        $this->stock_status      = $product->stock_status;
        $this->featured          = $product->featured;
        $this->quantity          = $product->quantity;
        $this->image             = $product->image;
        $this->active            = $product->active;
        $this->category_id       = $product->category_id;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name'              => ['required', 'min:3', 'max:30', 'string',
                                        Rule::unique('products')->ignore($this->product_id)],
            'slug'              => ['required', 'string'],
            'short_description' => ['required', 'min:5', 'max:150'],
            'description'       => ['required', 'string'],
            'regular_price'     => ['required', 'numeric'],
            'sale_price'        => ['nullable', 'numeric'],
            'stock_status'      => ['required', Rule::in(['instock', 'outofstock'])],
            'featured'          => ['required', 'boolean'],
            'quantity'          => ['required', 'integer'],
            'active'            => ['required', 'boolean'],
            'category_id'       => ['required', 'integer'],
        ]);

        if($this->new_image){
            $this->validateOnly($fields, [
                'new_image' => ['required', 'image', 'max:2048'],
            ]);
        }
    }

    public function update()
    {
        $this->confirmation();

        $this->validate([
            'name'              => ['required', 'min:3', 'max:30', 'string',
                                        Rule::unique('products')->ignore($this->product_id)],
            'short_description' => ['required', 'min:5', 'max:150'],
            'description'       => ['required', 'string'],
            'regular_price'     => ['required', 'numeric'],
            'sale_price'        => ['nullable', 'numeric'],
            'stock_status'      => ['required', Rule::in(['instock', 'outofstock'])],
            'featured'          => ['required', 'boolean'],
            'quantity'          => ['required', 'integer'],
            'active'            => ['required', 'boolean'],
            'category_id'       => ['required', 'integer'],
        ]);

        if($this->new_image){
            $this->validate([
                'new_image' => ['required', 'image', 'max:2048'],
            ]);
        }

        $product                    = Product::find($this->product_id);
        if(empty($product)){
            abort(404);
        }
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

        if ($this->new_image) {

            if (!empty($product->image) && file_exists('storage/assets/product/thumbnail' . '/' . $product->image))
            {
                unlink('storage/assets/product/thumbnail' . '/' . $product->image); // Deleting Image
            }

            if (!empty($product->image) && file_exists('storage/assets/product/medium' . '/' . $product->image)) 
            {
                unlink('storage/assets/product/medium' . '/' . $product->image); // Deleting Image
            }

            if ( !empty($product->image) && file_exists('storage/assets/product/large' . '/' . $product->image)) 
            {
                unlink('storage/assets/product/large' . '/' . $product->image); // Deleting Image
            }

            $imagename = Carbon::now()->timestamp . '.' . $this->new_image->extension();

            $originalPath   = storage_path() . '/app/public/assets/product/large/';
            $mediumPath     = storage_path() . '/app/public/assets/product/medium/';
            $thumbnailPath  = storage_path() . '/app/public/assets/product/thumbnail/';
            $thumbnailImage = Image::make($this->new_image);
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
            ->with('create-success', 'Product "' . $this->name . '" updated successfully.');
    }

    public function confirmation()
    {

        $this->authorize('product-edit');
    }

    public function removeImage()
    {
        $this->image = null;
    }

    public function render()
    {
        $this->confirmation();

        $categories = Category::select('id', 'name')->orderBy('name', 'ASC')->get();
        return view('livewire.admin.admin-product-edit-component', ['categories' => $categories])->layout('layouts.base');
    }
}

<?php

namespace App\Http\Livewire\Admin\Product;

use App\Http\Requests\Product\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class AdminProductComponent extends Component
{
    use WithFileUploads;
    use AuthorizesRequests;
    use WithPagination;

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
    public $new_image;

    public $product_id;
    public $prod; // short for product
    public $showModal = false;
    public $modalType = 1; // 1 for store, 2 for edit

    public function rules(): array
    {
        return (new ProductRequest())->rules($this->product_id, $this->modalType, $this->new_image);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function showAddModal()
    {
        $this->authorize('product-create');
        $this->resetProduct();
        $this->resetValidation();
        $this->showModal = true;
        $this->modalType = 1;
    }

    public function showEditModal($product_id)
    {
        $this->authorize('product-edit');
        $this->resetProduct();
        $this->resetValidation();
        $this->modalType = 2;
        $this->product_id = $product_id;
        $this->loadProduct();
        $this->showModal = true;
    }

    public function loadProduct()
    {
        $this->prod              = Product::findOrFail($this->product_id);
        $this->name              = $this->prod->name;
        $this->slug              = $this->prod->slug;
        $this->short_description = $this->prod->short_description;
        $this->description       = $this->prod->description;
        $this->regular_price     = $this->prod->regular_price;
        $this->sale_price        = $this->prod->sale_price;
        $this->stock_status      = $this->prod->stock_status;
        $this->featured          = $this->prod->featured;
        $this->quantity          = $this->prod->quantity;
        $this->image             = $this->prod->image;
        $this->active            = $this->prod->active;
        $this->category_id       = $this->prod->category_id;
    }

    public function store()
    {
        $this->authorize('product-create');
        $this->validate();

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
            $product->image = $this->saveImage($this->image);
        }
        $product->save();

        $this->resetProduct();
        return session()->flash('success', 'Product created successfully.');
    }

    public function update()
    {
        $this->authorize('product-create');
        $this->validate();

        $product                    = Product::find($this->product_id);
        if (empty($product)) {
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

            if (!empty($product->image) && file_exists('storage/assets/product/thumbnail' . '/' . $product->image)) {
                unlink('storage/assets/product/thumbnail' . '/' . $product->image); // Deleting Image
            }

            if (!empty($product->image) && file_exists('storage/assets/product/medium' . '/' . $product->image)) {
                unlink('storage/assets/product/medium' . '/' . $product->image); // Deleting Image
            }

            if (!empty($product->image) && file_exists('storage/assets/product/large' . '/' . $product->image)) {
                unlink('storage/assets/product/large' . '/' . $product->image); // Deleting Image
            }

            $product->image = $this->saveImage($this->new_image);
        }
        $product->save();

        $this->resetProduct();
        return session()->flash('success', 'Product updated successfully.');
    }

    public function saveImage($img)
    {
        $imagename = Carbon::now()->timestamp . '.' . $img->extension();

        $originalPath   = storage_path() . '/app/public/assets/product/large/';
        $mediumPath     = storage_path() . '/app/public/assets/product/medium/';
        $thumbnailPath  = storage_path() . '/app/public/assets/product/thumbnail/';
        $thumbnailImage = Image::make($img);
        $thumbnailImage->fit(800, 800);
        $thumbnailImage->save($originalPath . $imagename);
        $thumbnailImage->fit(400, 400);
        $thumbnailImage->save($mediumPath . $imagename);
        $thumbnailImage->fit(100, 100);
        $thumbnailImage->save($thumbnailPath . $imagename);

        return $imagename;
    }

    public function closeModal()
    {
        $this->resetProduct();
    }

    public function resetProduct()
    {
        $this->product_id = '';
        $this->cat = []; // short for product
        $this->showModal = false;
        $this->modalType = 1;

        $this->name = '';
        $this->slug = '';
        $this->short_description = '';
        $this->description = '';
        $this->regular_price = 0.00;
        $this->sale_price = '';
        $this->stock_status = 'instock';
        $this->featured = false;
        $this->quantity = 0;
        $this->image = null;
        $this->active = false;
        $this->category_id = '';
        $this->new_image = null;
    }

    public function removeImage()
    {
        if ($this->modalType == 1) {
            $this->image = null;
        } elseif ($this->modalType == 2) {
            $this->new_image = null;
        }
    }

    public function destroy($product_id)
    {

        $this->authorize('product-delete');

        $product = Product::find($product_id);
        if (empty($product)) {
            abort(404);
        }
        if ($product->image) {
            unlink('storage/assets/product/large' . '/' . $product->image); // Deleting Image
            unlink('storage/assets/product/medium' . '/' . $product->image); // Deleting Image
            unlink('storage/assets/product/thumbnail' . '/' . $product->image); // Deleting Image
        }
        $product->delete();

        return session()->flash('success', 'Product deleted successfully.');
    }

    public function updateActive($product_id, $status)
    {
        $this->authorize('product-edit');

        $product = Product::find($product_id);
        if (empty($product)) {
            abort(404);
        }
        $product->active = ($status == 1) ? 0 : 1;
        $product->save();
    }

    public function updateFeatured($product_id, $status)
    {
        $this->authorize('product-edit');

        $product = Product::find($product_id);
        if (empty($product)) {
            abort(404);
        }
        $product->featured = ($status == 1) ? 0 : 1;
        $product->save();
    }

    public function updateStocked($product_id, $status)
    {

        $this->authorize('product-edit');

        $product = Product::find($product_id);
        if (empty($product)) {
            abort(404);
        }

        $product->stock_status = ($status == 'instock') ? 'outofstock' : 'instock';
        $product->save();
    }

    public function render()
    {
        $this->authorize('product-show');
        $products = Product::with('category')
            ->select('id', 'name', 'image', 'regular_price', 'featured', 'stock_status', 'quantity', 'active', 'category_id')
            ->orderBy('created_at', 'DESC')->paginate(10);
        $categories = Category::select('id', 'name')->orderBy('name', 'ASC')->get();
        return view('livewire.admin.product.admin-product-component', ['products' => $products, 'categories' => $categories])->layout('layouts.base');
    }
}

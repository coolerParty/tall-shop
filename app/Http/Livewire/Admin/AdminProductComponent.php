<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{
    use AuthorizesRequests;
    use WithPagination;

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

        return redirect()->route('admin.product.index')
            ->with('delete-success', 'Product has been deleted successfully.');
    }

    public function updateActive($product_id, $status)
    {
        $this->authorize('product-edit');

        $product = Product::find($product_id);
        if (empty($product)) {
            abort(404);
        }
        $product->active = ($status == 1 ) ? 0 : 1;
        $product->save();
    }

    public function updateFeatured($product_id, $status)
    {
        $this->authorize('product-edit');

        $product = Product::find($product_id);
        if (empty($product)) {
            abort(404);
        }
        $product->featured = ($status == 1 ) ? 0 : 1;
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
        return view('livewire.admin.admin-product-component', ['products' => $products])->layout('layouts.base');
    }
}

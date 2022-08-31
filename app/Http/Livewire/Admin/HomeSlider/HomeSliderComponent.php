<?php

namespace App\Http\Livewire\Admin\HomeSlider;

use App\Models\HomeSlider;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithPagination;

class HomeSliderComponent extends Component
{
    use AuthorizesRequests;
    
    public function destroy($homeslider_id)
    {

        $this->authorize('slider-delete');

        $slider = HomeSlider::find($homeslider_id);
        if($slider->image)
            {
                unlink('storage/assets/homeslider/large'.'/'.$slider->image); // Deleting Image
                unlink('storage/assets/homeslider/thumbnail'.'/'.$slider->image); // Deleting Image
            }
        $slider->delete();

        return redirect()->route('admin.homeslider.index')
            ->with('delete-success', 'Slide has been deleted successfully.');
    }

    public function render()
    {
        $sliders = HomeSlider::select('id', 'title', 'sub_title', 'link', 'image', 'active', 'created_at')->orderBy('created_at', 'DESC')->paginate(10);
        
        return view('livewire.admin.home-slider.home-slider-component', ['sliders' => $sliders])->layout('layouts.base');
    }
}

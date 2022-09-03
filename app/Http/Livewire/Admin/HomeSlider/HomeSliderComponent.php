<?php

namespace App\Http\Livewire\Admin\HomeSlider;

use App\Models\HomeSlider;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithPagination;

class HomeSliderComponent extends Component
{
    use AuthorizesRequests;
    use WithPagination;

    public function destroy($homeslider_id)
    {

        $this->authorize('slider-delete');

        $slider = HomeSlider::find($homeslider_id);

        if(empty($slider))
        {
            return session()->flash('error', 'No item was found!');
        }

        if ($slider->image) {
            unlink('storage/assets/homeslider/large' . '/' . $slider->image); // Deleting Image
            unlink('storage/assets/homeslider/thumbnail' . '/' . $slider->image); // Deleting Image
        }
        $slider->delete();

        return session()->flash('success', 'Slide has been deleted successfully.');
    }

    public function updateActive($homeslider_id,$status)
    {
        $this->authorize('slider-edit');

        $slider = HomeSlider::where('id',$homeslider_id)->first();
        if(empty($slider))
        {
            return redirect()->route('admin.homeslider.index')
            ->with('error', 'Slide has been deleted successfully.');
        }
        $slider->active = ($status == 1 ) ? 0 : 1;
        $slider->save();
    }

    public function render()
    {
        $this->authorize('slider-show');

        $sliders = HomeSlider::select('id', 'title', 'sub_title', 'link', 'image', 'active', 'created_at')->orderBy('created_at', 'DESC')->paginate(10);

        return view('livewire.admin.home-slider.home-slider-component', ['sliders' => $sliders])->layout('layouts.base');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     *  listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::latest()->paginate(10);
        return view('admin.sliders.index', compact('sliders'));
    }
    //create
    public function create()
    {
        return view('admin.sliders.create');
    }
    //storing
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $imagePath = $request->file('image')->store('image', 'public');

        Slider::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'image' => $imagePath,
            'status' => $request->status ? 1 : 0,
        ]);

        return redirect()->route('admin.sliders.index')->with('success', 'اسلایدر با موفقیت ثبت شد.');
    }
    // Edit
    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('image', 'public');
            // optionally delete old image
            $slider->image = $imagePath;
        }

        $slider->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'status' => $request->status ? 1 : 0,
        ]);

        return redirect()->route('admin.sliders.index')->with('success', 'اسلایدر با موفقیت بهروز رسانی شد.');
    }
    // Delete
    public function destroy(Slider $slider)
    {
        // optionally delete image file
        $slider->delete();
        return redirect()->route('admin.sliders.index')->with('success', 'اسلایدر حذف شد');
    }
    public function show(Slider $slider)
    {
        return view('admin.sliders.show', compact('slider'));
    }
}

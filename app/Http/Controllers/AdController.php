<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Exception;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Botble\Base\Supports\Breadcrumb;
use Botble\Base\Http\Controllers\BaseController;
use App\Http\Forms\AdForms;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManager;


class AdController extends BaseController
{

    protected function breadcrumb(): Breadcrumb
    {
        return parent::breadcrumb()
            ->add("Advertisements");
    }

    public function index()
    {
        $this->pageTitle("Ads List");
        $ads = Ad::All();
        return view('ads.view', compact('ads'));
    }


    public function create()
    {
//            $ads=Ad::All();
        return view('ads.create');

//            $this->pageTitle(trans('Create new Ad'));

//            return AdForms::create()->renderForm();
    }


    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'post_title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'width' => 'nullable|numeric|min:0',
            'height' => 'nullable|numeric|min:0',
            'type' => ['required',Rule::in(array_keys(Ad::TYPES))],
            'group' => ['required',Rule::in(array_keys(Ad::GROUPS))],
        ]);

        // Create a new Ad instance
        $advertisement = new Ad();
        $advertisement->title = $validated['post_title'];
        $advertisement->group = $request->group;
        $advertisement->type = $request->type;
        $advertisement->width = $request->width;
        $advertisement->height = $request->height;

        // Handle file upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $filename = Str::random(32) . time() . "." . $request->file('image')->getClientOriginalExtension();
            $imageResized = ImageManager::gd()->read($request->image)->resize($request->width, $request->height)->encode();
            $path = "ads-images/" . $filename;
            Storage::disk('public')->put($path, $imageResized);
            $advertisement->image = $path;
//            $advertisement->image = $request->image->store('', 'public');
        }

        try {
            // Save the advertisement to the database
            $advertisement->save();
            return redirect()->back()->with('success', 'Advertisement created successfully!');
        } catch (\Exception $e) {
            Log::error('Failed to save advertisement: ' . $e->getMessage());
            return redirect()->back()->withErrors('Failed to save advertisement. Please try again.');
        }
    }


    public function edit(Ad $ad)
    {
        return view('admin.ads.edit', compact('ad'));
    }

    public function update(Request $request, Ad $ad)
    {
        $request->validate([
            'ad_name' => 'required|string|max:255',
            'ad_type' => 'required|string',
            'ad_image' => 'nullable|image',
            'ad_tag' => 'nullable|string',
            'ad_link' => 'nullable|url',
            'ad_group' => 'required|string',
            'position' => 'required|string',
        ]);

        $ad->ad_name = $request->ad_name;
        $ad->ad_type = $request->ad_type;

        if ($request->hasFile('ad_image')) {
            $ad->ad_image = $request->file('ad_image')->store('ads', 'public');
        }

        if ($request->ad_type == 'google') {
            $ad->ad_tag = $request->ad_tag;
        } else {
            $ad->ad_link = $request->ad_link;
        }

        $ad->ad_group = $request->ad_group;
        $ad->position = $request->position;
        $ad->save();

        return redirect()->route('ads.index')->with('success', 'Ad updated successfully.');
    }

    public function destroy(Ad $ad)
    {
        $ad->delete();
        return redirect()->route('ads.index')->with('success', 'Ad deleted successfully.');
    }
}

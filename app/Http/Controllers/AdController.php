<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Botble\Base\Supports\Breadcrumb;
use Botble\Base\Http\Controllers\BaseController;
use App\Http\Forms\AdForms;


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
        $ads=Ad::All();
        return view('ads.view',compact('ads'));
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
        // Validate the incoming data
        $data = $request->validate([
            'post_title' => 'required|max:255',
            'advanced_ad[type]' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'advanced_ad[width]' => 'nullable|integer',
            'advanced_ad[height]' => 'nullable|integer',
            'advanced_ad_id' => 'required|integer',
            'advanced_ad[cache-busting][possible]' => 'sometimes|boolean'
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        // Create a new advertisement instance
        $advertisement = new Advertisement();
        $advertisement->title = $data['post_title'];
        $advertisement->type = $data['advanced_ad[type]'];
        $advertisement->image = $data['image'] ?? null;
        $advertisement->width = $data['advanced_ad[width]'] ?? null;
        $advertisement->height = $data['advanced_ad[height]'] ?? null;
        $advertisement->group_id = $data['advanced_ad[output][group_id]'];
        $advertisement->cache_busting_enabled = $data['advanced_ad[cache-busting][possible]'] ?? false;

        // Save the advertisement
        $advertisement->save();

        // Redirect with success message
        return redirect()->back()->with('success', 'Advertisement created successfully!');
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

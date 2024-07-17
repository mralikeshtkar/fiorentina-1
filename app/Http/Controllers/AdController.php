<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Exception;
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
            'advanced_ad' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'advanced_ad[width]' => 'nullable|integer',
            'advanced_ad[height]' => 'nullable|integer',
//            'advanced_ad_id' => 'required|integer',
//            'advanced_ad[cache-busting][possible]' => 'sometimes|boolean'
        ]);

        // Handle file upload

        try {
            $advertisement = new Ad();

            // Validate required fields
            if (empty($data['post_title']) || empty($data['advanced_ad'])) {
                throw new Exception('Required fields are missing.');
            }

            // Assigning data with basic validation and sanitization
            $advertisement->title = htmlspecialchars($data['post_title']);
            $advertisement->type = htmlspecialchars($data['advanced_ad']);

            // Handling optional fields with checks for existence and null coalescence
            $advertisement->image = $data['image'] ?? null;

            // Extracting nested data for 'width' and 'height'
            $advertisement->width = isset($data['advanced_ad']['width']) ? intval($data['advanced_ad']['width']) : null;
            $advertisement->height = isset($data['advanced_ad']['height']) ? intval($data['advanced_ad']['height']) : null;

            // Additional properties if needed
            // Uncomment and handle if these fields are expected to be used
            // $advertisement->group_id = $data['advanced_ad']['output']['group_id'] ?? null;
            // $advertisement->cache_busting_enabled = $data['advanced_ad']['cache-busting']['possible'] ?? false;

            // Save the advertisement
            $advertisement->save();

        } catch (Exception $e) {
            // Error handling, e.g., log the error and send a user-friendly message
            error_log($e->getMessage());
            echo "Failed to save advertisement: " . $e->getMessage();
        }


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

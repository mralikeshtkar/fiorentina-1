<?php

namespace App\Http\Controllers;

use App\Models\Video;
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


class VideoController extends BaseController
{

    protected function breadcrumb(): Breadcrumb
    {
        return parent::breadcrumb()
            ->add("Videos");
    }

    public function index()
    {
        $this->pageTitle("Videos List");
        $videos = Video::query()->latest()->paginate(20);
        return view('videos.view', compact('videos'));
    }


    public function create()
    {
        $this->pageTitle("Crea Video");

        return view('videos.create');
    }

    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'title' => 'required|string|max:255',
            'videos.*' => 'required|mimes:mp4,mov,ogg,qt|max:20000', // Validate each video file
            'status' => 'sometimes|required|string|in:published,draft,pending', // Default to 'published' if not provided
        ]);

        // Set the default status to 'published' if not provided
        $status = $request->input('status', 'published');

        // Handle each video file
        if ($request->hasFile('videos')) {
            foreach ($request->file('videos') as $videoFile) {
                // Store the video file in the 'videos' directory under the 'public' disk
                $path = $videoFile->store('videos', 'public');

                // Save video information to the database
                Video::create([
                    'title' => $request->title,
                    'video_path' => $path,
                    'status' => $status, // Store the status, default to 'published'
                ]);
            }
        }

        return redirect()->back()->with('success', 'Videos uploaded successfully.');
    }


    public function edit(Ad $ad)
    {
        return view('ads.edit', compact('ad'));
    }

    public function update(Request $request, Ad $ad)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'post_title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'width' => 'nullable|numeric|min:0',
            'height' => 'nullable|numeric|min:0',
            'type' => ['required', Rule::in(array_keys(Ad::TYPES))],
            'group' => ['required', Rule::in(array_keys(Ad::GROUPS))],
        ]);
        $data = [
            'title' => $request->post_title,
            'group' => $request->group,
            'type' => $request->type,
            'width' => $request->width,
            'height' => $request->height,
        ];
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $filename = Str::random(32) . time() . "." . $request->file('image')->getClientOriginalExtension();
            $imageResized = ImageManager::gd()->read($request->image);
            if($request->width && $request->height){
                $imageResized=$imageResized->resize($request->width, $request->height);
            }
            $imageResized=$imageResized->encode();
            $path = "ads-images/" . $filename;
            Storage::disk('public')->put($path, $imageResized);
            $data['image'] = $path;
        }
        try {
            // Update the advertisement
            $ad->update($data);
            return redirect()->route('ads.index')->with('success', 'Advertisement updated successfully!');
        } catch (\Exception $e) {
            Log::error('Failed to save advertisement: ' . $e->getMessage());
            return redirect()->back()->withErrors('Failed to save advertisement. Please try again.');
        }
    }

    public function destroy(Ad $ad)
    {
        $ad->delete();
        return redirect()->route('ads.index')->with('success', 'Ad deleted successfully.');
    }
}

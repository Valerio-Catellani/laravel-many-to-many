<?php

namespace App\Http\Controllers\Admin;

use App\Models\Technology;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();
        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.technologies.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|min:3',
            'color' => 'nullable|min:7|max:7',
            'icon' => 'nullable|min:3|max:255'
        ], [
            'name.required' => 'The field :attribute is required.',
            'name.min' => 'The field :attribute must be at least 3 characters.',
            'name.max' => 'The field :attribute must be at most 255 characters.',
            'color.min' => 'The field :attribute must be at least 7 characters.',
            'color.max' => 'The field :attribute must be at most 7 characters.',
            'icon.min' => 'The field :attribute must be at least 3 characters.',
            'icon.max' => 'The field :attribute must be at most 255 characters.',
        ]);
        $validated["slug"] =  Technology::generateSlug($validated["name"]);

        if (!$validated['color']) {
            $validated['color'] = "#FFFFFF";
        }
        if (!$validated['icon']) {
            $validated['icon'] = "fa-solid fa-laptop-code";
        }
        $new_technology = new Technology();
        $new_technology->fill($validated);
        $new_technology->save();
        return redirect()->route("admin.technologies.index");
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $technology = Technology::where('slug', $slug)->firstOrFail();
        return view("admin.technologies.show", compact("technology"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $technology = Technology::where('slug', $slug)->firstOrFail();
        return view("admin.technologies.edit", compact("technology"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $technology = Technology::where('slug', $slug)->first();
        $validated = $request->validate([
            'name' => 'required|max:255|min:3',
            'color' => 'nullable|min:7|max:7',
            'icon' => 'nullable|min:3|max:255'
        ], [
            'name.required' => 'The field :attribute is required.',
            'name.min' => 'The field :attribute must be at least 3 characters.',
            'name.max' => 'The field :attribute must be at most 255 characters.',
            'color.min' => 'The field :attribute must be at least 7 characters.',
            'color.max' => 'The field :attribute must be at most 7 characters.',
            'icon.min' => 'The field :attribute must be at least 3 characters.',
            'icon.max' => 'The field :attribute must be at most 255 characters.',
        ]);
        if (!$validated['color']) {
            $validated['color'] = "#FFFFFF";
        }
        if (!$validated['icon']) {
            $validated['icon'] = "fa-solid fa-laptop-code";
        }
        if ($technology->name != $validated["name"]) {
            $validated["slug"] =  Technology::generateSlug($validated["name"]);
        }
        $technology->fill($validated);
        $technology->update();
        return redirect()->route("admin.technologies.index")->with('message', "Technology (id:{$technology->id}): {$technology->name} edit with success");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $technology = Technology::where('slug', $slug)->first();
        //$project->technologies()->detach();
        $technology->delete();
        return redirect()->route('admin.technologies.index')->with('message', "Technology (id:{$technology->id}): {$technology->name} deleted with success");
    }
}

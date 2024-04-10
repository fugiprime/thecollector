<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContentStar;

class ContentStarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

        {
            $contentStars = ContentStar::all();
            return view('content-stars.index', compact('contentStars'));
        }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content-stars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:content_stars|max:255',
            'gender' => 'required',
            'description' => 'required',
            'date_of_birth' => 'required|date',
            'poster_url' => 'required|url',
        ]);

        $contentStar = ContentStar::create($validatedData);

        return redirect()->route('content-stars.index')
            ->with('success', 'Content star created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contentStar = ContentStar::findOrFail($id);
        return view('content-stars.show', compact('contentStar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('content-stars.edit', compact('contentStar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:content_stars,name,' . $contentStar->id,
            'gender' => 'required',
            'description' => 'required',
            'date_of_birth' => 'required|date',
            'poster_url' => 'required|url',
        ]);

        $contentStar->update($validatedData);

        return redirect()->route('content-stars.index')
            ->with('success', 'Content star updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contentStar->delete();

        return redirect()->route('content-stars.index')
            ->with('success', 'Content star deleted successfully.');
    }

    public function allStars()
    {
        $contentStars = ContentStar::paginate(32);
        return view('content-stars.all', compact('contentStars'));
    }

}

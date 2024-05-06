<?php

namespace App\Http\Controllers;

use App\Models\feluxvideo;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;

class FeluxvideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): view
    {
        return view('feluxvideos.index', [
            'feluxvideos' => feluxvideo::with('user')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $request->user()->feluxvideos()->create($validated);

        return redirect(route('feluxvideos.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(feluxvideo $feluxvideo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(feluxvideo $feluxvideo): View
    {
        Gate::authorize('update', $feluxvideo);

        return view('feluxvideos.edit', [
            'feluxvideo' => $feluxvideo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, feluxvideo $feluxvideo): RedirectResponse
    {
        Gate::authorize('update', $feluxvideo);

        $validated = $request->validate([
            'message' => 'required|string|max:255'
        ]);

        $feluxvideo->update($validated);

        return redirect(route('feluxvideos.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(feluxvideo $feluxvideo): RedirectResponse
    {
        Gate::authorize('delete', $feluxvideo);

        $feluxvideo->delete();

        return redirect(route('feluxvideos.index'));
    }
}

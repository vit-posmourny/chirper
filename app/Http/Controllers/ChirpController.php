<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ChirpPosted;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('chirps.index', [
            'chirps' => Chirp::with('user')->latest()->get(),
        ]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $request->user()->chirps()->create($validated);


        Mail::to($request->user())->send(
            new ChirpPosted()
        );

        return redirect(route('chirps.index'));
    }


    public function show(Chirp $chirp)
    {
        //
    }


    public function edit(Chirp $chirp)
    {
        Gate::authorize('update-chirp', $chirp);

        return view('chirps.edit', [
            'chirp' => $chirp
        ]);
    }


    public function update(Request $request, Chirp $chirp)
    {
        
        Gate::authorize('update-chirp', $chirp);

        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);


        $chirp->update($validated);


        return redirect(route('chirps.index'));
    }


    public function destroy(Chirp $chirp)
    {
        Gate::authorize('update-chirp', $chirp);

        $chirp->delete();

        return redirect(route('chirps.index'));
    }
}

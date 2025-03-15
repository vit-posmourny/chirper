<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

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

         return redirect(route('chirps.index'));
    }


    public function show(Chirp $chirp)
    {
        //
    }


    public function edit(Chirp $chirp)
    {

        if (! Gate::allows('update-chirp', $chirp)) {
            abort(403);
        }

        return view('chirps.edit', [
            'chirp' => $chirp
        ]);
    }


    public function update(Request $request, Chirp $chirp)
    {

        if (! Gate::allows('update-chirp', $chirp)) {
            abort(403);
        }


        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);


        $chirp->update($validated);


        return redirect(route('chirps.index'));
    }


    public function destroy(Chirp $chirp)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index()
    {
        return view('artist.index', [
            'artist' => Artist::all()
        ]);
    }

    public function show(Artist $artist)
    {
        return view('artist.show', [
            'artist' => $artist
        ]);
    }

    public function edit(Artist $artist)
    {
        return view('artist.edit', [
            'artist' => $artist
        ]);
    }

    public function update(Request $request, Artist $artist)
    {
      
        $formFields = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);

        $artist->update($formFields);
        return redirect('/artist')->with('message', 'Updated successfully.');
    }

    public function destroy(Artist $artist)
    {
        $artist->delete();
        return redirect('/artist')->with('message', 'Deleted successfully.');
    }

    
}

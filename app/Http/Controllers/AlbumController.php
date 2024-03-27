<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        return view('album.index', [
            'album' => Album::all()
        ]);
    }

    public function show(Album $album)
    {
        return view('album.show', [
            'album' => $album
        ]);
    }

    public function edit(Album $album)
    {
        return view('album.edit', [
            'album' => $album
        ]);
    }

    public function update(Request $request, Album $album)
    {
      
        $formFields = $request->validate([
            'name' => 'required',
            'year' => 'required',
            'sales' => 'required',
        ]);

        $album->update($formFields);
        return redirect('/album')->with('message', 'Updated successfully.');
    }

    public function destroy(Album $album)
    {
        $album->delete();
        return redirect('/album')->with('message', 'Deleted successfully.');
    }

    
}

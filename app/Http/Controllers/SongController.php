<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Playlist;

class SongController extends Controller {


    public function create($playlistId)
    {
        $playlist = Playlist::findOrFail($playlistId);
        return view('song.create', compact('playlist'));
    }

    public function store(Request $request, $playlistId)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
        ]);

        $playlist = Playlist::findOrFail($playlistId);
        $playlist->songs()->create([
            'title' => $request->input('title'),
            'artist' => $request->input('artist'),
            'genre' => $request->input('genre'),
        ]);

        return redirect()->route('playlist.show', $playlistId)->with('success', 'Song added successfully!');
    }
}

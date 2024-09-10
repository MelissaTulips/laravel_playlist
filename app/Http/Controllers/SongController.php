<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Playlist;

class SongController extends Controller {


    public function index()
    {
        $songs = Song::all();
        return view('songs.index', compact('songs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'genre' => 'required',
            'playlist_id' => 'required|exists:playlists,id'
        ]);

        Song::create([
            'title' => $request->input('title'),
            'artist' => $request->input('artist'),
            'genre' => $request->input('genre'),
            'playlist_id' => $request->input('playlist_id')
        ]);

        return redirect()->route('playlist.show', $request->input('playlist_id'))
                         ->with('success', 'Song added successfully!');
    }

    /**
     * Show the form for editing a song.
     */
    public function edit(Song $song)
    {
        return view('songs.edit', compact('song'));
    }

    /**
     * Update the specified song.
     */
    public function update(Request $request, Song $song)
    {
        $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'genre' => 'required'
        ]);

        $song->update([
            'title' => $request->input('title'),
            'artist' => $request->input('artist'),
            'genre' => $request->input('genre'),
        ]);

        return redirect()->route('playlist.show', $song->playlist_id)
                         ->with('success', 'Song updated successfully!');
    }

    /**
     * Remove the specified song.
     */
    public function destroy(Song $song)
    {
        $playlist_id = $song->playlist_id;
        $song->delete();

        return redirect()->route('playlist.show', $playlist_id)
                         ->with('success', 'Song deleted successfully!');
    }
}


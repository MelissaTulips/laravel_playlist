<x-app-layout>
    <div class="container mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-bold mb-6 text-center">{{ $playlist->name }} ({{ $playlist->tag }})</h1>

        {{-- Display songs in the playlist --}}
        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-4">Songs</h2>
            
            @if($playlist->songs->count() > 0)
                <!-- Make the table container scrollable to avoid clipping -->
                <div class="overflow-x-auto">
                    <table class="w-full table-auto mb-4">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">Title</th>
                                <th class="border px-4 py-2">Artist</th>
                                <th class="border px-4 py-2">Genre</th>
                                <th class="border px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($playlist->songs as $song)
                                <tr>
                                    <td class="border px-4 py-2">{{ $song->title }}</td>
                                    <td class="border px-4 py-2">{{ $song->artist }}</td>
                                    <td class="border px-4 py-2">{{ $song->genre }}</td>
                                    <td class="border px-4 py-2">
                                        {{-- Edit Song --}}
                                        <a href="{{ route('songs.edit', $song->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded">Edit</a>
                                        
                                        {{-- Delete Song --}}
                                        <form action="{{ route('songs.destroy', $song->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p>No songs in this playlist yet.</p>
            @endif
        </div>

        {{-- Form to add new songs --}}
        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-4">Add a New Song</h2>
            <form action="{{ route('songs.store') }}" method="POST">
                @csrf
                <input type="hidden" name="playlist_id" value="{{ $playlist->id }}">

                <div class="form-group mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Song Title</label>
                    <input type="text" id="title" name="title" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div class="form-group mb-4">
                    <label for="artist" class="block text-sm font-medium text-gray-700">Artist</label>
                    <input type="text" id="artist" name="artist" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div class="form-group mb-4">
                    <label for="genre" class="block text-sm font-medium text-gray-700">Genre</label>
                    <input type="text" id="genre" name="genre" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Add Song
                </button>
            </form>
        </div>
    </div>
</x-app-layout>

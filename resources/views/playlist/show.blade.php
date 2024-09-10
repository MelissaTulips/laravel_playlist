<x-app-layout>
    <div class="container mx-auto max-w-lg mt-10 p-6 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-bold mb-6 text-center">{{ $playlist->name }}</h1>
        <div class="flex justify-end mb-4">
            <a href="{{ route('song.create', $playlist->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Add Song
            </a>
        </div>
        <div class="px-6 pt-4 pb-2">
            @if($playlist->songs->count() > 0)
                <table class="w-full table-auto">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2">Title</th>
                            <th class="border px-4 py-2">Artist</th>
                            <th class="border px-4 py-2">Genre</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($playlist->songs as $song)
                            <tr>
                                <td class="border px-4 py-2">{{ $song->title }}</td>
                                <td class="border px-4 py-2">{{ $song->artist }}</td>
                                <td class="border px-4 py-2">{{ $song->genre }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-center">No songs in this playlist yet.</p>
            @endif
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <div class="container mx-auto max-w-lg mt-10 p-6 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-bold mb-6 text-center">Edit Song</h1>

        <form action="{{ route('songs.update', $song->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title" class="block text-sm font-medium text-gray-700">Song Title</label>
                <input type="text" id="title" name="title" value="{{ $song->title }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div class="form-group">
                <label for="artist" class="block text-sm font-medium text-gray-700">Artist</label>
                <input type="text" id="artist" name="artist" value="{{ $song->artist }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div class="form-group">
                <label for="genre" class="block text-sm font-medium text-gray-700">Genre</label>
                <input type="text" id="genre" name="genre" value="{{ $song->genre }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Update Song
            </button>
        </form>
    </div>
</x-app-layout>

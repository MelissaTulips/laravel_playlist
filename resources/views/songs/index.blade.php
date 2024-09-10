<x-app-layout>
    <div class="container mx-auto max-w-4xl mt-10 p-6 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-bold mb-6 text-center">Songs List</h1>
        
        <table class="min-w-full border-collapse block md:table">
            <thead class="block md:table-header-group">
                <tr class="border border-gray-300 md:border-none block md:table-row">
                    <th class="bg-gray-200 p-2 text-gray-700 font-bold block md:table-cell">ID</th>
                    <th class="bg-gray-200 p-2 text-gray-700 font-bold block md:table-cell">Title</th>
                    <th class="bg-gray-200 p-2 text-gray-700 font-bold block md:table-cell">Artist</th>
                    <th class="bg-gray-200 p-2 text-gray-700 font-bold block md:table-cell">Genre</th>
                </tr>
            </thead>
            <tbody class="block md:table-row-group">
                @foreach ($songs as $song)
                    <tr class="border border-gray-300 md:border-none block md:table-row">
                        <td class="p-2 text-gray-700 block md:table-cell">{{ $song->id }}</td>
                        <td class="p-2 text-gray-700 block md:table-cell">{{ $song->title }}</td>
                        <td class="p-2 text-gray-700 block md:table-cell">{{ $song->artist }}</td>
                        <td class="p-2 text-gray-700 block md:table-cell">{{ $song->genre }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>


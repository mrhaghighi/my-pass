<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <!-- Title -->
                <h1 class="text-lg">Credentials ({{ $credentials->count() }})</h1>

                <table class="table-auto min-w-full mt-8">
                    <thead>
                        <tr class="text-left">
                            <th class="w-5/12">Name</th>
                            <th class="w-2/12">Type</th>
                            <th class="w-5/12">Settings</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($credentials as $credential)
                            <tr class="border-b-2 p-3 w-full">
                                <td class="py-3">{{ $credential->name ?? 'No Name' }}</td>
                                <td class="py-3">
                                    <div class="flex flex-row justify-start items-center">
                                        <img src="{{ $credential->type->avatar ?? '-' }}" alt="Credential Password" width="25px" height="25px">
                                        <div>{{ $credential->type->name }}</div>
                                    </div>
                                </td>
                                <td class="py-3">
                                    <button class="bg-blue-400 text-white px-4 py-1 m-1 rounded text-sm">Details</button>
                                    <button class="bg-yellow-400 text-white px-4 py-1 m-1 rounded text-sm">Update</button>
                                    <button class="bg-red-400 text-white px-4 py-1 m-1 rounded text-sm">Remove</button>
                                </td>
                            </tr>
                        @endforeach

                        {{ $credentials->links() }}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

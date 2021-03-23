<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <!-- Title -->
                <div class="flex flex-row justify-start items-center">
                    <h1 class="text-lg">Credential Types</h1>
                </div>

                <!-- Details -->
                <table class="table-auto min-w-full my-8">
                    <thead>
                        <tr class="text-left border-b-2 border-gray-400">
                            <th class="w-4/12 pb-2">Name</th>
                            <th class="w-4/12 pb-2">Website</th>
                            <th class="w-4/12 pb-2">Avatar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($credentialTypes as $type)
                            <tr class="border-b-2 p-3 w-full">
                                <td class="py-3">{{ $type->name ?? 'No Name' }}</td>
                                <td class="py-3">
                                    <a href="{{ $type->website }}" class="text-blue-400 underline" target="_blank">{{ $type->website }}</a>
                                </td>
                                <td class="py-3">
                                    <img src="{{ $type->avatar ?? '-' }}" alt="Credential Password" width="25px" height="25px">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination -->
                {{ $credentialTypes->links() }}
            </div>
        </div>
    </div>
</div>

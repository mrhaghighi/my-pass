<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <!-- Title -->
                <div class="flex flex-row justify-start items-center">
                    <h1 class="text-lg">Credentials</h1>
                    <a href="{{ route('credentials.create') }}" class="bg-blue-400 text-white px-4 py-1 ml-4 rounded text-sm">Create new credential</a>
                </div>

                <!-- Details -->
                <table id="credentials__table" class="table-auto min-w-full my-8">
                    <thead>
                        <tr class="text-left border-b-2 border-gray-400 th--header">
                            <th class="w-3/12 pb-2">Name</th>
                            <th class="w-3/12 pb-2">Type</th>
                            <th class="w-3/12 pb-2">Last Update</th>
                            <th class="w-3/12 pb-2">Settings</th>
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
                                <td class="py-3">{{ $credential->updated_at }}</td>
                                <td class="py-3 flex flex-row justify-start items-center">
                                    <a href="{{ route('credentials.show', ['credential' => $credential]) }}" class="bg-blue-400 text-white px-4 py-1 m-1 rounded text-sm">Details</a>
                                    <a href="{{ route('credentials.edit', ['credential' => $credential]) }}" class="bg-yellow-400 text-white px-4 py-1 m-1 rounded text-sm">Update</a>
                                    <form action="{{ route('credentials.remove', ['credential' => $credential]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-400 text-white px-4 py-1 m-1 rounded text-sm">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination -->
                {{ $credentials->links() }}
            </div>
        </div>
    </div>
</div>

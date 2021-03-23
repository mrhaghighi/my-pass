<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <!-- Title -->
                <div class="flex flex-row justify-start items-center">
                    <h1 class="text-lg">Credential "{{ $credential->name ?? 'No Name' }}"</h1>
                    <a href="{{ route('credentials.edit', ['credential' => $credential]) }}" class="bg-yellow-400 text-white px-4 py-1 ml-4 rounded text-sm">Update</a>
                </div>

                <!-- Details -->
                <div class="mt-8">
                    <div class="flex flex-row my-3">
                        <div class="font-bold w-1/12">Name: </div> 
                        <div class="w-11/12">{{ $credential->name ?? 'No Name' }}</div>
                    </div>
                    <div class="flex flex-row my-3">
                        <div class="font-bold w-1/12">Type: </div> 
                        <div class="w-11/12">{{ $credential->type->name ?? 'No Name' }}</div>
                    </div>
                    <div class="flex flex-row my-3">
                        <div class="font-bold w-1/12">URL: </div> 
                        <div class="w-11/12">
                            {!! '<a href="$credential->url" class="text-blue-400 underline">Go to website</a>' ?? 'No URL' !!}
                        </div>
                    </div>
                    <div class="flex flex-row my-3">
                        <div class="font-bold w-1/12">Username: </div>
                        <div class="w-11/12">{{ $credential->username }}</div>
                    </div>
                    <div class="flex flex-row my-3">
                        <div class="font-bold w-1/12">Password: </div>
                        <div class="w-11/12">{{ $credential->decrypted_password }}</div>
                    </div>
                    <div class="flex flex-row my-3">
                        <div class="font-bold w-1/12">Email: </div>
                        <div class="w-11/12">{{ $credential->email ?? 'No Email' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

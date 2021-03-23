<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <!-- Title -->
                <div class="flex flex-row justify-start items-center">
                    <h1 class="text-lg">Credential "{{ $credential->name ?? 'No Name' }}"</h1>
                </div>

                <!-- Error messages -->
                @include('layouts.error-alerts')

                <!-- Details -->
                <div class="mt-8">
                    <input type="hidden" name="user_id" value="{{ $credential->user_id }}">
                    <div class="flex flex-row my-3">
                        <div class="font-bold w-max mr-2">Name: </div> 
                        <div>
                            <input wire:model.defer="name" class="border rounded border-gray-300 p-1" value="{{ $credential->name }}">
                        </div>
                    </div>
                    <div class="flex flex-row my-3">
                        <div class="font-bold w-max mr-2 flex justify-center items-center">Type: </div> 
                        <div>
                            <select wire:model.defer="typeId" class="border rounded border-gray-300">
                                @foreach ($credentialTypes as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="flex flex-row my-3">
                        <div class="font-bold w-max mr-2">URL: </div> 
                        <div>
                            <input wire:model.defer="url" class="border rounded border-gray-300 p-1" value="{{ $credential->url }}">
                        </div>
                    </div>
                    <div class="flex flex-row my-3">
                        <div class="font-bold w-max mr-2">Username: </div>
                        <div>
                            <input wire:model.defer="username" class="border rounded border-gray-300 p-1" value="{{ $credential->username }}">
                        </div>
                    </div>
                    <div class="flex flex-row my-3">
                        <div class="font-bold w-max mr-2">Password: </div>
                        <div>
                            <input wire:model.defer="password" class="border rounded border-gray-300 p-1" value="{{ $credential->decrypted_password }}">
                        </div>
                    </div>
                    <div class="flex flex-row my-3">
                        <div class="font-bold w-max mr-2">Email: </div>
                        <div>
                            <input wire:model.defer="email" type="email" class="border rounded border-gray-300 p-1" value="{{ $credential->email }}">
                        </div>
                    </div>
                    <div class="flex flex-row my-3">
                        <button class="bg-blue-400 text-white px-4 py-1 rounded text-sm" wire:click="update()">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

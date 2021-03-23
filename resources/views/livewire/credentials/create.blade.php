<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <!-- Title -->
                <div class="flex flex-row justify-start items-center">
                    <h1 class="text-lg">Create New Credential</h1>
                </div>

                <!-- Error messages -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Details -->
                <div class="mt-8">
                    <div class="flex flex-row my-3">
                        <div class="font-bold w-1/12">Name: </div> 
                        <div class="w-11/12">
                            <input wire:model.defer="name" class="border rounded border-gray-300 p-1" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="flex flex-row my-3">
                        <div class="font-bold w-1/12">Type: </div> 
                        <div class="w-11/12">
                            <select wire:model.defer="typeId" class="border rounded border-gray-300">
                                @foreach ($credentialTypes as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="flex flex-row my-3">
                        <div class="font-bold w-1/12">URL: </div> 
                        <div class="w-11/12">
                            <input wire:model.defer="url" class="border rounded border-gray-300 p-1" value="{{ old('url') }}">
                        </div>
                    </div>
                    <div class="flex flex-row my-3">
                        <div class="font-bold w-1/12">Username: </div>
                        <div class="w-11/12">
                            <input wire:model.defer="username" class="border rounded border-gray-300 p-1" value="{{ old('username') }}">
                        </div>
                    </div>
                    <div class="flex flex-row my-3">
                        <div class="font-bold w-1/12">Password: </div>
                        <div class="w-11/12">
                            <input wire:model.defer="password" class="border rounded border-gray-300 p-1" value="{{ old('password') }}">
                        </div>
                    </div>
                    <div class="flex flex-row my-3">
                        <div class="font-bold w-1/12">Email: </div>
                        <div class="w-11/12">
                            <input wire:model.defer="email" type="email" class="border rounded border-gray-300 p-1" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="flex flex-row my-3">
                        <button class="bg-blue-400 text-white px-4 py-1 rounded text-sm" wire:click="create()">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

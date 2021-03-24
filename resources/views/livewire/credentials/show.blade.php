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
                        <div class="font-bold w-max mr-2">Name: </div> 
                        <div>{{ $credential->name ?? 'No Name' }}</div>
                    </div>
                    <div class="flex flex-row my-3">
                        <div class="font-bold w-max mr-2">Type: </div> 
                        <div>{{ $credential->type->name ?? 'No Name' }}</div>
                    </div>
                    <div class="flex flex-row my-3">
                        <div class="font-bold w-max mr-2">URL: </div> 
                        <div>
                            @if ($credential->url)
                                <a href="{{$credential->url}}" class="text-blue-400 underline" target="_blank">Go to website</a>
                            @else
                                'No URL'
                            @endif
                        </div>
                    </div>
                    <div class="flex flex-row my-3">
                        <div class="font-bold w-max mr-2">Username: </div>
                        <div>{{ $credential->username }}</div>
                    </div>
                    <div class="flex flex-row my-3">
                        <div class="font-bold w-max mr-2 flex flex-jusify-center items-center">Password: </div>
                        @if ($passwordVisibility) 
                            <div id="decrypted_password" class="w-max mr-2 flex flex-row items-center">{{ $credential->decrypted_password }}</div>
                        @else
                            <input id="decrypted_password__input" type="hidden" class="w-max mr-2 flex flex-row items-center" value="{{ $credential->decrypted_password }}" />
                            <div id="masked_password" class="w-max mr-2 flex flex-row items-center">*************</div>
                        @endif
                        <div class="w-10/12">
                            <button class="bg-red-400 text-white px-4 py-1 m-1 ml-4 rounded text-sm" wire:click="passwordVisibilityToggler()">{{ $passwordVisibility ? 'Hidden' : 'Show' }} Password</button>
                            <button class="bg-yellow-400 text-white px-4 py-1 m-1 ml-4 rounded text-sm" onclick="copyPassword()">Copy Password</button>
                        </div>
                    </div>
                    <div class="flex flex-row my-3">
                        <div class="font-bold w-max mr-2">Email: </div>
                        <div>{{ $credential->email ?? 'No Email' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    /**
     * Copy password to clipboard
     *
     * @return void
     */
    function copyPassword() {
        var value = document.getElementById("decrypted_password__input").value
        var tempInput = document.createElement("input");
        tempInput.style = "position: absolute; left: -1000px; top: -1000px";
        tempInput.value = value;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand("copy");
        document.body.removeChild(tempInput);
        
        // TODO: Shold be changed with better alert
        alert("Password coppied!");
    }
</script>

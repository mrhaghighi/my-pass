<?php

namespace App\Http\Livewire\Credentials;

use App\Models\CredentialType;
use App\Repositories\CredentialRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class Create extends Component
{
    use CredentialBodyTrait, AuthorizesRequests;

    /**
     * Render page
     *
     * @return view()
     */
    public function render()
    {
        $credentialTypes = CredentialType::get();

        return view('livewire.credentials.create', compact('credentialTypes'));
    }

    /**
     * Create credential
     *
     * @return redirect()
     */
    public function create()
    {
        // Validate data
        if (!$this->typeId) {
            $this->typeId = CredentialType::first()->id;
        }
        $this->typeId = intval($this->typeId);
        $this->validate();

        // Credential details
        $createdCredential = [
            'name'     => $this->name,
            'type_id'  => intval($this->typeId),
            'url'      => $this->url,
            'username' => $this->username,
            'password' => Crypt::encryptString($this->password),
            'email'    => $this->email,
            'user_id'  => auth()->id()
        ];

        // Create credential
        (new CredentialRepository())->create($createdCredential);

        return redirect()->route('credentials.index');
    }
}

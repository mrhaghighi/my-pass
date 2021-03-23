<?php

namespace App\Http\Livewire\Credentials;

use App\Models\Credential;
use App\Models\CredentialType;
use App\Repositories\CredentialRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class Edit extends Component
{
    use CredentialBodyTrait, AuthorizesRequests;

    /**
     * Credential
     *
     * @var Credential
     */
    public $credential;

    /**
     * Mount data
     *
     * @param Credential $credential
     * @return void
     */
    public function mount(Credential $credential)
    {
        $this->credential = $credential;
    }

    /**
     * Render page
     *
     * @return view()
     */
    public function render()
    {
        // Authorize request
        $this->authorize('update', $this->credential);

        // Init form data
        $this->initData($this->credential);

        // Credential types
        $credentialTypes = CredentialType::get();

        return view('livewire.credentials.edit', compact('credentialTypes'));
    }

    /**
     * Initialize form data
     *
     * @param Credential $credential
     * @return void
     */
    protected function initData(Credential $credential): void
    {
        $this->credentialId = $credential->id;
        $this->userId = $credential->user_id;
        $this->name = $credential->name;
        $this->typeId = $credential->type->id;
        $this->url = $credential->url;
        $this->username = $credential->username;
        $this->password = $credential->decrypted_password;
        $this->email = $credential->email;

        $this->dataInited = true;
    }

    /**
     * Update credential
     *
     * @return redirect()
     */
    public function update()
    {
        // Validate data
        $this->validate();

        // Update credential
        $updatedCredential = [
            'name'     => $this->name,
            'type_id'  => $this->typeId,
            'url'      => $this->url,
            'username' => $this->username,
            'password' => Crypt::encryptString($this->password),
            'email'    => $this->email,
        ];

        // Update credential
        (new CredentialRepository())->update($this->credential->id, $updatedCredential);

        return redirect()->route('credentials.show', ['credential' => $this->credential]);
    }
}

<?php

namespace App\Http\Livewire\Credentials;

use App\Models\Credential;
use App\Models\CredentialType;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class Edit extends Component
{
    use AuthorizesRequests;

    /**
     * Credential
     *
     * @var Credential
     */
    public $credential;

    /**
     * Credential ID
     *
     * @var int
     */
    public $credentialId;

    /**
     * Credential user ID
     *
     * @var int
     */
    public $userId;

    /**
     * Credential name
     *
     * @var string
     */
    public $name;

    /**
     * Credential type ID
     *
     * @var int
     */
    public $typeId;

    /**
     * Credential URL
     *
     * @var string
     */
    public $url;

    /**
     * Credential username
     *
     * @var string
     */
    public $username;

    /**
     * Credential password
     *
     * @var string
     */
    public $password;

    /**
     * Credential email
     *
     * @var string
     */
    public $email;

    /**
     * Validation rules
     *
     * @var array
     */
    protected $rules = [
        'name'     => 'required',
        'typeId'   => 'required|exists:credential_types,id',
        'url'      => '',
        'username' => 'required',
        'password' => 'required',
        'email'    => '',
    ];

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
        // Authorize request
        $this->authorize('update', $this->credential);

        // Validate data
        $this->validate();

        // Update credential
        Credential::where('id', $this->credentialId)->update([
            'name'     => $this->name,
            'type_id'  => $this->typeId,
            'url'      => $this->url,
            'username' => $this->username,
            'password' => Crypt::encryptString($this->password),
            'email'    => $this->email,
        ]);

        return redirect()->route('credentials.show', ['credential' => $this->credential]);
    }
}

<?php

namespace App\Http\Livewire\Credentials;

use App\Models\Credential;
use App\Models\CredentialType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Edit extends Component
{
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
     * Render page
     *
     * @return view()
     */
    public function render(Request $request)
    {
        // Fetch credential
        $credentialId = $request->route('id');
        $credential = Credential::find($credentialId);

        // Init form data
        $this->initData($credential);

        // Credential types
        $credentialTypes = CredentialType::get();

        // User not allowed for seen credential
        if (auth()->id() != $credential->user_id) {
            Log::critical('[Unauthorized] - Some one wants access to a forbidden credential. User ID: ' . auth()->id());
            abort(403);
        }

        return view('livewire.credentials.edit', compact('credential', 'credentialTypes'));
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

        // User not allowed for seen credential
        if (auth()->id() != $this->userId) {
            Log::critical('[Unauthorized] - Some one wants access to a forbidden credential. User ID: ' . auth()->id());
            abort(403);
        }

        // Update credential
        Credential::where('id', $this->credentialId)->update([
            'name'     => $this->name,
            'type_id'  => $this->typeId,
            'url'      => $this->url,
            'username' => $this->username,
            'password' => Crypt::encryptString($this->password),
            'email'    => $this->email,
        ]);

        return redirect()->route('credentials.show', ['id' => $this->credentialId]);
    }
}

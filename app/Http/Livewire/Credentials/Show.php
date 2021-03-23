<?php

namespace App\Http\Livewire\Credentials;

use App\Models\Credential;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Livewire\Component;

class Show extends Component
{
    use AuthorizesRequests;

    /**
     * Credential
     *
     * @var Credential
     */
    public $credential;

    /**
     * Password visibility
     *
     * @var boolean
     */
    public $passwordVisibility = false;

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
        $this->authorize('view', $this->credential);

        return view('livewire.credentials.show');
    }

    /**
     * Password visibility toggler
     *
     * @return void
     */
    public function passwordVisibilityToggler()
    {
        $this->passwordVisibility = !$this->passwordVisibility;
    }
}

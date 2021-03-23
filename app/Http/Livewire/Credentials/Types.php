<?php

namespace App\Http\Livewire\Credentials;

use App\Models\CredentialType;
use Livewire\Component;

class Types extends Component
{
    /**
     * Render page
     *
     * @return view()
     */
    public function render()
    {
        $credentialTypes = CredentialType::latest()
            ->paginate(20);

        return view('livewire.credentials.types', compact('credentialTypes'));
    }
}

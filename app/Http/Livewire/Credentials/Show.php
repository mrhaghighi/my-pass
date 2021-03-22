<?php

namespace App\Http\Livewire\Credentials;

use App\Models\Credential;
use Illuminate\Http\Request;
use Livewire\Component;

class Show extends Component
{
    /**
     * Render page
     *
     * @param Request $request
     * @return view()
     */
    public function render(Request $request)
    {
        // Fetch credential
        $credentialId = $request->route('id');
        $credential = Credential::find($credentialId);

        // User not allowed for seen credential
        if (auth()->id() != $credential->user_id) {
            abort(403);
        }

        return view('livewire.credentials.show', compact('credential'));
    }
}

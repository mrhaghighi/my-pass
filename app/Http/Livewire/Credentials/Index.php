<?php

namespace App\Http\Livewire\Credentials;

use App\Models\Credential;
use Livewire\Component;

class Index extends Component
{
    /**
     * Render page
     *
     * @return view()
     */
    public function render()
    {
        $credentials = Credential::where('user_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('livewire.credentials.index', compact('credentials'));
    }
}

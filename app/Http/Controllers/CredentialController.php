<?php

namespace App\Http\Controllers;

use App\Models\Credential;
use App\Repositories\CredentialRepository;

class CredentialController extends Controller
{
    /**
     * Remove credential
     *
     * @param Credential $credential
     * @return redirect()
     */
    public function remove(Credential $credential)
    {
        // Remove credential
        (new CredentialRepository())->remove($credential->id);

        return redirect()->route('credentials.index');
    }
}

<?php

namespace App\Repositories;

use App\Models\Credential;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\UnauthorizedException;

class CredentialRepository
{
    /**
     * Update credential
     *
     * @param integer $id
     * @param array $data
     * @throws UnauthorizedException
     * @return boolean
     */
    public function update(int $id, array $data): bool
    {
        // Authorize request
        $credential = Credential::find($id);

        if (!Gate::allows('update', $credential)) {
            $userId = auth()->id();
            Log::alert("[Credential][Unauthorized] - User with {$userId} wants update an unauthorized credential");
            abort(403, 'This action is unauthorized.');
        }

        // Update credential
        $credential->update($data);

        // Log activity
        Log::info("[Credential][Update] - Credential with {$id} updated succesfully");

        return true;
    }
}

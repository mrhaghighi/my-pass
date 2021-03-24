<?php

namespace Tests\Feature;

use App\Models\CredentialType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CredentialTypeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Create credential type
     *
     * @return void
     */
    public function testCreateCredentialType()
    {
        // Create credential type
        $gmailTypeData = [
            'name'    => 'Google',
            'website' => 'https://accounts.google.com',
            'avatar'  => 'https://w7.pngwing.com/pngs/249/19/png-transparent-google-logo-g-suite-google-guava-google-plus-company-text-logo.png',
        ];
        CredentialType::create($gmailTypeData);

        // Assert
        $this->assertDatabaseHas('credential_types', $gmailTypeData);
    }

    /**
     * Update credential type
     *
     * @return void
     */
    public function testUpdateCredentialType()
    {
        $gmailTypeData = [
            'name'    => 'Google',
            'website' => 'https://accounts.google.com',
            'avatar'  => 'https://w7.pngwing.com/pngs/249/19/png-transparent-google-logo-g-suite-google-guava-google-plus-company-text-logo.png',
        ];
        $credentialType = CredentialType::create($gmailTypeData);

        // Check existence
        $this->assertDatabaseHas('credential_types', $gmailTypeData);

        // Update record
        $newName = 'Google Test';
        $credentialType->update([
            'name' => $newName
        ]);

        // Fetch updated record
        $fetchedCredentialType = CredentialType::find($credentialType->id);

        // Assert
        $this->assertTrue($fetchedCredentialType->name === $newName);
    }
}

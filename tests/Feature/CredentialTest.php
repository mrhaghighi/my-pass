<?php

namespace Tests\Feature;

use App\Models\Credential;
use App\Models\CredentialType;
use App\Models\User;
use App\Repositories\CredentialRepository;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Crypt;
use Tests\TestCase;

class CredentialTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Credential data
     *
     * @var array
     */
    protected $credentialData;

    /**
     * Credential
     *
     * @var Credential
     */
    protected $credential;

    /**
     * Set up test
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->createCredential();
    }

    /**
     * Create credential
     *
     * @return void
     */
    protected function createCredential(): void
    {
        // Create credential type
        $gmailTypeData = [
            'name'    => 'Google',
            'website' => 'https://accounts.google.com',
            'avatar'  => 'https://w7.pngwing.com/pngs/249/19/png-transparent-google-logo-g-suite-google-guava-google-plus-company-text-logo.png',
        ];
        $createCredentialType = CredentialType::create($gmailTypeData);

        // Create user
        $user = User::factory()->create();

        // Mark up data for creating credential
        $this->credentialData = [
            'name'     => 'Test Credential',
            'type_id'  => $createCredentialType->id,
            'url'      => 'https://example.com',
            'username' => 'test_username',
            'password' => Crypt::encryptString('asdg2190acs@3'),
            'email'    => 'example@gmail.com',
            'user_id'  => intval($user->id)
        ];

        // Create credential
        (new CredentialRepository())->create($this->credentialData);

        // Fetch credential
        $this->credential = Credential::latest()->first();
    }

    /**
     * Create a credential
     *
     * @return void
     */
    public function testCreateNewCredential()
    {
        $this->assertDatabaseHas('credentials', $this->credentialData);
    }

    /**
     * Update a credential
     *
     * @return void
     */
    public function testUpdateCredential()
    {
        $updatedCredentialData = $this->credentialData;
        auth()->loginUsingId($updatedCredentialData['user_id']);
        $updatedCredentialData['name'] = 'Update credential name';
        $updatedCredentialData['user_id'] = auth()->id();

        // Update credential
        (new CredentialRepository())->update($this->credential->id, $updatedCredentialData);

        // Assert
        $this->assertDatabaseHas('credentials', $updatedCredentialData);
    }

    /**
     * A forbidden user can't update a credential
     *
     * @return void
     */
    public function testForbiddenUpdateCredential()
    {
        $updatedCredentialData = $this->credentialData;
        do {
            $userId = rand(10, 20);
        } while ($userId == $updatedCredentialData['user_id']);
        auth()->loginUsingId($userId);
        $updatedCredentialData['name'] = 'Update credential name';
        $updatedCredentialData['user_id'] = auth()->id();

        // Update credential
        try {
            (new CredentialRepository())->update($this->credential->id, $updatedCredentialData);
            $this->expectExceptionCode(403);
        } catch (Exception $exception) {
            $this->assertTrue($exception->getMessage() === 'This action is unauthorized.');
        }
    }
}

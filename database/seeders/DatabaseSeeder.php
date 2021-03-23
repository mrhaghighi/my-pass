<?php

namespace Database\Seeders;

use App\Models\Credential;
use App\Models\CredentialType;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create user
        $user = User::factory()->create();

        // Create credential types
        $gmailTypeData = [
            'name'    => 'Google',
            'website' => 'https://accounts.google.com',
            'avatar'  => 'https://w7.pngwing.com/pngs/249/19/png-transparent-google-logo-g-suite-google-guava-google-plus-company-text-logo.png',
        ];
        $gmailCredentialType = CredentialType::create($gmailTypeData);

        $yahooTypeData = [
            'name'    => 'Yahoo',
            'website' => 'https://mail.yahoo.com/',
            'avatar'  => 'https://cdn.vox-cdn.com/thumbor/JiRzoaU535Vs9YjU6LcJSvIGFBs=/1400x1400/filters:format(jpeg)/cdn.vox-cdn.com/uploads/chorus_asset/file/19224216/mb_yahoo_02.jpg',
        ];
        $yahooCredentialType = CredentialType::create($yahooTypeData);

        // Create credentials
        Credential::factory()->create([
            'user_id' => $user->id,
            'type_id' => $gmailCredentialType->id,
            'name'    => 'My google account',
            'url'     => $gmailCredentialType->website
        ]);
        Credential::factory()->create([
            'user_id' => $user->id,
            'type_id' => $yahooCredentialType->id,
            'name'    => 'My yahoo account',
            'url'     => $yahooCredentialType->website
        ]);
    }
}

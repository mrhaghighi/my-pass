<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Credential extends Model
{
    use HasFactory;

    /**
     * Guarded fields
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Credential type
     *
     * @return Illuminate\Database\Eloquent\Model\CredentialType
     */
    public function type()
    {
        return $this->belongsTo(CredentialType::class, 'type_id');
    }

    /**
     * Get decrypted password
     *
     * @return sting
     */
    public function getDecryptedPasswordAttribute(): string
    {
        return Crypt::decryptString($this->password);
    }
}

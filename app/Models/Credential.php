<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credential extends Model
{
    use HasFactory;

    /**
     * Guarded fields
     *
     * @var array
     */
    protected $guarded = [];

    public function type()
    {
        return $this->belongsTo(CredentialType::class, 'type_id');
    }
}

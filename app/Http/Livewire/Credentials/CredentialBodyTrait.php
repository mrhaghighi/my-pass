<?php

namespace App\Http\Livewire\Credentials;

trait CredentialBodyTrait
{
    /**
     * Credential ID
     *
     * @var int
     */
    public $credentialId;

    /**
     * Credential user ID
     *
     * @var int
     */
    public $userId;

    /**
     * Credential name
     *
     * @var string
     */
    public $name;

    /**
     * Credential type ID
     *
     * @var int
     */
    public $typeId;

    /**
     * Credential URL
     *
     * @var string
     */
    public $url;

    /**
     * Credential username
     *
     * @var string
     */
    public $username;

    /**
     * Credential password
     *
     * @var string
     */
    public $password;

    /**
     * Credential email
     *
     * @var string
     */
    public $email;

    /**
     * Validation rules
     *
     * @var array
     */
    protected $rules = [
        'name'     => 'required',
        'typeId'   => 'required|exists:credential_types,id',
        'url'      => '',
        'username' => 'required',
        'password' => 'required',
        'email'    => '',
    ];
}

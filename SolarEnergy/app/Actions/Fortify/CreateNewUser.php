<?php

namespace App\Actions\Fortify;

use App\Models\Utilizador;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\Utilizador
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:utilizador'],
            'password' => $this->passwordRules(),
            'tipoUtilizador_id' => ['required', 'integer', 'max:3'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return Utilizador::create([
            'nome' => $input['nome'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'tipoUtilizador_id' => '3'
        ]);

    }
}

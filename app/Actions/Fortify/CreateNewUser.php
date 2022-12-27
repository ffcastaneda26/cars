<?php

namespace App\Actions\Fortify;


use App\Models\User;
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
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'first_name'    => ['required', 'string', 'max:60'],
            'last_name'     => ['required', 'string', 'max:60'],
            'email'         => ['nullable', 'string', 'email', 'max:255', 'unique:users'],
            'phone'         => ['required', 'digits:10','unique:users'],
            'password'      => $this->passwordRules(),
            'terms'         => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

       return User::create([
            'first_name'    => $input['first_name'],
            'last_name'     => $input['last_name'],
            'email'         => $input['email'],
            'phone'         => $input['phone'],
            'password'      => Hash::make($input['password'])
        ]);


    }
}

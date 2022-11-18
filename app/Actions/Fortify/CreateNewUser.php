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
            'name'      => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone'     => ['required', 'digits:10', 'regex:/^[1-9](?!.*000)\d{9}$/','unique:users'],
            'email'     => ['nullable', 'string', 'email', 'max:255', 'unique:users'],
            'is_company'=> ['required'],
            'password'  => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();



        if(!$input['email']){
            $input['email'] = $input['phone'];
        }

        return User::create([
            'name'      => $input['name'],
            'last_name' => $input['last_name'],
            'phone'      => $input['phone'],
            'email'     => $input['email'],
            'is_company'=> $input['is_company'] ? 1 : 0,
            'password'  => Hash::make($input['password'])
        ]);
    }
}

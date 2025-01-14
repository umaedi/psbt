<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Validation\Rules\Password;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'nama'      => ['required', 'string', 'max:255'],
            'nip'       => ['required', 'string', 'unique:users', 'max:255'],
            'pangkat'   => ['required', 'string', 'max:255'],
            'jabatan'   => ['required', 'string', 'max:255'],
            'instansi'  => ['required', 'string', 'max:255'],
            'no_tlp'    => ['required', 'string', 'max:255'],
            'domisili'  => ['required', 'string', 'max:255'],
            'photo'     => ['required', 'image', 'max:2048', 'mimes:jpg,jpeg,png'],
            'email'     => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => ['required', 'string', Password::min(6), 'confirmed'],
        ])->validate();

        //save imgae
        $fileName = time() . '_' . str_replace(' ', '_', $input['photo']->getClientOriginalName());
        
        // Simpan file ke S3
        $input['photo']->storeAs('profile/photo', $fileName, 's3');

        return User::create([
            'nama'      => $input['nama'],
            'email'     => $input['email'],
            'nip'       => $input['nip'],
            'pangkat'   => $input['pangkat'],
            'jabatan'   => $input['jabatan'],
            'instansi'  => $input['instansi'],
            'no_tlp'    => $input['no_tlp'],
            'domisili'  => $input['domisili'],
            'password'  => Hash::make($input['password']),
            'photo'     => $fileName,
        ]);
    }
}

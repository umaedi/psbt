<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Response as Controller;
use App\Jobs\SendmailRegistrasiJob;
use App\Mail\SendmailRegistrasi;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        if (\request()->ajax()) {

            $validator = Validator::make($request->all(), [
                'nama'  => 'required',
                'nik'   => 'required|unique:users',
                'email' => 'required|unique:users',
                'no_tlp'    => 'required',
                'password'  => 'required|confirmed|min:6'
            ]);

            if ($validator->fails()) {
                return  $this->sendResponseError(json_encode($validator->errors()));
            }

            $data = $request->except('_token');

            //hash password
            $data['password'] = Hash::make($data['password']);

            //save image
            if (isset($data['img'])) {
                $data['img'] = Storage::putFile('public/img', $data['img']);
            }
            $generateToken = strtolower(Str::random(32));
            $data['remember_token'] = $generateToken;

            DB::beginTransaction();
            try {
                User::create($data);
            } catch (\Throwable $th) {
                dd($th);
                DB::rollBack();
                return response()->json([
                    'success'   => false,
                    'message'   => $th,
                ]);
            }

            $data = [
                'nama'  => $request->nama,
                'email' => $request->email,
                'token' => env('APP_URL') . '?token=' . $generateToken,
            ];

            dispatch(new SendmailRegistrasiJob($data));
            DB::commit();
            return response()->json([
                // 'data' => $token,
                'message'   => "Akun berhasil dibuat. Silakan cek email untuk aktivasi akun Anda"
            ], 201);
        }
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\Admin;

class AuthenticationController extends Controller
{
    // Login
    public function login(Request $request)
    {
        // Validator
        $validator = Validator::make(
            $request->all(),
            [
                "email_admin" => "required|email|max:255",
                "password_admin" => "required|min:8|max:12",
            ],
            [
                "email_admin.required" => "Email harus diisi!",
                "password_admin.required" => "Password harus diisi!",
                "password_admin.min" => "Password minimal 8 karakter!",
            ],
        );
        if ($validator->fails()) {
            return response()->json(
                [
                    "message" => "Login gagal!",
                    "error" => $validator->errors()->first(),
                ],
                422,
            );
        }
        $validated = $validator->validated();

        $admin = Admin::where(
            "email_admin",
            $validated["email_admin"],
        )->first();
        if (!$admin) {
            return response()->json(["error" => "Email tidak ditemukan!"], 404);
        }

        if ($admin->status_admin === "Blokir") {
            return response()->json(
                [
                    "error" => "Akun sudah diblokir!",
                ],
                403,
            );
        }

        $valid = false;
        try {
            $valid =
                decrypt($admin->password_admin) ===
                $validated["password_admin"];
        } catch (\Exception $e) {
            $valid = false;
        }

        if (!$valid) {
            $blockResult = $this->block($validated["email_admin"]);
            if ($blockResult) {
                return response()->json(
                    [
                        "message" => "Login gagal!",
                        "error" => $blockResult["error"],
                    ],
                    401,
                );
            }

            return response()->json(
                [
                    "message" => "Login gagal!",
                ],
                401,
            );
        }

        $this->block($validated["email_admin"], true);

        $token = $admin->createToken("token_admin")->plainTextToken;

        return response()->json([
            "message" => "Login berhasil!",
            "token" => $token,
            "admin" => $admin->only([
                "id_admin",
                "email_admin",
                "level_admin",
                "status_admin",
            ]),
        ]);
    }

    // Logout
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
    }

    // Verify Email
    public function verifyEmail(Request $request)
    {
        // Validation
        $validator = Validator::make(
            $request->all(),
            [
                "email_admin" => "required|email|max:255",
            ],
            [
                "email_admin.required" => "Email harus diisi!",
            ],
        );
        if ($validator->fails()) {
            return response()->json(
                [
                    "message" => "Verifikasi email gagal!",
                    "error" => $validator->errors()->first(),
                ],
                422,
            );
        }
        $validated = $validator->validated();

        $admin = Admin::where(
            "email_admin",
            $validated["email_admin"],
        )->first();
        if (!$admin) {
            return response()->json(
                [
                    "message" => "Email tidak terdaftar!",
                    "error" => "Email tidak ditemukan!",
                ],
                404,
            );
        }

        session(["verified_email" => $validated["email_admin"]]);
        return response()->json(
            [
                "message" => "Email berhasil diverifikasi!",
                "data" => [
                    "email" => $admin->email_admin,
                ],
            ],
            200,
        );
    }

    // Change Password
    public function changePassword(Request $request)
    {
        // Validation
        $validator = Validator::make(
            $request->all(),
            [
                "email_admin" => "required|email|max:255",
                "password_baru" => "required|min:8|max:12",
                "konfirmasi_password" => "required|min:8|max:12|same:password_baru",
            ],
            [
                "password_baru.required" => "Kolom password baru harus diisi!",
                "password_baru.min" => "Password minimal 8 karakter!",
                "password_baru.max" => "Password melebihi 12 karakter!",
                "konfirmasi_password.required" => "Konfirmasi password harus diisi!",
                "konfirmasi_password.same" => "Konfirmasi password tidak cocok dengan password baru!",
            ],
        );
        if ($validator->fails()) {
            return response()->json(
                [
                    "message" => "Ubah password gagal!",
                    "error" => $validator->errors()->first(),
                ],
                422,
            );
        }
        $validated = $validator->validated();

        $admin = Admin::where(
            "email_admin",
            $validated["email_admin"],
        )->first();

        $admin->password_admin = encrypt($validated["password_baru"]);
        $admin->save();
        session()->forget("verified_email");
        return response()->json(
            [
                "message" => "Password berhasil diubah!",
                "data" => [
                    "email" => $admin->email_admin,
                ],
            ],
            200,
        );
    }

    // Block
    public function block($email_admin, $success = false)
    {
        $admin = Admin::where("email_admin", $email_admin)->first();
        if (!$admin) {
            return null;
        }
        if ($admin->level_admin !== "Kasir") {
            return null;
        }

        if ($success) {
            Cache::forget("attempts_{$email_admin}");
            return null;
        }

        $attempts = Cache::get("attempts_{$email_admin}", 0) + 1;
        $remaining = 3 - $attempts;
        if ($attempts >= 3) {
            $admin->status_admin = "Blokir";
            $admin->save();
            Cache::forget("attempts_{$email_admin}");

            return [
                "error" => "Akun Anda telah diblokir!",
            ];
        }

        Cache::put("attempts_{$email_admin}", $attempts);
        return [
            "error" => "Password salah! Kesempatan tersisa {$remaining}x lagi.",
        ];
    }

    // Unblock
    public function unblock() {}

    // Profile
    public function profile() {}

    // Change Profile
    public function changeProfile() {}
}

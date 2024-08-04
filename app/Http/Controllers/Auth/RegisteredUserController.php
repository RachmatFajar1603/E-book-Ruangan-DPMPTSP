<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Bidang;
use App\Models\Pegawai;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $bidang = Bidang::all();
        return view('auth.register', compact('bidang'));
    }

    public function checkNip($nip)
    {
        $pegawai = Pegawai::where('nip', $nip)->first();
        
        if ($pegawai) {
            return response()->json(['nama' => $pegawai->nama]);
        }
        
        return response()->json(['nama' => null]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'telepon' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'nip_reg' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'bidang_id' => ['required', 'integer'],
            'role' => ['required', 'string'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'nip_reg' => $request->nip_reg,
            'bidang_id' => $request->bidang_id,
            'keterangan' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        // dd($user);

        $user->assignRole('user');
        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('verify-email');
    
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'in:Haru Permadi, S.H., M.H.,Dr. Faizin Sulistio, S.H., LLM.,Susrini, S.E,Nahadi Sujarwo,Suhartini Hediatin, A.Md.,Navisah Aulina Zain, S.H.,Yesilia Dyah Priskawati,Nur Baiti Azizah, S.M.,Ellysabeth Trisnawati,Imam Syafii,Ovi Sofia, S.Pd.,Ignasia Henny Susanti S.H.,Rizka Rahmania,Alfin Yoga Aditama, A.Md.,Ryan Rizki Rahmadhani, S.A.P.,M. A. Bayu Fijar, S.Kel.,Oppy Pramudya W.W., S.H.,Achmad Aldy Hifdillah, S.H.,I Made Kamajaya Ariestuta, A.Md.Kom.,Adinda Yulia Damayanti, S.H., M.Kn.,Shafira Hilda Tyana, S.H.'
            ],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('admin.dashboard', absolute: false));
    }
}

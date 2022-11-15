<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Sign In user in information system
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function signin(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($validated)) {
            return redirect()->route('page.articles');
        }

        return redirect()
            ->back()
            ->withErrors(['email' => 'Incorrect user data'])
            ->withInput(['email' => $request->get('email')]);
    }

    /**
     * Log the user out of the application
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('auth.signin');
    }
}

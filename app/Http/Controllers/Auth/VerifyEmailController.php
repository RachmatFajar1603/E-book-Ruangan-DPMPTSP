<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
        }
    
        if ($request->user()->markEmailAsVerified()) {
            Log::info('Email verified for user: ' . $request->user()->id);
            event(new Verified($request->user()));
        } else {
            Log::warning('Failed to verify email for user: ' . $request->user()->id);
        }
    
        return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
    }
    
}

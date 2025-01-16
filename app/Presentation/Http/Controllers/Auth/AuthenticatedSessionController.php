<?php

namespace Presentation\Http\Controllers\Auth;

use Domain\DTOs\LoginRequestDTO;
use Domain\Services\AuthServiceInterface;
use Presentation\Http\Controllers\Controller;
use Presentation\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;
use Infrastructure\UseCases\LoginUserUseCase;

class AuthenticatedSessionController extends Controller
{
    public function __construct(
        private LoginUserUseCase $loginUseCase,
        private AuthServiceInterface $authService
    ) {}

    /**
     * Display the login view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $loginRequest = new LoginRequestDTO(
            $request->email,
            $request->password
        );

        $response = $this->loginUseCase->execute($loginRequest);
        if (!$response->success)
            return back()->withErrors([
                'email' => $response->error ?? 'The provided credentials are incorrect.',
            ]);

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

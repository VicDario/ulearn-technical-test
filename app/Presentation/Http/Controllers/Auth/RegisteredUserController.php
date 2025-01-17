<?php

namespace Presentation\Http\Controllers\Auth;

use Domain\DTOs\RegisterRequestDTO;
use Presentation\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;
use Infrastructure\UseCases\RegisterUserUseCase;
use Presentation\Http\Requests\Auth\RegisterRequest;

class RegisteredUserController extends Controller
{

    public function __construct(
        private RegisterUserUseCase $registerUserUseCase,
    ) {}
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterRequest $request): string
    {
        $validatedData = $request->validated();

        $registerDto = new RegisterRequestDTO(
            name: $validatedData['name'],
            lastname: $validatedData['lastname'],
            email: $validatedData['email'],
            phone: $validatedData['phone'],
            password: $validatedData['password'],
        );

        $this->registerUserUseCase->execute($registerDto);

        return redirect(route('login', absolute: false));
    }
}

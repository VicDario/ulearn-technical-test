<?php

namespace Presentation\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use Infrastructure\UseCases\GetUserUseCase;

class ProfileController extends Controller
{
    public function __construct(
        private GetUserUseCase $getUserUseCase
    ) {}

    /**
     * Display the user's profile.
     */
    public function show(): Response
    {
        $userDto = $this->getUserUseCase->execute();

        return Inertia::render('Profile', [
            'user' => $userDto
        ]);
    }

}

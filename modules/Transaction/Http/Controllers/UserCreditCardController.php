<?php

namespace Transaction\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreditCardRequest;
use Illuminate\Http\JsonResponse;
use Transaction\Services\UserCreditCardService;

class UserCreditCardController extends Controller
{
    private $userCreditCardService;

    public function __construct(UserCreditCardService $userCreditCardService)
    {
        $this->userCreditCardService = $userCreditCardService;
    }

    public function index(): JsonResponse
    {
        $userCreditCards = $this->userCreditCardService->getAllUserCreditCards();

        return response()->json($userCreditCards);
    }

    public function store(UserCreditCardRequest $request): JsonResponse
    {
        $userCreditCard = $this->userCreditCardService->createUserCreditCard($request->validated());

        return response()->json($userCreditCard, 201);
    }

    public function show(int $id): JsonResponse
    {
        $userCreditCard = $this->userCreditCardService->getUserCreditCard($id);

        return response()->json($userCreditCard);
    }

    public function update(UserCreditCardRequest $request, int $id): JsonResponse
    {
        $userCreditCard = $this->userCreditCardService->updateUserCreditCard($id, $request->validated());

        return response()->json($userCreditCard);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->userCreditCardService->deleteUserCreditCard($id);

        return response()->json(['message' => 'User credit card deleted successfully']);
    }
}

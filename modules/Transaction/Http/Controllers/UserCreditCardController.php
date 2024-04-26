<?php

namespace Transaction\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Transaction\Http\Requests\UserCreditCardRequest;
use Transaction\Http\Resources\UserCreditCardResource;
use Transaction\Services\UserCreditCardService;

class UserCreditCardController extends Controller
{
    private $userCreditCardService;

    public function __construct(UserCreditCardService $userCreditCardService)
    {
        $this->userCreditCardService = $userCreditCardService;
    }

    public function index(Request $request)
    {
        $userCreditCards = $this->userCreditCardService->getAllUserCreditCards();

        return Inertia::render('UserCreditCards/Index', [
            'userCreditCards' => UserCreditCardResource::collection($userCreditCards),
        ]);
    }

    public function create()
    {
        return Inertia::render('UserCreditCards/Create');
    }

    public function store(UserCreditCardRequest $request)
    {
        $userCreditCard = $this->userCreditCardService->createUserCreditCard($request->validated());

        return redirect()->route('user-credit-cards.index');
    }

    public function edit($id)
    {
        $userCreditCard = $this->userCreditCardService->getUserCreditCard($id);

        return Inertia::render('UserCreditCards/Edit', [
            'userCreditCard' => $userCreditCard,
        ]);
    }

    public function update(UserCreditCardRequest $request, $id)
    {
        $userCreditCard = $this->userCreditCardService->updateUserCreditCard($id, $request->validated());

        return redirect()->route('user-credit-cards.index');
    }

    public function destroy($id)
    {
        $this->userCreditCardService->deleteUserCreditCard($id);

        return redirect()->route('user-credit-cards.index');
    }
}

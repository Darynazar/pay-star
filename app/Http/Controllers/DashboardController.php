<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Transaction\Services\UserCreditCardService;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $userCreditCards = new UserCreditCardService;
        $userCreditCards = $userCreditCards->getAllUserCreditCards();

        return inertia('Dashboard', [
            'userCreditCards' => $userCreditCards,
        ]);
    }
}

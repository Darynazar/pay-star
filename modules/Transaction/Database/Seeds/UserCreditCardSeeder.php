<?php

namespace Transaction\Database\Seeds;

use Illuminate\Database\Seeder;
use Transaction\Models\UserCreditCard;

class UserCreditCardSeeder extends Seeder
{
    public function run()
    {
        $userCreditCards = [
            [
                'user_id' => 1,
                'card_number' => '1234567890123456',
                'expiration_date' => '12/26',
                'cvv' => '123',
            ],
            [
                'user_id' => 1,
                'card_number' => '1234567890123457',
                'expiration_date' => '11/26',
                'cvv' => '123',
            ],
        ];

        foreach ($userCreditCards as $userCreditCard) {
            UserCreditCard::create($userCreditCard);
        }
    }
}

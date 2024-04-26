<?php

namespace Transaction\Services;

use Illuminate\Support\Collection;
use Transaction\Models\UserCreditCard;

class UserCreditCardService
{
    public function getAllUserCreditCards(): Collection
    {
        return UserCreditCard::all();
    }

    public function createUserCreditCard(array $data): UserCreditCard
    {
        return UserCreditCard::create($data);
    }

    public function getUserCreditCard(int $id): UserCreditCard
    {
        return UserCreditCard::findOrFail($id);
    }

    public function updateUserCreditCard(int $id, array $data): UserCreditCard
    {
        $userCreditCard = UserCreditCard::findOrFail($id);
        $userCreditCard->update($data);

        return $userCreditCard;
    }

    public function deleteUserCreditCard(int $id): void
    {
        $userCreditCard = UserCreditCard::findOrFail($id);
        $userCreditCard->delete();
    }
}

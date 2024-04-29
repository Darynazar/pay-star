<?php

namespace Transaction\Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Transaction\Models\Transaction;

class TransactionTest extends TestCase
{
    //    use RefreshDatabase;

    public $amount = 6000;

    public $order_id = 15;

    public $card_number = '1234567890123457';

    /**
     * Test hotel creation.
     *
     * @return void
     */
    public function test_transaction_creation()
    {
        $user = User::find(1);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'UnicornsAreSweet',
        ]);

        $data = [
            'amount' => $this->amount,
            'order_id' => $this->order_id,
            'card_number' => $this->card_number,
        ];

        $response = $this->postJson('/transactions', $data);

        // Assert that the request was redirected (status code 302)
        $response->assertStatus(302);

        // Assert that the session contains the success message
        $this->assertTrue(session()->has('success'));

        // Assert that the transaction was stored in the database
        $this->assertDatabaseHas('transactions', $data);
    }

    public function test_transaction_update()
    {
        $user = User::find(1);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'UnicornsAreSweet',
        ]);

        $transaction = Transaction::where('order_id', $this->order_id)->first();
        $this->order_id = 17;

        $data = [
            'amount' => $this->amount,
            'order_id' => $this->order_id,
            'card_number' => $this->card_number,
        ];

        $response = $this->patchJson(route('transactions.update', $transaction->id), $data);

        $response->assertJson([
            'amount' => $this->amount,
            'order_id' => $this->order_id,
            'card_number' => $this->card_number,
        ]);
    }

    /**
     * Test category deletion.
     *
     * @return void
     */
    public function test_transaction_deletion()
    {
        $user = User::find(1);

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'UnicornsAreSweet',
        ]);

        $transaction = Transaction::where('order_id', '17')->first();

        $response = $this->deleteJson(route('transactions.destroy', $transaction->id));

        $response->assertStatus(204);

        $this->assertNotNull($transaction);
        //        $this->assertDatabaseMissing('transactions', ['id' => $transaction->id]);
    }
}

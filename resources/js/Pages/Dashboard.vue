<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link, useForm, usePage } from '@inertiajs/vue3';
import {ref} from "vue";

const successMessage = ref('');
const dismissSuccessMessage = () => {
    successMessage.value = '';
};
const props = defineProps({
    userCreditCards: {
        type: Array,
        required: true
    },
});

const passwordInput = ref(null);
const currentPasswordInput = ref(null);

const form = useForm({
    amount: '',
    order_id: '',
    card_number: '',
});

const updatePassword = () => {
    form.post(route('transactions.store'), {
        preserveScroll: true,
        // onSuccess: () => form.reset(),
        onSuccess: () => {
            console.log('ok?')
            form.reset()
            Swal.fire({
                icon: 'success',
                title: 'پرداخت با موفقیت انجام شد',
                showConfirmButton: false,
                timer: 2000
            });
        },
        onError: () => {
            if (form.errors.order_id) {
                form.reset('order_id', 'order_id');
                successMessage.value = response.success;
                order_id.value.focus();
            }
            if (form.errors.amount) {
                form.reset('amount');
                amount.value.focus();
            }
        },
    });
};
const user = usePage().props.auth.user;
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">Your Credit card</div>
                    <div v-if="successMessage" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ successMessage }}</span>
                        <button @click="dismissSuccessMessage" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <title>Close</title>
                                <path d="M14.348 14.849a1 1 0 01-1.414 0L10 11.414l-2.93 2.93a1 1 0 01-1.415-1.415l2.93-2.93-2.93-2.93a1 1 0 011.415-1.415l2.93 2.93 2.93-2.93a1 1 0 011.415 1.415l-2.93 2.93 2.93 2.93a1 1 0 010 1.415z" />
                            </svg>
                        </button>
                    </div>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Card Number</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Expiration Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">CVV</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        <tr v-for="creditCard in userCreditCards" :key="creditCard.id">
                            <td class="px-6 py-4 whitespace-nowrap">{{ creditCard.card_number }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ creditCard.expiration_date }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ creditCard.cvv }}</td>
                        </tr>
                        </tbody>
                    </table>
                    <form @submit.prevent="updatePassword" class="mt-6 space-y-6">
                        <div>
                            <InputLabel for="card_number" value="Card Number" />

                            <TextInput
                                id="card_number"
                                ref="card_number"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.card_number"
                                required
                                autofocus
                                autocomplete="card_number"
                            />

                            <InputError class="mt-2" :message="form.errors.card_number" />
                        </div>

                        <div>
                            <InputLabel for="amount" value="Amount" />

                            <TextInput
                                id="amount"
                                type="text"
                                ref="amount"
                                class="mt-1 block w-full"
                                v-model="form.amount"
                                required
                                autofocus
                                autocomplete="amount"
                            />

                            <InputError class="mt-2" :message="form.errors.amount" />
                        </div>

                        <div>
                            <InputLabel for="order_id" value="Order Id" />

                            <TextInput
                                id="order_id"
                                type="text"
                                ref="order_id"
                                class="mt-1 block w-full"
                                v-model="form.order_id"
                                required
                                autofocus
                                autocomplete="order_id"
                            />

                            <InputError class="mt-2" :message="form.errors.order_id" />
                        </div>

                        <div class="flex items-center gap-4">
                            <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                            <Transition
                                enter-active-class="transition ease-in-out"
                                enter-from-class="opacity-0"
                                leave-active-class="transition ease-in-out"
                                leave-to-class="opacity-0"
                            >
                                <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                            </Transition>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>

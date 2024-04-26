<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link, useForm, usePage } from '@inertiajs/vue3';

const props = defineProps({
    userCreditCards: {
        type: Array,
        required: true
    },
});

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


                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>

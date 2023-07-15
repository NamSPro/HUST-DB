<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Book from '@/Components/Book.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Link, Head } from '@inertiajs/vue3';

defineProps(['books']);

const form = useForm({
    message: '',
});
</script>

<template>
    <Head title="Books" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Book Listing</h2>
            <div v-if="$page.props.auth.user.is_admin">
                <Link href='books/create'>
                    <PrimaryButton class="mt-4">Add a Book</PrimaryButton>
                </Link>
            </div>
        </template>
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            <Book
                v-for="book in books"
                    :key="book.isbn"
                    :book="book"
            />
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Book from '@/Components/Book.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps(['books']);

const form = useForm({
    isbn: '',
    title: '',
    author: '',
});

const submit = () => {
    form.post(route('books.store'), {
        onSuccess: () => form.reset('password'),
    });
}
</script>

<template>
    <Head title="Books" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add a Book</h2>
        </template>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="submit" class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <div class="my-2">
                    <InputLabel for="isbn" value="Book ISBN" />

                    <TextInput
                        id="isbn"
                        type="isbn"
                        class="mt-1 block w-full"
                        v-model="form.isbn"
                        required
                        autofocus
                        autocomplete="isbn"
                        placeholder="12345"
                    />

                    <InputError class="mt-2" :message="form.errors.isbn" />
                </div>

                <div class="my-2">
                    <InputLabel for="title" value="Book Title" />

                    <TextInput
                        id="title"
                        type="title"
                        class="mt-1 block w-full"
                        v-model="form.title"
                        required
                        autofocus
                        autocomplete="title"
                        placeholder="the greatest book"
                    />

                    <InputError class="mt-2" :message="form.errors.title" />
                </div>

                <div class="my-2">
                    <InputLabel for="author" value="Book Author" />

                    <TextInput
                        id="author"
                        type="author"
                        class="mt-1 block w-full"
                        v-model="form.author"
                        required
                        autofocus
                        autocomplete="author"
                        placeholder="the best author"
                    />

                    <InputError class="mt-2" :message="form.errors.author" />
                </div>

                <PrimaryButton class="" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Add Book
                </PrimaryButton>
            </form>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import VariousSetting from './Partials/VariousSetting.vue';
import ReturnButton from '@/Mycomponents/ReturnButton.vue';
import { Head } from '@inertiajs/vue3';
import { onMounted } from 'vue';
import { initFlowbite } from 'flowbite';

onMounted ( () => {
    initFlowbite();
})

defineProps({
    mustVerifyEmail: Boolean,
    status: String,
});

const returnURL = 'items.index'
</script>

<template>
    <Head title="プロフィール編集" />

    <AuthenticatedLayout>
        <ReturnButton :returnURL="returnURL"/>

        <section class="text-gray-600 body-font">
            <div class="container md:px-5 py-10 mx-auto">
                <div class="p-2 mx-auto lg:w-2/3">
                    <UpdateProfileInformationForm
                        :must-verify-email="mustVerifyEmail"
                        :status="status"
                    />
                </div>

                <div class="p-2 mx-auto lg:w-2/3">
                    <VariousSetting />
                </div>

                <div class="p-2 mx-auto lg:w-2/3">
                    <DeleteUserForm />
                </div>
            </div>
        </section>
    </AuthenticatedLayout>
</template>

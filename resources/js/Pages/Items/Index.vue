<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Header from '@/Mycomponents/Header.vue';
import SortModal from '@/Mycomponents/SortModal.vue';
import ItemList from '@/Mycomponents/ItemList.vue';
import Footer from '@/Mycomponents/Footer.vue';
import BarcodeReading from '@/Mycomponents/BarcodeReading.vue';
import ItemSizeSetting from '@/Mycomponents/ItemSizeSetting.vue';
import StorageSelect from '@/Mycomponents/StorageSelect.vue';
import { Head, Link } from '@inertiajs/vue3';
import 'flowbite';
import { initFlowbite } from 'flowbite';
import { onMounted } from 'vue';

onMounted ( () => {
    initFlowbite();
})
</script>


<template>
    <Head title="アイテム一覧" />

    <AuthenticatedLayout>
        <Header />
        <SortModal />

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    
                <ItemList />
                   
            </div>
        </div>

        <BarcodeReading />
        <ItemSizeSetting />
        <StorageSelect />
        <Footer />
    </AuthenticatedLayout>
</template>

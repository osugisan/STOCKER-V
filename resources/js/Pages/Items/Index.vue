<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Header from "@/Mycomponents/Items/Header.vue";
import SortModal from "@/Mycomponents/Items/SortModal.vue";
import ItemList from "@/Mycomponents/Items/ItemList.vue";
import Footer from "@/Mycomponents/Items/Footer.vue";
import BarcodeReading from "@/Mycomponents/Items/BarcodeReading.vue";
import ItemSizeSetting from "@/Mycomponents/Items/ItemSizeSetting.vue";
import StorageSelect from "@/Mycomponents/Items/StorageSelect.vue";
import { Head, Link } from "@inertiajs/vue3";
import "flowbite";
import { initFlowbite } from "flowbite";
import { onMounted } from "vue";

onMounted(() => {
    initFlowbite();
});

const props = defineProps({
    user: Object,
    current_group: Object,
    items: Array,
});
</script>

<template>
    <Head title="アイテム一覧" />

    <AuthenticatedLayout>
        <Header />
        <SortModal />

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <ItemList :items="props.items" :user="props.user" />
            </div>
        </div>

        <BarcodeReading />
        <ItemSizeSetting />
        <StorageSelect />
        <Footer />
    </AuthenticatedLayout>
</template>

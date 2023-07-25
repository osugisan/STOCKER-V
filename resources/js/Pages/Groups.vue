<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ReturnButton from "@/Mycomponents/ReturnButton.vue";
import GroupSelecter from "@/Mycomponents/Groups/GroupSelecter.vue";
import GroupModal from "@/Mycomponents/Groups/GroupModal.vue";
import BasicInfo from "@/Mycomponents/Groups/BasicInfo.vue";
import MemberList from "@/Mycomponents/Groups/MemberList.vue";
import InviteLink from "@/Mycomponents/Groups/InviteLink.vue";
import { Head, Link } from "@inertiajs/vue3";
import "flowbite";
import { initFlowbite } from "flowbite";
import { onMounted, reactive, ref, watch } from "vue";

onMounted(() => {
    initFlowbite();
});

const returnURL = "profile.edit";

const props = defineProps({
    user: Object,
    groups: Object,
    current_group: Object,
    members: Array,
})

</script>

<template>
    <Head title="グループ設定" />

    <AuthenticatedLayout>
        <ReturnButton :returnURL="returnURL" />
        
        <section class="text-gray-600 body-font">
            <div class="container md:px-5 py-12 mx-auto">
                <GroupSelecter :groups="props.groups" :user="props.user" :current_group="props.current_group" />
                
                <GroupModal />

                <BasicInfo :user="props.user" :current_group="props.current_group" />

                <MemberList :members="props.members" :current_group="props.current_group" :user="props.user" />
                
                <InviteLink />

                <div class="p-2 mx-auto lg:w-2/3">
                    <button
                        type="button"
                        class="block mx-auto mt-4 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                    >
                        グループを削除する
                    </button>
                </div>
            </div>
        </section>
    </AuthenticatedLayout>
</template>

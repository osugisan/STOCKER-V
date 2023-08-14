<script setup>
import GroupModal from "@/Mycomponents/Groups/GroupModal.vue";
import { router } from "@inertiajs/vue3";
import { computed, reactive, ref, watch } from "vue";

const props = defineProps({
    groups: Array,
    user: Object,
    current_group: Object,
    tags: Object,
});

watch(() => props.groups, () => {
    groups = props.groups
})

let groups = reactive(props.groups);

const unselectedGroups = computed(() => {
    const unselect = groups.filter((group) => {
        return group.id !== props.current_group.id
    });
    return unselect
});

const changeCurrentGroup = id => {
    document.getElementById('dropdown').classList.toggle('hidden');
    router.put(route('groups.user-update', id), {type: 'select'})
}

const groupModal = ref()

const onChildMethodClick = () => {
    groupModal.value.formReset()
};

</script>

<template>
    <div class="p-2 text-center mx-auto lg:w-2/3">
        <button
            id="dropdownDefaultButton"
            data-dropdown-toggle="dropdown"
            class="w-2/3 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 font-medium rounded-lg text-lg px-4 py-2.5 text-center inline-flex items-center shadow-lg"
            type="button"
        >
            {{ props.current_group.name }}
            <p
                v-if="props.current_group.id === props.user.main_group"
                class="ml-2"
            >
                【メイン】
            </p>
            <svg
                class="w-4 h-4 ml-auto"
                aria-hidden="true"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M19 9l-7 7-7-7"
                ></path>
            </svg>
        </button>
        <!-- ドロップダウンメニュー -->
        <div
            id="dropdown"
            class="w-1/2 z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-lg dark:bg-gray-700"
        >
            <ul
                class="py-2 font-medium text-gray-700 dark:text-gray-200"
                aria-labelledby="dropdownDefaultButton"
            >
                <button
                    v-for="group in unselectedGroups"
                    :key="group.id"
                    @click="changeCurrentGroup(group.id)"
                    class="w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                >
                    <li class="flex justify-center">
                        {{ group.name }}
                        <p
                            v-if="group.id === props.user.main_group"
                            class="ml-2"
                        >
                            【メイン】
                        </p>
                    </li>
                </button>
                <li class="border-t">
                    <button
                        data-modal-target="group-modal"
                        data-modal-toggle="group-modal"
                        type="button"
                        @click="onChildMethodClick"
                        class="w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                    >
                        グループを追加
                    </button>
                </li>
            </ul>
        </div>
    </div>

    <GroupModal ref="groupModal" />
</template>

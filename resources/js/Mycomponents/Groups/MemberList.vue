<script setup>
import { router } from "@inertiajs/vue3";
import { computed, reactive, watch } from "vue";

const props = defineProps({
    members: Array,
    current_group: Object,
});

watch( () => props.members,() => {
    members =[]
    members.push(props.members)
    console.log('watch', members)
})

let members = reactive(props.members)

const ownerMember = computed(() => {
    console.log('computed', members)
    const owner = members.filter((member) => {
        return member.pivot.owner === 1;
    });
    return owner;
});

const normalMembers = computed(() => {
    const normal = members.filter((member) => {
        return member.pivot.owner === 0;
    });
    return normal;
});

const fireMember = (userId, groupId) => {
    console.log(userId, groupId)
    router.post(route("groups.fire", userId), {
    group: groupId,
    });
};
</script>

<template>
    <div class="p-2 mx-auto lg:w-2/3">
        <div
            class="bg-white bg-opacity-90 px-4 py-4 rounded-lg overflow-hidden shadow-lg"
        >
            <div class="font-medium">
                <p>メンバー</p>
            </div>

            <div class="text-lg p-2">
                <button>
                    <svg
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true"
                        class="w-6 inline-flex mr-2 pb-1"
                    >
                        <path
                            clip-rule="evenodd"
                            fill-rule="evenodd"
                            d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                        ></path>
                    </svg>
                </button>
                <p class="inline-flex">{{ ownerMember[0].name }}</p>
            </div>
            <div
                v-for="normalMember in normalMembers"
                :key="normalMember.id"
                class="text-lg p-2"
            >
                <button
                    @click="fireMember(normalMember.id, props.current_group.id)"
                    class="text-red-500"
                >
                    <svg
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true"
                        class="w-6 inline-flex mr-2 pb-1"
                    >
                        <path
                            clip-rule="evenodd"
                            fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM6.75 9.25a.75.75 0 000 1.5h6.5a.75.75 0 000-1.5h-6.5z"
                        ></path>
                    </svg>
                </button>
                <p class="inline-flex">{{ normalMember.name }}</p>
            </div>
        </div>
    </div>
</template>

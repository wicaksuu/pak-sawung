<script setup>
import {useDark} from "@vueuse/core";
import { Head, useForm, Link } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import Card from "@/Components/Card.vue";
import CardUser from "@/Components/CardUser.vue";
import ToastList from "@/Components/ToastList.vue";
const props = defineProps({
    data: {
        type: Object,
        default: () => ({}),
    },
    kelas: {
        type: Object,
        default: () => ({}),
    },
    user: {
        type: Object,
        default: () => ({}),
    },
});
</script>
<template>
    <GuestLayout>
        <ToastList />
        <h1 class="text-2xl font-extrabold">{{ data.nama }}</h1>
        <Head :title="data.nama" />
        <CardUser :dataJokis="user" />
        <p class="pt-5"></p>
        <hr />
        <Card :dataJokis="kelas" />
    </GuestLayout>
</template>

<script setup>
import CardItemUser from "@/Components/CardItemUser.vue";
defineProps(["dataJokis"]);
</script>

<template>
    <div class="mt-6 h-full flex flex-col">
        <div class="grid md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-4">
            <CardItemUser :metaData="dataJokis" />
        </div>
    </div>
</template>

<script setup>
import { Head, useForm, Link } from "@inertiajs/vue3";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import axios from "axios";

const props = defineProps({
    searchResult: {
        type: Object,
        default: () => ({}),
    },
});
const form = useForm({
    nama: "",
});

const searchData = async () => {
    if (form.nama != "") {
        try {
            const response = await axios.get(`/cari?keyword=${form.nama}`);
            form.searchResult = response.data;
        } catch (error) {
            console.log(error);
        }
    } else {
        form.searchResult = {};
    }
};
</script>

<template>
    <Head title="Wellcome" />

    <div class="flex items-center justify-center h-screen">
        <div
            class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-xl shadow-xl sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700"
        >
            <div class="flex flex-col items-center pb-10">
                <img
                    class="w-24 h-24 mb-3 rounded-full shadow-lg"
                    src="@/Assets/86.png"
                    alt="86"
                />
                <h5
                    class="mb-1 text-xl font-medium text-gray-900 dark:text-white"
                >
                    SMPN 1 Magetan
                </h5>
                <span class="text-sm text-gray-500 dark:text-gray-400"
                    >Daftar Peserta Reuni</span
                >
            </div>

            <div class="space-y-5">
                <div>
                    <InputLabel
                        for="nama"
                        value="Silahkan Masukkan Nama Anda"
                    />
                    <TextInput
                        @input="searchData"
                        id="nama"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.nama"
                        required
                        autocomplete="nama"
                    />
                    <InputError :message="form.errors.nama" class="mt-2" />
                </div>
                <div>
                    <div class="pb-1" v-for="data in form.searchResult">
                        <Link :href="'/user/' + data.id">
                            <button
                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            >
                                {{ data.nama }}
                            </button>
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

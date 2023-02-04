<script setup>
import { Head, useForm, Link } from "@inertiajs/vue3";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import axios from "axios";
import DatePicker from "@/Components/DatePicker.vue";

const props = defineProps({
    data: {
        type: Object,
        default: () => ({}),
    },
    provinsi: {
        type: Object,
        default: () => ({}),
    },
    kelas: {
        type: Object,
        default: () => ({}),
    },
    kaos: {
        type: Object,
        default: () => ({}),
    },
});

const cariKota = async () => {
    try {
        const response = await axios.get(`/kota/${form.provinsi}`);
        dump.kota = response.data;
    } catch (error) {
        console.log(error);
    }
};
const cariKec = async () => {
    try {
        const response = await axios.get(`/kec/${form.kotas}`);
        dump.kec = response.data;
    } catch (error) {
        console.log(error);
    }
};
const cariDes = async () => {
    try {
        const response = await axios.get(`/des/${form.kecs}`);
        dump.des = response.data;
    } catch (error) {
        console.log(error);
    }
};

const dump = useForm({
    kota: {
        type: Object,
        default: () => ({}),
    },
    kec: {
        type: Object,
        default: () => ({}),
    },
    des: {
        type: Object,
        default: () => ({}),
    },
});

const form = useForm({
    userId: props.data.id,
    email: "",
    foto: "",
    alamat: "",
    provinsi: "",
    kotas: "",
    kecs: "",
    dess: "",
    nik: "",
    tempatLahir: "",
    tanggalLahir: "",
    kelas: props.data.kelas_id,
    kaos: "",
    tlp: "",
});

const submit = () => {
    form.post(route("save-alamat"), {
        onSuccess: () => form.reset(),
    });
};

</script>

<template>
    <Head title="Alamat" />
    <div class="flex items-center justify-center h-full p-3">
        <div
            class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-xl shadow-xl sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700"
        >
            <div class="flex flex-col items-center pb-10">
                <h5
                    class="mb-3 text-xl font-medium text-gray-900 dark:text-white"
                >
                    Reuni
                </h5>
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
                <span class="text-sm text-gray-500 dark:text-gray-400">
                    {{ props.data.nama }}
                </span>
            </div>

            <form @submit.prevent="submit">
                <div class="space-y-5">
                    <div>
                        <label
                            for="des"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >
                            Pilih Kelas
                        </label>
                        <select
                            id="dess"
                            name="dess"
                            v-model="form.kelas"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        >
                            <option
                                v-for="kelas in props.kelas"
                                :value="kelas.id"
                                :selected="kelas.id === props.data.kelas_id"
                            >
                                {{ kelas.nama }}
                            </option>
                        </select>
                    </div>
                    <div>
                        <InputLabel
                            for="email"
                            value="Email"
                        />
                        <TextInput
                            id="email"
                            type="email"
                            class="mt-1 block w-full"
                            v-model="form.email"
                            
                            autocomplete="email"
                        />
                        <InputError :message="form.errors.email" class="mt-2" />
                    </div>
                    <div>
                        <InputLabel
                            for="tlp"
                            value="Nomor Telepon / WhatsApp"
                        />
                        <TextInput
                            id="tlp"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.tlp"
                            
                            autocomplete="tlp"
                        />
                        <InputError :message="form.errors.tlp" class="mt-2" />
                    </div>
                    <div>
                        <InputLabel
                            for="nik"
                            value="Silahkan Masukkan NIK Anda"
                        />
                        <TextInput
                            id="nik"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.nik"
                            
                            autocomplete="nik"
                        />
                        <InputError :message="form.errors.nik" class="mt-2" />
                    </div>

                    <div>
                        <InputLabel
                            for="tempatLahir"
                            value="Silahkan Masukkan Tempat Lahir Anda"
                        />
                        <TextInput
                            id="tempatLahir"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.tempatLahir"
                            
                            autocomplete="tempatLahir"
                        />
                        <InputError
                            :message="form.errors.tempatLahir"
                            class="mt-2"
                        />
                    </div>
                    <div>
                        <DatePicker
                            v-model="form.tanggalLahir"
                            label="Tanggal Lahir"
                        />
                    </div>

                    <div>
                        <InputLabel
                            for="alamat"
                            value="Silahkan Masukkan Alamat Anda"
                        />
                        <TextInput
                            id="alamat"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.alamat"
                            
                            autocomplete="alamat"
                        />
                        <InputError
                            :message="form.errors.alamat"
                            class="mt-2"
                        />
                    </div>
                    <div>
                        <label
                            for="provinsi"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >
                            Pilih Provinsi
                        </label>
                        <select
                            id="provinsi"
                            name="provinsi"
                            v-model="form.provinsi"
                            @change="cariKota"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        >
                            <option
                                v-for="provinsi in props.provinsi"
                                :value="provinsi.id"
                            >
                                {{ provinsi.nama }}
                            </option>
                        </select>
                    </div>
                    <div>
                        <label
                            for="kota"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >
                            Pilih Kota
                        </label>
                        <select
                            id="kotas"
                            name="kotas"
                            v-model="form.kotas"
                            @change="cariKec"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        >
                            <option v-for="kota in dump.kota" :value="kota.id">
                                {{ kota.nama }}
                            </option>
                        </select>
                    </div>

                    <div>
                        <label
                            for="kec"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >
                            Pilih Kecamatan
                        </label>
                        <select
                            id="kecs"
                            name="kecs"
                            v-model="form.kecs"
                            @change="cariDes"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        >
                            <option v-for="kec in dump.kec" :value="kec.id">
                                {{ kec.nama }}
                            </option>
                        </select>
                    </div>

                    <div>
                        <label
                            for="des"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >
                            Pilih Desa
                        </label>
                        <select
                            id="dess"
                            name="dess"
                            v-model="form.dess"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        >
                            <option v-for="des in dump.des" :value="des.id">
                                {{ des.nama }}
                            </option>
                        </select>
                    </div>
                    <div>
                        <label
                            for="des"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >
                            Pilih Ukuran Kaos
                        </label>
                        <select
                            id="dess"
                            name="dess"
                            v-model="form.kaos"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        >
                            <option v-for="kaos in props.kaos" :value="kaos.id">
                                {{ kaos.nama }}
                            </option>
                        </select>
                    </div>
                </div>

                <div class="pt-5 flex text-center items-center">
                    <PrimaryButton
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Selanjutanya
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </div>
</template>

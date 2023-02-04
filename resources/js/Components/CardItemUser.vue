<script setup>
import Button from "@/Components/PrimaryButton.vue";
import Edit from "@/Components/Edit.vue";
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import DatePicker from "@/Components/DatePicker.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import Modal from "@/Components/Modal.vue";
import InputError from "@/Components/InputError.vue";
import SuccessButton from "@/Components/SuccessButton.vue";
import axios from "axios";
import toast from "@/Stores/toast";

const props = defineProps({
    metaData: {
        type: Object,
        default: () => ({}),
    },
});

const tambahJoki = ref(false);

const dump = useForm({
    user: {
        type: Object,
        default: () => ({
            alamat:'',
            desa:{id:0,nama:""},
            desa_id:0,
            email:"",
            kaos:{id:0,"nama":""},
            kaos_id:0,
            kecamatan:{id:0,"nama":""},
            kecamatan_id:0,
            kelas:{id:0,"nama":""},
            kelas_id:0,
            kota:{id:0,"nama":""},
            kota_id:0,
            nama:"",
            nik:"",
            provinsi:{id:0,"nama":""},
            provinsi_id:0,
            tanggal_lahir:"",
            tempat_lahir:"",
            tlp:"",      
        }),
    },
    provinsi: {
        type: Object,
        default: () => ({}),
    },
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
    kaos: {
        type: Object,
        default: () => ({}),
    },
    kelas: {
        type: Object,
        default: () => ({}),
    },
});
const startKaos = async () => {
    try {
        const response = await axios.get(`/kaos`);
        dump.kaos = response.data;
    } catch (error) {
        console.log(error);
    }
};
const startKelas = async () => {
    try {
        const response = await axios.get(`/kelas`);
        dump.kelas = response.data;
    } catch (error) {
        console.log(error);
    }
};
const cariProvinsi = async () => {
    try {
        const response = await axios.get(`/provinsi`);
        dump.provinsi = response.data;
    } catch (error) {
        console.log(error);
    }
};
const startKota = async (id) => {
    try {
        const response = await axios.get(`/kota/${id}`);
        dump.kota = response.data;
    } catch (error) {
        console.log(error);
    }
};
const startKec = async (id) => {
    try {
        const response = await axios.get(`/kec/${id}`);
        dump.kec = response.data;
    } catch (error) {
        console.log(error);
    }
};
const startDes = async (id) => {
    try {
        const response = await axios.get(`/des/${id}`);
        dump.des = response.data;
    } catch (error) {
        console.log(error);
    }
};

const cariKota = async () => {
    try {
        const response = await axios.get(`/kota/${form.provinsi_id}`);
        dump.kota = response.data;
    } catch (error) {
        console.log(error);
    }
};
const cariKec = async () => {
    try {
        const response = await axios.get(`/kec/${form.kota_id}`);
        dump.kec = response.data;
    } catch (error) {
        console.log(error);
    }
};
const cariDes = async () => {
    try {
        const response = await axios.get(`/des/${form.kecamatan_id}`);
        dump.des = response.data;
    } catch (error) {
        console.log(error);
    }
};

const form = useForm({
    id: "",
    nik: "",
    email: "",
    nama: "",
    tempat_lahir: "",
    tanggal_lahir: "",
    tlp: "",
    alamat: "",
    provinsi_id: "",
    kota_id: "",
    kecamatan_id: "",
    desa_id: "",
    kelas_id: "",
    kaos_id: "",
    id: "",
    userId: "",
});

const editItem = (item) => {
    let kaos_id =0;
    let kaos_nama ="";
    let provinsi_id =0;
    let provinsi_nama ="";
    let kota_id =0;
    let kota_nama ="";
    let kecamatan_id =0;
    let kecamatan_nama ="";
    let desa_id =0;
    let desa_nama ="";
    let kelas_id =0;
    let kelas_nama ="";
    
    if (item.kelas) {
        kelas_id = item.kelas.id;           
        kelas_nama = item.kelas.nama; 
    }
    if (item.desa) {
        desa_id = item.desa.id;           
        desa_nama = item.desa.nama; 
    }
    if (item.kecamatan) {
        kecamatan_id = item.kecamatan.id;           
        kecamatan_nama = item.kecamatan.nama; 
    }
    if (item.kaos) {
        kaos_id = item.kaos.id;        
        kaos_nama = item.kaos.nama;        
    }
    if (item.provinsi) {
        provinsi_id = item.provinsi.id;           
        provinsi_nama = item.provinsi.nama; 
    }
    if (item.kota) {
        kota_id = item.kota.id;           
        kota_nama = item.kota.nama; 
    }
    
    form.kaos_id = kaos_id;
    form.kaos_nama = kaos_nama;
    form.email = item.email;
    form.userId = item.id;
    form.id = item.id;
    form.nama = item.nama;
    form.tempat_lahir = item.tempat_lahir;
    form.tlp = item.tlp;
    form.alamat = item.alamat;
    form.provinsi_id = provinsi_id;
    form.provinsi_nama = provinsi_nama;
    form.kecamatan_id = kecamatan_id;
    form.kecamatan_nama = kecamatan_nama;
    form.kota_id = kota_id;
    form.kota_nama = kota_nama;
    form.desa_id = desa_id;
    form.desa_nama = desa_nama;
    form.kelas_id = kelas_id;
    form.kelas_nama = kelas_nama;
    form.nik = item.nik;
    form.tanggal_lahir = item.tanggal_lahir;
    if (item.kota) {
        startKec(form.kota_id);
    }
    if (item.provinsi) {
        startKota(form.provinsi_id);
    }
    if (item.kecamatan) {
        startDes(form.kecamatan_id);
    }
    cariProvinsi();
    startKaos();
    startKelas();
    tambahJoki.value = true;
};
const closeModal = () => {
    tambahJoki.value = false;
    form.reset();
};

function addToast(Type, Message, Duration) {
    toast.add({
        type: Type,
        message: Message,
        duration: Duration,
    });
}
const updateDataJoki = async () => {
    try {
        if (form.nama != "") {
            const response = await axios.post(route("update"), form);
            closeModal();
            addToast(
                response.data.type,
                response.data.message,
                response.duration
            );
            const resp = await axios.get(route("update-dashboard"));
            dump.user = resp.data.user;
            return resp.data.user;
        } else {
            const resp = await axios.get(route("update-dashboard"));
            dump.user = resp.data.user;
            return resp.data.user;
        }
    } catch (error) {
        console.error(error);
    }
};
function truncateString(string, limit) {
    if (string != null) {
        
    if (string.length > limit) {
        return string.substring(0, limit) + "...";
    }
    }
    return string;
}

updateDataJoki();
</script>
<template>
    <Modal :show="tambahJoki" @close="closeModal">
        <div class="p-6">
            <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100">
                Edit Data {{ form.nama }}
            </h2>

            <div class="mt-4">
                <InputLabel for="kelas_id" value="Kelas" />
                <select
                    id="kelas_id"
                    required
                    v-model="form.kelas_id"
                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                >
                    <option
                        v-for="kelas in dump.kelas"
                        :value="kelas.id"
                        :selected="kelas.id === form.kelas_id"
                    >
                        {{ kelas.nama }}
                    </option>
                </select>
                <InputError :message="form.errors.kelas_id" class="mt-2" />
            </div>
            <div class="mt-4">
                <InputLabel for="email" value="Email" />
                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autocomplete="email"
                />
                <InputError :message="form.errors.email" class="mt-2" />
            </div>
            <div class="mt-4">
                <InputLabel for="nik" value="NIK" />
                <TextInput
                    id="nik"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.nik"
                    required
                    autocomplete="nik"
                />
                <InputError :message="form.errors.nik" class="mt-2" />
            </div>
            <div class="mt-4">
                <InputLabel for="nama" value="Nama Lengkap" />
                <TextInput
                    id="nama"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.nama"
                    required
                    autocomplete="nama"
                />
                <InputError :message="form.errors.nama" class="mt-2" />
            </div>
            <div class="mt-4">
                <InputLabel for="tempat_lahir" value="Tempat Lahir" />
                <TextInput
                    id="tempat_lahir"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.tempat_lahir"
                    required
                    autocomplete="tempat_lahir"
                />
                <InputError :message="form.errors.tempat_lahir" class="mt-2" />
            </div>
            <DatePicker v-model="form.tanggal_lahir" label="Tanggal Lahir" />

            <TextInput
                id="id"
                type="hidden"
                v-model="form.id"
                required
                autocomplete="id"
            />
            <div class="mt-4">
                <InputLabel for="tlp" value="Nomor Hp" />
                <TextInput
                    id="tlp"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.tlp"
                    required
                    autocomplete="tlp"
                />
                <InputError :message="form.errors.tlp" class="mt-2" />
            </div>

            <div class="mt-4">
                <InputLabel for="alamat" value="Alamat" />
                <TextInput
                    id="alamat"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.alamat"
                    required
                    autocomplete="alamat"
                />
                <InputError :message="form.errors.alamat" class="mt-2" />
            </div>
            <div class="mt-4">
                <InputLabel for="provinsi_id" value="Provinsi" />
                <select
                    id="provinsi_id"
                    required
                    v-model="form.provinsi_id"
                    @change="cariKota"
                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                >
                    <option
                        v-for="provinsi in dump.provinsi"
                        :value="provinsi.id"
                        :selected="provinsi.id === form.provinsi_id"
                    >
                        {{ provinsi.nama }}
                    </option>
                </select>

                <InputError :message="form.errors.provinsi_id" class="mt-2" />
            </div>
            <div class="mt-4">
                <InputLabel for="kota_id" value="Kota" />
                <select
                    id="kota_id"
                    required
                    @change="cariKec"
                    v-model="form.kota_id"
                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                >
                    <option
                        v-for="kota in dump.kota"
                        :value="kota.id"
                        :selected="kota.id === form.kota_id"
                    >
                        {{ kota.nama }}
                    </option>
                </select>
                <InputError :message="form.errors.kota_id" class="mt-2" />
            </div>
            <div class="mt-4">
                <InputLabel for="kecamatan_id" value="Kecamatan" />
                <select
                    id="kecamatan_id"
                    required
                    @change="cariDes"
                    v-model="form.kecamatan_id"
                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                >
                    <option
                        v-for="kecamatan in dump.kec"
                        :value="kecamatan.id"
                        :selected="kecamatan.id === form.kecamatan_id"
                    >
                        {{ kecamatan.nama }}
                    </option>
                </select>
                <InputError :message="form.errors.kecamatan_id" class="mt-2" />
            </div>
            <div class="mt-4">
                <InputLabel for="desa_id" value="Desa" />
                <select
                    id="desa_id"
                    required
                    v-model="form.desa_id"
                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                >
                    <option
                        v-for="desa in dump.des"
                        :value="desa.id"
                        :selected="desa.id === form.desa_id"
                    >
                        {{ desa.nama }}
                    </option>
                </select>
                <InputError :message="form.errors.desa_id" class="mt-2" />
            </div>
            <div class="mt-4">
                <InputLabel for="kaos_id" value="Kaos" />

                        <p class="italic opacity-60">*format ukuran (cm) :</p>
                        <p class="text-sm italic opacity-60">Ukuran , Lebar , Panjang , P.Pundak , P.Lengan</p>
                        <p class="pt-2 text-sm italic opacity-60">S , 47 , 67 , 13 , 53</p>
                        <p class="text-sm italic opacity-60">M , 49 , 69 , 13 , 54</p>
                        <p class="text-sm italic opacity-60">L , 51 , 71 , 15 , 55</p>
                        <p class="text-sm italic opacity-60">XL , 53 , 73 , 16 , 58</p>
                        <p class="text-sm italic opacity-60">2XL , 55 , 75 , 16 , 59</p>
                        <p class="pb-4 text-sm italic opacity-60">3XL , 57 , 77 , 16 , 61</p>
                <select
                    id="kaos_id"
                    required
                    v-model="form.kaos_id"
                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                >
                    <option
                        v-for="kaos in dump.kaos"
                        :value="kaos.id"
                        :selected="kaos.id === form.kaos_id"
                    >
                        {{ kaos.nama }}
                    </option>
                </select>
                <InputError :message="form.errors.kaos_id" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <Button @click="closeModal"> Cancel </Button>
                <SuccessButton
                    class="ml-1"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                    @click="updateDataJoki"
                >
                    Save
                </SuccessButton>
            </div>
        </div>
    </Modal>

    <div v-if="dump.user.kelas && dump.user.kelas.nama">
        <div class="rounded-xl p-1 shadow-lg shadow-sky-200 bg-green-600">
            <div class="flex justify-between p-1">
                <p class="text-white font-extrabold text-xs p-1">
                    Kelas {{ dump.user.kelas.nama }}
                </p>
            </div>
            <div class="rounded-xl p-5 bg-white">
                <div class="card-body h-full">
                    <div class="flex flex-col justify-between h-full">
                        <div class="flex justify-between">
                            <p class="pl-2 text-2xl font-bold text-zinc-700">
                                {{ truncateString(dump.user.nama, 18) }}
                            </p>
                            <div class="flex text-center items-centered">
                                <button
                                    class="text-indigo-600 hover:text-indigo-900 p-1"
                                    @click="editItem(dump.user)"
                                >
                                    <Edit />
                                </button>
                            </div>
                        </div>
                        <div class="pl-2 mt-4">
                            <table class="table-auto">
                                <tr>
                                    <td>No.Hp</td>
                                    <td>:</td>
                                    <td class="text-zinc-500">
                                        {{ dump.user.tlp }}
                                    </td>
                                </tr>

                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td class="text-zinc-500" v-if="dump.user.desa">
                                        {{
                                            truncateString(
                                                dump.user.alamat +
                                                    ", " +
                                                    dump.user.desa.nama +
                                                    " " +
                                                    dump.user.kecamatan.nama +
                                                    " " +
                                                    dump.user.kota.nama +
                                                    " " +
                                                    dump.user.provinsi.nama,
                                                27
                                            )
                                        }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td class="text-zinc-500">
                                        
                                        {{ dump.user.email }}
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="mt-3">
                            <div class="flex items-center justify-between mt-2">
                                <span
                                    class="px-2 py-1 blue-white text-xs font-semibold rounded-full"
                               v-if="dump.user.kaos" >
                                    @{{
                                        truncateString(dump.user.kaos.nama, 10)
                                    }}
                                </span>
                                <div
                                    class="flex items-center rounded-full font-semibold text-xs"
                                >
                                    <div
                                        class="flex items-center px-2 py-1 border border-gray-300 rounded-full"
                                    >
                                        <svg
                                            stroke="currentColor"
                                            fill="none"
                                            stroke-width="0"
                                            viewBox="0 0 24 24"
                                            class="text-base"
                                            height="1em"
                                            width="1em"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"
                                            ></path>
                                        </svg>
                                        <span
                                            class="ml-1 rtl:mr-1 whitespace-nowrap"
                                            >{{
                                                truncateString(
                                                    dump.user.tempat_lahir,
                                                    30
                                                ) +
                                                ", " +
                                                dump.user.tanggal_lahir
                                            }}</span
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
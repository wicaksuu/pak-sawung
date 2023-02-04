<script setup>
import { onMounted, ref } from "vue";

defineProps(["modelValue", "label"]);

defineEmits(["update:modelValue"]);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute("autofocus")) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <div
        x-data
        x-init="flatpickr($refs.datetimewidget, {wrap: true, dateFormat: 'j/m/Y', maxDate: '30.12.1972'} );"
        x-ref="datetimewidget"
        class="flatpickr container mx-auto col-span-6 sm:col-span-6 mt-5"
    >
        <label
            for="datetime"
            class="flex-grow block font-medium text-sm text-gray-700 mb-1"
            >{{ label }}</label
        >
        <div class="flex align-middle align-content-center">
            <input
                x-ref="datetime"
                type="text"
                id="datetime"
                data-input
                placeholder="Pilih tanggal"
                :value="modelValue"
                @input="$emit('update:modelValue', $event.target.value)"
                ref="input"
                class="block w-full px-2 border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-400 focus:ring-opacity-50 rounded-l-md shadow-sm"
            />

            <a
                class="h-11 w-10 input-button cursor-pointer rounded-r-md bg-transparent border-gray-300 border-t border-b border-r"
                title="clear"
                data-clear
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-7 w-7 mt-2 ml-1"
                    viewBox="0 0 20 20"
                    fill="#c53030"
                >
                    <path
                        fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"
                    />
                </svg>
            </a>
        </div>
    </div>
</template>

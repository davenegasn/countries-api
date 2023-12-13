<script setup>
import { onMounted } from 'vue';
import Header from '@/components/Header.vue';
import Table from '@/components/Table.vue';
import useCountries from '@/composables/countries.js';

const loggedIn = defineProps(['user']);

const { countries, getCountries } = useCountries();

onMounted(() => {
    getCountries();
});
</script>

<template>
    <div class="overflow-hidden overflow-x-auto p-6 bg-white border-gray-200">
        <Header :user="loggedIn.user" />
        <div class="min-w-full align-middle">
            <Table v-if="countries.length" :countries="countries" />
            <h3 v-else class="text-center py-4">Fetching countries..</h3>
        </div>
    </div>
</template>
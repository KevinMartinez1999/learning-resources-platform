<script setup>
import axios from 'axios';
import { ref, onMounted } from 'vue';

let categories = ref([]);
let title = ref('');
let description = ref('');
let link = ref('');
let category_id = ref(null);

function createResource() {
    axios.post('/api/resources', {
        title: title.value,
        description: description.value,
        link: link.value,
        category_id: category_id.value,
    }).then((response) => {
        window.location.href = '/';
    }).catch((error) => {
        alert(error.message);
    });
}

onMounted(() => {
    axios.get('/api/categories').then((response) => {
        categories.value = response.data;
    }).catch((error) => {
        console.log('Hay un error', error);
    });
});
</script>

<template>
    <div class="m-6">
        <input type="text" v-model="title">
        <input type="text" v-model="description">
        <input type="text" v-model="link">
        <select v-model="category_id">
            <option v-for="category in categories" :key="category.id" :value="category.id">
                {{ category.name }}
            </option>
        </select>
        <button @click="createResource" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">
            Crear recurso
        </button>
    </div>
</template>
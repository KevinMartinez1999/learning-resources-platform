<script setup>
import axios from 'axios';
import { ref, onMounted } from 'vue';

let title = ref('');
let description = ref('');
let link = ref('');
let categories = ref([]);
let category_id = ref(null);

onMounted(() => {
    console.log('Component mounted.');
    axios.get("/api/categories").then((response) => {
        categories.value = response.data;
    }).catch((error) => {
        console.log(error);
    });
});

const createResource = () => {
    axios.post('/api/resources', {
        title: title.value,
        description: description.value,
        link: link.value,
    }).then((response) => {
        console.log(response);
    }).catch((error) => {
        console.log(error);
    });
}
</script>

<template>
    <div class="m-6">
        <input type="text" v-model="title">
        <input type="text" v-model="description">
        <input type="text" v-model="link">
        <select v-model="category_id">
            <option value="">Selecciona una categoría</option>
            <option v-for="category in categories" :key="category.id">
                {{ category.name }}
            </option>
        </select>
        <button @click="createResource" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">
            Crear recurso
        </button>
    </div>
</template>
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
    <div class="w-full flex flex-col m-6">
        <div class="mb-4">
            <p>Título:</p>
            <input type="text" v-model="title" class="w-1/3 rounded">
        </div>
        <div class="mt-4 mb-4">
            <p>Categoria:</p>
            <select v-model="category_id" class="w-1/3 rounded">
                <option v-for="category in categories" :key="category.id" :value="category.id">
                    {{ category.name }}
                </option>
            </select>
        </div>
        <div class="mt-4 mb-4">
            <p>Link:</p>
            <input type="text" v-model="link" class="w-1/3 rounded">
        </div>
        <div class="mt-4 mb-4">
            <p>Descripción:</p>
            <textarea v-model="description" class="w-1/2 h-48 rounded"></textarea>
        </div>
        <button @click="createResource"
            class="w-28 py-2 transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-blue-700 duration-300 font-bold text-white rounded">
            Crear recurso
        </button>
    </div>
</template>
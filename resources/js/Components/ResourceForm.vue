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
        window.location.href = '/resources';
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
    <form class="m-6">
        <div class="mb-6">
            <label for="resource-title" class="block mb-2 text-sm font-medium text-gray-900">Título</label>
            <input type="text" name="resource-title" id="resource-title" v-model="title" class="input-text"
                placeholder="Nombre del recurso..." required>
        </div>
        <div class="mb-6">
            <label for="resource-category" class="block mb-2 text-sm font-medium text-gray-900">Categoría</label>
            <select id="resource-category" v-model="category_id" class="input-text">
                <option :value="null" disabled hidden>Seleccione una categoría</option>
                <option v-for="category in categories" :key="category.id" :value="category.id" class="text-gray-900">
                    {{ category.name }}</option>
            </select>
        </div>
        <div class="mb-6">
            <label for="resource_link" class="block mb-2 text-sm font-medium text-gray-900">Enlace</label>
            <input type="text" name="resource_link" id="resource_link" v-model="link" class="input-text"
                placeholder="https://..." required>
        </div>
        <div class="mb-6">
            <label for="resource-description" class="block mb-2 text-sm font-medium text-gray-900">Descripción</label>
            <textarea name="resource-description" id="resource-description" v-model="description"
                class="input-text w-5/12 h-40 resize-none" placeholder="Descripción del recurso..." required></textarea>
        </div>
        <button type="button" @click="createResource" class="btn-animate">Crear recurso</button>
    </form>
</template>
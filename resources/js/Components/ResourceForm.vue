<script setup>
import axios from 'axios';
import { ref } from 'vue';

let title = ref('');
let description = ref('');
let link = ref('');

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
        <button @click="createResource">Crear recurso</button>
    </div>
</template>
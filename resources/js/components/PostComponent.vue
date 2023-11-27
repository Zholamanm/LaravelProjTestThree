<script setup>
import SinglePostComponent from "./SinglePostComponent.vue";
import CreateComponent from "./CreateComponent.vue";
import IndexComponent from "./IndexComponent.vue";
import {ref, reactive, onMounted} from 'vue';
import axios from "axios";


const indexRef = ref(null);

onMounted(() => {
    indexRef.value.indexLog();
})

const handleDataFromChild = (data) => {
    console.log('Data received from child:', data);
    // Обработка данных, полученных из дочернего компонента
};

</script>

<template>
    <div>
        <CreateComponent></CreateComponent>
        <single-post-component></single-post-component>
        <IndexComponent ref="indexRef" @updateParent="handleDataFromChild"></IndexComponent>

    </div>
</template>

<style scoped>

</style>

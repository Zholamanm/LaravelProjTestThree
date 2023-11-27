<script setup>
import {ref, reactive, onMounted} from 'vue';
import axios from "axios";

const data = reactive({

});
onMounted(data.getPeople)
</script>

<template>
    <div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
            </tr>
            </thead>
            <tbody v-for="person in data.people">
            <tr>
                <th scope="row">{{ person.id }}</th>
                <td>{{ person.name }}</td>
                <td>{{ person.age }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<style scoped>

</style>

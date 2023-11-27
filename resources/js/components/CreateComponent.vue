<script setup>
import {ref, reactive, onMounted} from 'vue';
import axios from "axios";

const data = reactive({
    name: null,
    age: null,
    job: null,
    addPerson() {
        axios.post('/api/people', {
            name: data.name,
            age: data.age,
            job: data.job,
        }).then( res => {
            data.name = null;
            data.age = null;
            data.job = null;
            // this.$parent.$refs.index.getPeople()
        })
    }
})
onMounted(data.addPerson)
</script>

<template>
    <div class="w-25">
        <div class="mb-3">
            <input type="text" class="form-control" id="name" v-model="data.name" name="name" placeholder="Enter name">
        </div>
        <div class="mb-3">
            <input type="number" class="form-control" id="age" v-model="data.age" name="age" placeholder="Enter age">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" id="job" v-model="data.job" name="job" placeholder="Enter job">
        </div>
        <div class="mb-3">
            <input @click="data.addPerson()" type="submit" class="btn btn-primary" value="Add">
        </div>
    </div>
</template>

<style scoped>

</style>

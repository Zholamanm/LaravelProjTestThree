<script setup>
import {ref, reactive, onMounted, defineEmits} from 'vue';
import axios from "axios";

const data = reactive({
    people: null,
    editPersonId: null,
    name: null,
    age: null,
    job: null,
    getPeople() {
        axios.get('/api/people').then( res => {
            data.people = res.data
        }).catch( error => {
            console.error(error)
        })
    },
    changeEditPersonId (id, name, age, job) {
        data.editPersonId = id
        data.name = name
        data.age = age
        data.job = job
    },
    isEdit (id) {
        return data.editPersonId === id
    },
    updatePerson (id) {
        data.editPersonId = null
        axios.patch(`/api/people/${id}`, {
            name: data.name,
            age: data.age,
            job: data.job,
        }).then( res => {
            data.getPeople()
        })
    },
    deletePerson (id) {
        axios.delete(`/api/people/${id}`).then( res => {
            data.getPeople()
        })
    },

});
onMounted(data.getPeople);

// const data1 = ref({
//     mounted() {
//         indexLog()
//     }
// })

const references = ref({
    indexLog() {
        return 'this is index component';
    }
})

const indexLog = () => {
    console.log('This is index component');
};

defineExpose({ indexLog });

const emit = defineEmits(['updateParent']);

const dataToSend = {
    message: "Привет, родитель!"
};

const sendDataToParent = () => {
    emit('updateParent', dataToSend);
};

onMounted(sendDataToParent)
</script>

<template>
    <div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Job</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            <template v-for="person in data.people">
                <tr :class="data.isEdit(person.id) ? 'd-none' : ''">
                    <th scope="row">{{ person.id }}</th>
                    <td>{{ person.name }}</td>
                    <td>{{ person.age }}</td>
                    <td>{{ person.job }}</td>
                    <td><a href="#" @click.prevent="data.changeEditPersonId(person.id, person.name, person.age, person.job)" class="btn btn-success">Edit</a></td>
                    <td><a href="#" @click.prevent="data.deletePerson(person.id)" class="btn btn-danger">Delete</a></td>
                </tr>
                <tr :class="data.isEdit(person.id) ? '' : 'd-none'">
                    <th scope="row">{{ person.id }}</th>
                    <td><input type="text" v-model="data.name" class="form-control"></td>
                    <td><input type="number" v-model="data.age" class="form-control"></td>
                    <td><input type="text" v-model="data.job" class="form-control"></td>
                    <td><a href="#" @click.prevent="data.updatePerson(person.id)" class="btn btn-success">Update</a></td>
                </tr>
            </template>
            </tbody>
        </table>
    </div>
</template>

<style scoped>

</style>

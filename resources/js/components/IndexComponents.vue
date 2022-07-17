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
            <template v-for="item in people">
                <tr :class="isEdit(item.id) ? 'd-none' : ''">
                    <th scope="row">{{ item.id }}</th>
                    <td>{{ item.name }}</td>
                    <td>{{ item.age }}</td>
                    <td>{{ item.job }}</td>
                    <td><a href="#" class="btn btn-primary"
                           @click.prevent="changePersonId(
                           item.id,
                           item.name,
                           item.age,
                           item.job)">edit</a></td>
                    <td><a href="#" class="btn btn-danger"
                           @click.prevent="deletePersonId(item.id)">delete</a></td>
                </tr>
                <tr :class="isEdit(item.id) ? '' : 'd-none'">
                    <th scope="row">{{ item.id }}</th>
                    <td><input type="text" v-model="name" placeholder="name" class="form-control"></td>
                    <td><input type="number" v-model="age" placeholder="age" class="form-control"></td>
                    <td><input type="text" v-model="job" placeholder="job" class="form-control"></td>
                    <td><a href="#" class="btn btn-success" @click.prevent="updatePerson(item.id)">Update</a></td>
                </tr>
            </template>

            </tbody>
        </table>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: "IndexComponents",
    data() {
        return {
            people: null,
            editPersonId: null,
            name: null,
            age: null,
            job: null
        }
    },
    mounted() {
        this.getPeople()
    },
    methods: {
        getPeople() {
            axios
                .get('/api/people')
                .then(res => {
                    this.people = res.data
                    console.log(res)
                })
        },
        updatePerson(id) {
            this.editPersonId = null
            axios
                .patch(`/api/people/${id}`, {
                    name: this.name,
                    age: this.age,
                    job: this.job
                })
                .then(res => {
                    this.getPeople()
                })
        },
        changePersonId(id, name, age, job) {
            this.editPersonId = id
            this.name = name
            this.age = age
            this.job = job
        },
        isEdit(id) {
            return id === this.editPersonId
        },
        deletePersonId(id) {
            axios.delete(`/api/people/${id}`)
                .then(res => {
                    this.getPeople()
                })
        }
    }
}
</script>

<style scoped>

</style>

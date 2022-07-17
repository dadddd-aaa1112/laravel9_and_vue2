<template>
    <div class="w-25">


        <div class="mb-3">
            <input type="text" class="form-control" v-model="name" placeholder="name">
        </div>
        <div class="mb-3">
            <input type="number" class="form-control" v-model="age" placeholder="age">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" v-model="job" placeholder="job">
        </div>
        <button @click="addPerson">button</button>


    </div>
</template>

<script>
import axios from 'axios'

export default {
    name: "CreateComponent",
    data() {
        return {
            name: null,
            age: null,
            job: null
        }
    },
    methods: {
        addPerson() {
            axios.post('/api/people', {
                name: this.name,
                age: this.age,
                job: this.job
            })
                .then(res => {
                        this.name = null,
                        this.age = null,
                        this.job = null
                    console.log(res)
                })

        }
    }

}
</script>

<style scoped>

</style>

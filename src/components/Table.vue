<template>
    <div>
    <router-link to="/user-form" tag="button" class="btn btn-primary">Create User</router-link>
    <div class="table" v-if="userData.length">
        <br><br><br><br>

        <br><br><br><br>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Dob</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in userData">
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div v-else="">
        <div class="container" >
            <div class="row" >
                <div class="col-lg-6 col-lg-offset-1">
                    <br><br><br><br><br><br>
                    <div class="alert alert-danger">
                        Sorry ! You need to create the data First
                    </div>
                    <button @click.prevent="getData" class="btn btn-primary">Get User Data</button>
                </div>
            </div>
        </div>

    </div>
    </div>
</template>

<script>
    import {mapActions,mapGetters } from 'vuex'
    export default {
        name:'dataTable',
        data() {
            return {

            }
        },
        methods:{
            ...mapActions({
                getData:'getUserData'
            })
        },

        computed:{
            ...mapGetters({
                userData:'getAllUserData'
            })
        },

        mounted(){
            this.getData();
        }
    }
</script>
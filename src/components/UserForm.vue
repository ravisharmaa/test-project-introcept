<template>
    <div class="userForm">
        <h2>{{message}}</h2>
        <router-link to="/" tag="button" class="btn btn-primary">User List</router-link>

        <br><br><br>
        <div class="bd-example" data-example-id="">

            <user-form></user-form>
        </div>
    </div>
</template>


<script>
    import UserForm from '../components/common/FormData.vue'
    export default {
       data () {
           return {
               message:'User Data Input Form'
           }
       },
       components:{
           UserForm
       }
   }

</script>
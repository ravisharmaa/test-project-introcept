<template>
    <div class="userForm">
        <form action="" @submit.prevent="submitData">
            <div class="form-group" :class="{'has-error':validation.name}">
                <label>Name</label>
                <input type="text"
                       class="form-control"
                       placeholder="Enter name"
                       v-model="formData.name">
            </div>

            <div class="form-group" :class="{'has-error':validation.email}">
                <label>Email address</label>
                <input type="email"
                       class="form-control"
                       placeholder="Enter email"
                       v-model="formData.email">
            </div>

            <div class="form-group" :class="{'has-error':validation.phone}">
                <label>Phone Number</label>
                <input type="number"
                       class="form-control"
                       placeholder="Enter phone number"
                       v-model="formData.number">
            </div>

            <div class="form-group" :class="{'has-error':validation.address}">
                <label>Address</label>
                <input type="text"
                       class="form-control"
                       placeholder="Enter Address"
                       v-model="formData.address">
            </div>

            <div class="form-group" :class="{'has-error':validation.education}">
                <label>Education</label>
                <input type="text"
                       class="form-control"
                       placeholder="Enter Education"
                       v-model="formData.education">
            </div>

            <div class="form-group" :class="{'has-error':validation.nationality}">
                <label>Nationality</label>
                <input type="text"
                       class="form-control"
                       placeholder="Enter enter Nationality"
                       v-model="formData.nationality">
            </div>



            <button type="submit" class="btn btn-primary pull-right">Submit</button>
        </form>
    </div>


</template>


<script>
    import {mapActions, mapGetters} from 'vuex'
    export default {
        data () {
            return {
                validation:[],
                formData :{
                    name:null,
                    phone:null,
                    email:null,
                    gender:null,
                    nationality:null,
                    address:null,
                    education:null,
                }
            }
        },
        methods: {

            submitData () {
                console.log('here');
                //this.submitForm(this.formData)
            },

            ...mapActions({
                submitForm: 'submitForm'
            }),

        },

        computed:{
            ...mapGetters({
                validations:'getValidationErrors'
            })
        }

    }

</script>
<template>
    <div class="userForm">

        <form action="" @submit.prevent="submitData">
            <div class="form-group" :class="{'has-error':validation.name}">
                <label>Name</label>
                <input type="text"
                       class="form-control"
                       placeholder="Enter name"
                       v-model="formData.name">
            <span class="help-block" v-if="validation.name">
                {{validation.name[0]}}
            </span>
            </div>



            <div class="form-group" :class="{'has-error':validation.email}">
                <label>Email address</label>
                <input type="email"
                       class="form-control"
                       placeholder="Enter email"
                       v-model="formData.email">
            <span class="help-block" v-if="validation.email">
                {{validation.email[0]}}
            </span>

            </div>


            <div class="form-group" :class="{'has-error':validation.phone}">
                <label>Phone Number</label>
                <input type="number"
                       class="form-control"
                       placeholder="Enter phone number"
                       v-model="formData.phone">
            <span class="help-block" v-if="validation.phone">
                {{validation.phone[0]}}
            </span>

            </div>

            <div class="form-group" :class="{'has-error':validation.address}">
                <label>Address</label>
                <input type="text"
                       class="form-control"
                       placeholder="Enter Address"
                       v-model="formData.address">
                <span class="help-block" v-if="validation.address">
                {{validation.address[0]}}
            </span>

            </div>

            <div class="form-group" :class="{'has-error':validation.contact_mode}">
                <label id="contact">Mode Of Contact</label>
                <select for="contact" class="form-control" id="" v-model="formData.contact_mode">
                    <option
                            v-for="contactMode in contactModes"
                            :selected="contactMode=='Email'">
                        {{contactMode}}
                    </option>
                </select>
            </div>

            <div class="form-group" :class="{'has-error':validation.education}">
                <label>Education</label>
                <input type="text"
                       class="form-control"
                       placeholder="Enter Education"
                       v-model="formData.education">
                <span class="help-block" v-if="validation.education">
                {{validation.education[0]}}
            </span>

            </div>

            <div class="form-group" :class="{'has-error':validation.gender}">
                <label>Gender</label>
                <input type="radio"
                       v-model="formData.gender"
                        value="Male">Male
                <input type="radio"
                       v-model="formData.gender"
                        value="Female">Fe-Male
            </div>





            <div class="form-group" :class="{'has-error':validation.nationality}">
                <label>Nationality</label>
                <input type="text"
                       class="form-control"
                       placeholder="Enter enter Nationality"
                       v-model="formData.nationality">
                <span class="help-block" v-if="validation.nationality">
                {{validation.nationality[0]}}
            </span>
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
                contactModes : ['Phone','Email'],
                formData :{

                    phone:null,
                    name:null,
                    email:null,
                    gender:'Male',
                    nationality:null,
                    address:null,
                    education:null,
                    contact_mode:'Email',
                    dob:null


                }
            }
        },
        methods: {

            submitData () {
                this.submitForm(this.formData)
            },

            ...mapActions({
                submitForm: 'submitForm'
            }),

        },

        computed:{
            ...mapGetters({
                validation:'getValidationErrors'
            })
        }

    }

</script>
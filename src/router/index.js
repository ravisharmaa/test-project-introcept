import Vue from 'vue'
import VueRouter from 'vue-router'
import UserForm from '../components/UserForm.vue'

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        {
            path:'/userForm',
            name:'user-form',
            component: UserForm
        }
    ]
})
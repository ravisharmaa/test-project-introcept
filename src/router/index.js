import Vue from 'vue'
import VueRouter from 'vue-router'
import UserForm from '../components/UserForm.vue'
import UserTable from  '../components/Table.vue'

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        {
            path:'/',
            name:'user-table',
            component: UserTable
        },
        {
            path:'/user-form',
            name:'user-form',
            component: UserForm
        },

    ]
})
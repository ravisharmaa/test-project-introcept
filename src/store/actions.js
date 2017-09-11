import axios from 'axios'

export const submitForm = ({commit}, data) =>{
    axios.post("127.0.0.0:8000/api/user-data",data).then((response) => {
        console.log(response);
    }).then((error) => {
        commit('setValidationErrors',{
            type:'userForm',
            errors: error.response.data
        })
    })
};
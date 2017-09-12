import axios from 'axios'

export const submitForm = ({commit}, data) =>{
    axios.post('http://127.0.0.1:8000/api/user-data',data).then((response) => {
        commit('exportSuccessData',response)
    }).catch((error) => {
        commit('setValidationErrors',{
            errors: error.response.data
        })
    })
};
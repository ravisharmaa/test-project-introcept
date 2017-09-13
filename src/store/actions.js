import axios from 'axios'

export const submitForm = ({commit}, data) =>{
    return axios.post('http://127.0.0.1:8000/api/post-user-data',data).then((response) => {
        commit('exportSuccessData',response.data)
    }).catch((error) => {
        commit('setValidationErrors',{
            errors: error.response.data
        })
    })
};

export const getUserData = ({commit}) => {
    return axios.get('http://127.0.0.1:8000/api/get-user-data').then((response) => {
      commit('exportUserData',response.data)
    });
};
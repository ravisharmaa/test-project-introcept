import axios from 'axios'

export const validationErrors = ({commit}, data) =>{
    axios.post("127.0.0.0:8000/api/create-user-data",data).then((response) => {
        console.log(response);
    })
};
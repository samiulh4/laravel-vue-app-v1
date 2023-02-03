import axios from 'axios';


const state = {
    user: {}
};
const getters = {};
const actions ={
    loginUser({}, user){
        axios.post('/api/sign-in',{
            email: user.email,
            password: user.password,
        }).then(response =>{
            if(response.data.success == true){
                localStorage.setItem('access_token', response.data.access_token);
            }
           // console.log(response.data);
        }).catch(error =>{
            console.log('loginUser Error =>',error);
        })
    },
    getUser({commit}){
        let myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");
        myHeaders.append("Accept", "application/json");
        myHeaders.append("Authorization", axios.defaults.headers.common["Authorization"]);
        let requestOptions = {
            method: 'GET',
            headers: myHeaders,
            redirect: 'follow'
        };
        axios.get('api/about-me',requestOptions).then( response => {
            commit('setUser', response.data);
        }).catch(error =>{
            console.log('getUser Error =>',error);
        })
    }
};
const mutations = {
    setUser(state, data){
        state.user = data
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}

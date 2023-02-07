import axios from 'axios';
import axiosConfig from "../../axiosConfig";
import router from '../../routes';

const state = {
    user: JSON.parse(localStorage.getItem('auth_user')) || {},
    isLoggedIn: JSON.parse(localStorage.getItem('auth_login_status')) || false,
    token: localStorage.getItem('auth_token') || null,
};
const getters = {
    getToken: state => state.token,
    getLoggedInStatus : state => state.isLoggedIn,
};
const actions ={
    navigateTo({ commit }, route) {
        router.push(route);
    },
    loginUser({commit, dispatch}, user){
        axios.post('/api/sign-in',{
            email: user.email,
            password: user.password,
        }).then(response =>{
            if(response.data.success == true){
                commit('setUser', response.data.user);
                commit('setToken', response.data.access_token);
                commit('setLoginStatus');
                dispatch('navigateTo', { path: '/home' });
            }else {
                alert(response.data.message);
            }
        }).catch(error =>{
            console.log('loginUser Error =>',error);
        })
    },
    logoutUser({commit, dispatch}){
        axiosConfig.get('/api/sign-out')
            .then(response =>{
                console.log('logoutUser [response] =>', response.data);
                commit('logout');
                alert(response.data.message);
                dispatch('navigateTo', { path: '/sign-in' });
            }).catch(error => {
                console.log('logoutUser [error] =>', error);
            })
    },
    getUser({commit}){
        axiosConfig.get('api/about-me')
        .then( response => {
            if(response.data.success == true){
                commit('setUser', response.data.user);
            }else{
                console.log('getUser =>',response.data.message);
                commit('unSetToken');
            }
        }).catch(error =>{
            console.log('getUser Error =>',error);
            commit('unSetToken');
        })
    }
};
const mutations = {
    setUser(state, user){
        state.user = user;
        localStorage.setItem('auth_user', JSON.stringify(user));
    },
    unSetUser(state){
        state.user = {};
        localStorage.removeItem('auth_user');
    },
    setLoginStatus(state){
        state.isLoggedIn = true;
        localStorage.setItem('auth_login_status', true.toString());
    },
    unSetLoginStatus(state){
        state.isLoggedIn = false;
        localStorage.removeItem('auth_login_status');
    },
    setToken(state, token) {
        state.token = token;
        localStorage.setItem('auth_token', token);
    },
    unSetToken(state) {
        state.token = null;
        localStorage.removeItem('auth_token');
    },
    logout(state) {
        state.user = {};
        state.token = null;
        state.isLoggedIn = false;
        localStorage.removeItem('auth_token');
        localStorage.removeItem('auth_user');
        localStorage.removeItem('auth_login_status');
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}

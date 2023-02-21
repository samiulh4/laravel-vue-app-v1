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
                commit('logout');
                alert(response.data.message);
                dispatch('navigateTo', { path: '/sign-in' });
            }).catch(error => {
                console.log('logoutUser [error] =>', error);
                // commit('logout');
                // alert(error.message);
                // dispatch('navigateTo', { path: '/sign-in' });
            });
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
    },
    checkAuthTokenExpiration({state, commit, dispatch}) {
        let token = state.token;
        if (typeof token === 'undefined') {
            commit('logout');
            console.log('Auth Token IS Undefined !');
            return false;
        }
        if (!token) {
            commit('logout');
            console.log('Auth Token Is Null or Empty !');
            return false;
        }
        let base64Url = token.split('.')[1];
        let base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
        let jsonPayload = decodeURIComponent(atob(base64).split('').map(function (c) {
            return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
        }).join(''));
        // let expirationTime = JSON.parse(jsonPayload).exp * 1000;
        // expirationTime = new Date(expirationTime);
        // expirationTime = expirationTime.toLocaleString();
        if(Date.now() < JSON.parse(jsonPayload).exp * 1000){
            console.log('It Is Ok, Auth Token Time Gather Than Current Token Time.');
        }else{
            dispatch('getAuthToken');
            console.log('It Is Not Ok, Auth Token Time Less Than Current Token Time.');
        }
    },
    getAuthToken({commit})
    {
        axiosConfig.get('/api/token-refresh')
            .then(response =>{
                if(response.data.success == true){
                    commit('setToken', response.data.access_token);
                }else {
                    console.log(response.data.message);
                }
            }).catch(error => {
            console.log('getAuthToken [error] =>', error);
        });
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

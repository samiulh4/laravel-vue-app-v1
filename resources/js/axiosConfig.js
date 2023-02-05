import axios from 'axios';

const axiosConfig = axios.create({
    baseURL: 'http://localhost:8000'
});
axiosConfig.interceptors.request.use(
    config => {
        const token = localStorage.getItem('auth_token');
        if (token) {
            config.headers.Authorization = `Bearer ${token}`;
        }
        return config;
    },
    error => Promise.reject(error)
);
export default axiosConfig;

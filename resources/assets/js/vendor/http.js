import NProgress from 'nprogress'

window.axios = require('axios');
window.axios.defaults.headers.common = {
    'X-CSRF-TOKEN': window.Laravel.csrfToken,
    'X-Requested-With': 'XMLHttpRequest'
};
window.axios.defaults.baseURL = '/api/v1/';
// Add a request interceptor
axios.interceptors.request.use(function (config) {
    // Do something before request is sent
    // console.log('发送请求');
    NProgress.start();
    return config;
}, function (error) {
    // Do something with request error
    return Promise.reject(error);
});

// Add a response interceptor
axios.interceptors.response.use(function (response) {
    // Do something with response data
    // console.log('收到回复');
    NProgress.done();
    return response;
}, function (error) {
    // Do something with response error
    NProgress.done();
    return Promise.reject(error);
});

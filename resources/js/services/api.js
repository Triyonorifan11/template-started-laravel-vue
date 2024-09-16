import axios from 'axios';

export default () => {
    const _token = localStorage.getItem('token');
    const instance =  axios.create({
        baseURL: baseUrl,
        headers: {
            Authorization: _token ? 'Bearer ' + _token : ''
        },
    });
    
    return instance;
}

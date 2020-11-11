import axios from 'axios'

const h = document.querySelector('meta[name="app_host"]').content + '/'

let token = document.querySelector('meta[name="token"]').content;

let csrftoken = document.querySelector('meta[name="csrf-token"]').content;

axios.defaults.headers.common = {
    "Authorization": `Bearer ${token}`,
    "Accept": "application/json",
};

export const host = (url)=>{
    return `${h}${url}`
}

export const csrf_token = csrftoken

export const api = (url)=>{
    return host(`api/${url}`)
}
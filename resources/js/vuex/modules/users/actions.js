import axios from "axios"

export default {
    getUsers({ commit }) {
        return axios.get('/api/users')
            .then(response => commit('SET_USERS', response.data))
    }
}

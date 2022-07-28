import axios from "axios"

export default {
    state: {
        userConversation: null,
        messages: []
    },

    mutations: {
        ADD_USER_CONVERSATION(state, user) {
            state.userConversation = user
        },

        REMOVE_USER_CONVERSATION(state) {
            state.userConversation = null
        },

        ADD_MESSAGES(state, messages) {
            state.messages = messages
        },

        ADD_MESSAGE(state, message) {
            state.messages.push(message)
        },

        CLEAR_MESSAGES(state) {
            state.messages = []
        }
    },

    actions: {
        getMessagesConversation({ state, commit }) {
            return axios.get(`/api/messages/${state.userConversation.id}`)
                .then(response => commit('ADD_MESSAGES', response.data.data))
        }
    },

    getters: {

    }
}

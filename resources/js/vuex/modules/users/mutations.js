export default {
    SET_USERS(state, users) {
        state.users = users
    },

    ADD_ONLINE_USERS(state, users) {
        state.onlineUsers = users
    },

    ADD_ONLINE_USER(state, user) {
        state.onlineUsers.push(user)
    },

    REMOVE_ONLINE_USER(state, user) {
        state.onlineUsers = state.onlineUsers.filter(u => {
            return u.email != user.email
        })
    }
}

export default {
    state: {
        user: null
    },
    mutations: {
        setDatauser(state, data){
            state.user = data
        }
    },
    actions: {
        setDatauser(context, data){
            context.commit('setDataUser', data);
            sessionStorage.setItem('user', JSON.stringify(data));
        },
        logout(context){
            context.commit('setDataUser', null);
            sessionStorage.removeItem('user');
        },
        loadStoredState(context){
            const user = sessionStorage.getItem('user');
            if(user){
                context.commit('setDataUser', JSON.parse(user));
            }
        }
    }
}
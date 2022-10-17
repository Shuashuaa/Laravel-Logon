import Vue from 'vue';
import Vuex from 'vuex';
import createPersistedState from 'vuex-persistedstate';

Vue.use(Vuex)
export default new Vuex.Store({
    state:{
        user: null,
        code: null,
        docu: null,
    },
    actions:{}, 
    mutations:{
        setAuthUser(state, user){
            state.user = user;
        },
        setAuthCode(state, code){
            state.code = code;
        },
        setAuthDocu(state, docu){
            state.docu = docu;
        }
    },
    getters:{
        isLoggedIn(state){
            return state.user;
            // return state.user !== null;
        },
        isLoggedInCode(state){
            // return state.document_no;
            return state.code;
            // return state.user !== null;
        },
        documents(state){
            return state.docu;
            return state.docu;
        }
    },
    plugins: [createPersistedState()]
});
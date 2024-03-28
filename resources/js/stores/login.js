import {createStore} from 'vuex'

const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

export default createStore({
  state() {
    return {
      isLoggedIn: false,
      userData: null
    };
  },
  mutations: {
    login(state) {
      state.isLoggedIn = true
    },
    logout(state) {
      state.isLoggedIn = false,
      state.userData = null
    },
    setUserData(state, userData) {
      state.userData = userData
    }
  },
  actions: {
    async login({commit}, {email, password}) {
      try {
        const response = await fetch('http://localhost:8000/login', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
          },
          body: JSON.stringify({email, password})
        })

        if (response.ok) {
          const userData = await response.json()
          
          commit('login')
          commit('setUserData', userData)
          return true
        } else {
          return false
        }
      } catch (err) {
        console.error('Error al iniciar sesion: ', err)
        return false
      }
    },
    logout({commit}) {
      commit('logout')
    }
  },
  getters: {
    isLoggedIn: state => state.isLoggedIn,
    userData: state => state.userData
  }
})
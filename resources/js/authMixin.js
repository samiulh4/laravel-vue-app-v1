import { mapState, mapGetters, mapActions, mapMutations } from 'vuex';

export default {
    computed: {
        ...mapState('currentUser', {
            authUser2: state => {
                console.log('authUser2 computed property:', state.user);
                return state.user;
            },
        }),
        ...mapState('currentUser', {
            authToken2: state => state.token
        }),
        ...mapState('currentUser', {
            authLoggedIn2: state => state.isLoggedIn
        }),
    }
}

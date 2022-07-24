<template>
    <v-app>
        <NavAdminVue />
        <div v-if="users == null">
            <p class="my-16">Silahkan Login Terlebih Dahulu. <router-link :to="{ name: 'login' }">Klik disini untuk login
                </router-link>
            </p>
        </div>
        <div v-else class="my-16">
            <v-content>
                <v-container fluid>
                    <v-layout align-center justify-center>
                        <v-flex xs12 sm8 md4>
                            <v-card>
                                <v-card-title primary-title>
                                    <div>
                                        <v-icon>mdi-login</v-icon>
                                        <span class="headline">Change Password</span>
                                    </div>
                                </v-card-title>
                                <v-card-text>
                                    <v-form ref="form" v-model="valid" lazy-validation>
                                        <v-text-field v-model="form.password" :rules="passwordRules" label="Password"
                                            type="password" prepend-icon="mdi-lock" @keyup.enter="login"></v-text-field>
                                        <v-btn color="primary" class="mt-5" @click="login" :disabled="!valid">
                                            Login
                                        </v-btn>
                                    </v-form>
                                </v-card-text>
                            </v-card>
                        </v-flex>
                    </v-layout>
                </v-container>
            </v-content>
            <v-snackbar v-model="snackbar">
                {{ text }}

                <template v-slot:action="{ attrs }">
                    <v-btn color="pink" text v-bind="attrs" @click="snackbar = false">
                        Close
                    </v-btn>
                </template>
            </v-snackbar>
        </div>
    </v-app>
</template>
<script>
import NavAdminVue from '../components/NavAdmin.vue';
import mix from '../mixins/mix.js';
export default {
    mixins: [mix],
    components: {
        NavAdminVue,
    },
    data() {
        return {
            snackbar: false,
            valid: false,
            text: '',
            form: {
                password: ''
            },
            passwordRules: [
                v => !!v || 'Password is required'
            ],
        };
    },
    methods: {
        async login() {
            this.$refs.form.validate();
            if (this.valid) {
                await axios.post('/api/change-password', this.form).then(response => {
                    if (response.data.success) {
                        this.$store.dispatch('logout');
                        this.$router.push('/login');
                    } else {
                        this.form.password = '';
                        this.text = response.data.message;
                        this.snackbar = true;
                    }
                });
            }
        }
    }
}
</script>
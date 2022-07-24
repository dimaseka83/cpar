<template>
    <div>
        <v-app-bar absolute color="#54595F" elevate-on-scroll scroll-target="#scroll-techniques-7">
            <v-app-bar-nav-icon @click="drawer = true"></v-app-bar-nav-icon>
            <v-toolbar-title>
                <v-img :src="'/images/logo.png'" width="100"></v-img>
            </v-toolbar-title>
            <v-spacer></v-spacer>
            <v-btn icon @click="logout">
                <v-icon>mdi-logout</v-icon>
            </v-btn>
        </v-app-bar>
        <v-navigation-drawer v-model="drawer" absolute temporary>
            <v-list nav dense v-for="(men, i) in menu" :key="'menu' + i">
                <v-list-item active-class="blue--text text--accent-4" @click="menuklik(men.href)">
                    <v-list-item-icon>
                        <v-icon>{{ men.icon }}</v-icon>
                    </v-list-item-icon>
                    <v-list-item-title>{{ men.title }}</v-list-item-title>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>
    </div>
</template>
<script>
    import mix from '../mixins/mix.js';
    export default {
        mixins: [mix],
        data() {
            return {
                drawer: false,
                menu: [{
                        title: 'Home Admin',
                        icon: 'mdi-home',
                        href: '/admin'
                    },
                    {
                        title: 'About Admin',
                        icon: 'mdi-account-circle',
                        href: '/admin/about'
                    },
                    {
                        title: 'Contacts Admin',
                        icon: 'mdi-face-agent',
                        href: '/admin/contacts'
                    },
                    {
                        title: 'Our Offer Admin',
                        icon: 'mdi-history',
                        href: '/admin/our-offer'
                    },
                    {
                        title: 'Our Products Admin',
                        icon: 'mdi-account-box-outline',
                        href: '/admin/our-products'
                    },
                    {
                        title: 'Quality Admin',
                        icon: 'mdi-history',
                        href: '/admin/quality'
                    },
                    {
                        title: 'Laporan Admin',
                        icon: 'mdi-account-box-outline',
                        href: '/admin/laporan'
                    },
                    {
                        title: 'Perusahaan Admin',
                        icon: 'mdi-account-box-outline',
                        href: '/admin/perusahaan'
                    },
                    {
                        title: 'Change Password',
                        icon: 'mdi-lock',
                        href: '/admin/change-password'
                    },
                ]
            }
        },
        methods: {
            menuklik(menu) {
                this.drawer = false;
                this.$router.push({
                    path: menu
                });
            },
            logout() {
                this.$store.dispatch('logout');
                this.$router.push({
                    path: '/login'
                });
            }
        },
    }
</script>
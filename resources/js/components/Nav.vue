<template>
    <div>
        <v-app-bar dense color="#23A455" dark>
            <v-toolbar-title  :class="[ nosm ? 'ml-12' : '']">
                <div v-for="(per, i) in perusahaan" :key="'perusahaan'+i">
                <v-icon>mdi-phone</v-icon>
                <span class="ml-2 body-2 font-weight-light">{{ per.phone }}</span>
                <v-icon class="ml-12" v-show="nosm">mdi-clock-outline</v-icon>
                <span class="ml-2 body-2 font-weight-light" v-show="nosm">{{ per.open_day }} {{ per.open_hour }}</span>
                </div>
            </v-toolbar-title>
        </v-app-bar>
        <v-app-bar color="#54595F" dark >
            <v-app-bar-nav-icon @click="drawer = true" v-show="sm"></v-app-bar-nav-icon>
            <v-toolbar-title class="ml-12">
                <v-img :src="'/images/logo.png'" width="100"></v-img>
            </v-toolbar-title>
            <v-spacer></v-spacer>
            <v-btn text @click="menuklik(men.link)" v-show="nosm" v-for="(men, i) in menu" :key="'men'+i">{{ men.name }}</v-btn>
        </v-app-bar>
        <v-navigation-drawer v-model="drawer" absolute temporary>
            <v-list nav dense v-for="(men, i) in menu" :key="'menu'+ i">
                <v-list-item active-class="blue--text text--accent-4" @click="menuklik(men.link)">
                    <v-list-item-title class="font-weight-regular text-uppercase">{{ men.name }}</v-list-item-title>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>
    </div>
</template>
<script>
import mix from '../mixins/mix.js'
export default {
    mixins: [mix],
    data() {
        return {
            drawer: false,
        }
    },
    methods: {
        menuklik(link) {
            this.drawer = false
            this.$router.push({
                path: link
            })
        }
    },
}
</script>
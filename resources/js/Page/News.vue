<template>
    <v-app>
        <v-container fluid class="fill-height" v-if="loading">
            <v-row align="center" justify="center">
                <v-progress-circular indeterminate color="primary"></v-progress-circular>
            </v-row>
        </v-container>
        <div v-else>
            <Nav />
            <!-- Page 1 -->
            <v-content class="bg-image"
                style="background-image: url(https://agriwell.com/wp-content/uploads/2019/05/brown-field-header.png);">
                <v-container class="fill-height py-16">
                    <div>
                        <h1 class="display-3 white--text text-uppercase">recent news</h1>
                    </div>
                </v-container>
            </v-content>
            <!-- Page 2 -->
            <v-content>
                <v-container>
                    <v-row>
                        <v-col :cols="nosm ? '6' : '12'" v-for="(nw, i) in news" :key="'page_news'+i">
                            <v-card class="mx-auto" color="white">
                                <v-img :src="'./images/home/news/'+nw.image" :height="height - 400"></v-img>
                                <div class="ma-10">
                                    <p class="font-weight-thin title grey--text">{{ nw.date }} | {{ nw.category_news }}
                                    </p>
                                    <p class="text-h4 mt-5">{{ nw.title }}</p>
                                    <p class="title grey--text">{{ nw.subtitle }}</p>
                                </div>
                                <!-- <a class="text-decoration-underline font-weight-bold text-uppercase green--text" href="#">
                            Read More <v-icon color="green">mdi-arrow-right</v-icon>
                        </a> -->
                            </v-card>
                        </v-col>
                    </v-row>
                </v-container>
            </v-content>
            <Footer />
        </div>
    </v-app>
</template>
<script>
    import mix from '../mixins/mix.js'
    import Nav from '../components/Nav.vue'
    import Footer from '../components/Footer.vue'
    export default {
        mixins: [mix],
        components: {
            Nav,
            Footer,
        },
        data() {
            return {
                news: [],
                loading: true,
            }
        },
        methods: {
            async loadData() {
                await axios.get('/api/home/news').then(res => {
                    this.news = res.data
                });
                this.loading = false
            },
        },
        mounted() {
            this.loadData()
        },
    }

</script>
<style>
    .bg-image {
        background-repeat: no-repeat;
        background-position: center center;
        background-attachment: fixed;
        background-size: cover;
    }

</style>

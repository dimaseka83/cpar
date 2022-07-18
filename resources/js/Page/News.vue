<template>
    <v-app>
        <Nav/>
        <!-- Page 1 -->
        <v-content class="bg-image" style="background-image: url(https://agriwell.com/wp-content/uploads/2019/05/brown-field-header.png);">
            <v-container class="fill-height py-16">
                    <div> <h1 class="display-3 white--text text-uppercase">recent news</h1> 
                    </div>
            </v-container>
        </v-content>
        <!-- Page 2 -->
        <v-content>
            <v-container>
                <v-row>
                    <v-col :cols="nosm ? '6' : '12'" v-for="(nw, i) in news" :key="'page_news'+i">
                    <v-card class="mx-auto" color="white">
                        <v-img :src="nw.image" :height="height - 400"></v-img>
                        <div class="ma-10">
                            <p class="font-weight-thin title grey--text">{{ nw.date }} | {{ nw.category_news }}</p>
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
        <Footer/>
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
             news: [{
                number: 1,
                image: "https://agriwell.com/wp-content/uploads/2020/09/sunflower-header-1-1170x238.png",
                date: '2020-09-01',
                category_news: 'News',
                title: 'The latest news from our company',
                subtitle: 'The latest news from our company, as well as all the most interesting world news and trends in organic farming and biodynamics.',
            },{
                number: 2,
                image: "https://agriwell.com/wp-content/uploads/2020/09/sunflower-header-1-1170x238.png",
                date: '2020-09-01',
                category_news: 'News',
                title: 'The latest news from our company',
                subtitle: 'The latest news from our company, as well as all the most interesting world news and trends in organic farming and biodynamics.',
            },{
                number: 3,
                image: "https://agriwell.com/wp-content/uploads/2020/09/sunflower-header-1-1170x238.png",
                date: '2020-09-01',
                category_news: 'News',
                title: 'The latest news from our company',
                subtitle: 'The latest news from our company, as well as all the most interesting world news and trends in organic farming and biodynamics.',
            }]
        }
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
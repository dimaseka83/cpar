<template>
    <v-app>
        <v-container fluid class="fill-height" v-if="loading">
          <v-row align="center" justify="center">
            <v-progress-circular indeterminate color="primary"></v-progress-circular>
          </v-row>
        </v-container>
        <div v-else>
                    <Nav/>
        <!-- Page 1 -->
        <v-carousel :continuous="false" cycle :show-arrows="false" :height="height" hide-delimiter-background delimiter-icon="mdi-minus">
        <v-carousel-item v-for="(p, i) in slides" :key="'car1'+i">
                <v-img :height="height" :src="'./images/home/slides/'+p.image">
                    <v-container v-show="nosm">
                        <v-row>
                            <v-col>
                                <p class="display-1 font-weight-black mt-10 text-uppercase white--text" :class="row(i)">
                                    {{ p.title }}
                                </p>
                                <p class="display-3 text-uppercase white--text" :class="row(i)">
                                    {{ p.subtitle }}
                                </p>
                                <div class="d-flex justify-end" v-if="i % 2 == 1">
                                <v-btn color="white" x-large class="text-uppercase">learn more</v-btn>
                                </div>
                                <v-btn color="white" x-large class="text-uppercase" v-if="i % 2 == 0">learn more</v-btn>
                            </v-col>
                        </v-row>
                    </v-container>
                    <v-container v-show="sm" >
                    <v-row >
                        <v-col md="12">
                            <p class="font-weight-black text-uppercase display-1 text-center white--text">
                                    {{ page2.title }}
                                </p>
                                <p class="body-1 text-uppercase white--text text-center">
                                    {{ page2.subtitle }}
                                </p>
                            <div class="d-flex justify-center">
                                <v-btn color="white" large class="text-uppercase">learn more</v-btn>
                            </div>
                        </v-col>
                    </v-row>
                    </v-container>
                </v-img>
            </v-carousel-item>
        </v-carousel>

        <!-- Page 2 -->
        <v-content style="background-image: url(https://agriwell.com/wp-content/uploads/2019/05/biodynamic-1.png); background-color: #262b2b;">
            <v-container>
            <div class="d-flex justify-center" v-show="nosm">
                <v-card v-for="(img, idx) in images_slides" :key="'imgslide'+idx" class="mx-6 mt-n16" v-show="nosm">
                    <v-img :src="'./images/home/images_slides/'+img.image" max-width="250"></v-img>
                </v-card>
            </div>       
                <v-row v-if="nosm">
                    <v-col cols="4">
                        <p class="font-weight-bold display-4 white--text">{{ page2.title }}</p>
                    </v-col>
                    <v-col cols="2"></v-col>
                    <v-col cols="6">
                        <p class="font-weight-light text-h5 white--text mt-10">{{ page2.subtitle }}</p>
                        <a class="d-flex justify-end text-end" href="#">
                            <div class="text-decoration-underline white--text">
                            Read More <v-icon dark>mdi-arrow-right</v-icon>
                            </div>
                        </a>
                    </v-col>
                </v-row>
                <div v-if="sm">
                        <p class="font-weight-bold text-h3 white--text">{{ page2.title }}</p>
                        <p class="font-weight-light title white--text">{{ page2.subtitle }}</p>
                            <a class="text-decoration-underline white--text" href="#">
                            Read More <v-icon dark>mdi-arrow-right</v-icon>
                            </a>
                </div>
            </v-container>
        </v-content>

        <!-- Page 3 -->
        <v-content>
            <v-container>
                <v-row>
                    <v-col md="6">
                    <div :class="nosm ? 'mr-12' : '' ">
                        <v-img src="https://agriwell.com/wp-content/uploads/2020/05/home-farmers.png" :height="height"></v-img>
                    </div>
                    </v-col>
                    <v-col md="6">
                        <div v-for="(pg, i) in page3" :key="'page3'+i">
                        <p class="display-3">{{ pg.title }}</p>
                        <p class="font-weight-light title">{{ pg.subtitle }}</p>
                        </div>
                        <v-row>
                            <v-col md="6" v-for="(sub, i) in sub_page3" :key="'sub_page3'+i">
                                <v-icon x-large color="green">{{ sub.icon }}</v-icon>
                                <p class="font-weight-regular mt-5" :class="sm ? 'text-h5' : 'display-1'">{{ sub.title }}</p>
                                <p class=" font-weight-thin text--secondary" :class="sm ? '' : 'text-h5'">{{ sub.subtitle }}</p>
                            </v-col>
                        </v-row>
                        <v-btn x-large color="green" class="mt-16" dark>learn more</v-btn>
                    </v-col>
                </v-row>
            </v-container>
        </v-content>
        <!-- Page 3 -->
        <v-content style="background-image: url(https://agriwell.com/wp-content/uploads/2019/05/services2.png); background-color: #262b2b;">
            <v-container>
                <v-row class="my-16">
                    <v-col>
                        <div v-for="(pg, i) in page4" :key="'page4'+i">
                        <p class="display-3 white--text" v-text="pg.title"></p>
                        <p class="font-weight-light white--text title my-16" v-text="pg.subtitle1"></p>
                        <p class="font-weight-light white--text title" v-text="pg.subtitle2"></p>
                        <a class="text-decoration-underline white--text" href="#">
                            Read More <v-icon dark>mdi-arrow-right</v-icon>
                            </a>
                        </div>
                    </v-col>
                    <v-col>
                        <v-row>
                            <v-col md="4" v-for="(sub, i) in services" :key="'sub_page3'+i">
                                <div class="d-flex justify-center">
                                    <v-icon x-large color="green">{{ sub.icon }}</v-icon>
                                </div>
                                <p class="font-weight-regular mt-5 white--text text-center text-h5">{{ sub.title }}</p>
                            </v-col>
                        </v-row>
                    </v-col>
                </v-row>
            </v-container>
        </v-content>
        <!-- Page 4 -->
        <v-content style="background-color: #f4f4f4;">
        <v-container class="py-16">
            <div :class="nosm ? 'd-flex flex-wrap-reverse' : ''" v-if="nosm">
            <v-card class="rounded-circle mt-16 mx-auto transition-swing success" :height="nosm ? '200' : '100'" :width="nosm ? '20%' : '30%'" v-for="(prg, idx) in progress" :key="'prg'+idx" >
                <v-card-title class="white--text justify-center mt-12" :class="nosm ? 'display-3' : 'h5-text pt-8'">
                    <number :from="0" :to="prg.number" :duration="2" easing="Power1.easeOut"/>
                </v-card-title>
            </v-card>
            </div>
            <v-row class="mt-5" v-if="nosm">
                <v-col v-for="(prg, idx) in progress" :key="'prg1'+idx" class="text-center">
                    <p class="font-weight-black text-h5">{{ prg.title }}</p>
                    <p class="font-weight-light">{{ prg.subtitle }}</p>
                </v-col>
            </v-row>
            <v-row v-else>
                <v-col cols="12" v-for="(prg2, idx) in progress" :key="'prg2'+idx" class="text-center">
                    <div class="d-flex justify-center">
                        <v-card class="rounded-circle success" height="100" width="30%">
                        <v-card-title class="white--text justify-center mt-5" :class="nosm ? 'display-3' : 'h5-text '">
                            <number :from="0" :to="prg2.number" :duration="2" easing="Power1.easeOut"/>
                        </v-card-title>
                    </v-card>
                    </div>
                    <p class="font-weight-black text-h5">{{ prg2.title }}</p>
                    <p class="font-weight-light">{{ prg2.subtitle }}</p>
                </v-col>
            </v-row>
        </v-container>
        </v-content>
        <!-- Page 5 -->
        <v-content>
            <v-container>
                <v-row class="my-16">
                    <v-col>
                        <div v-for="(pg, i) in page5" :key="'page5'+i">
                            <p class="display-3">{{ pg.title }}</p>
                            <p class="font-weight-light title">{{ pg.subtitle }}</p>
                        </div>
                            <v-row>
                                <v-col cols="12" v-for="(sub, i) in sub_page5" :key="'sub_page5'+i">
                                    <v-row>
                                    <v-col md="2" v-if="nosm">
                                    <v-icon x-large color="green">{{ sub.icon }}</v-icon>
                                    </v-col>
                                    <v-col>
                                        <v-icon x-large color="green" v-if="sm">{{ sub.icon }}</v-icon>
                                        <p class="font-weight-regular" :class="sm ? 'text-h5' : 'display-1'">{{ sub.title }}</p>
                                        <p class=" font-weight-thin text--secondary" :class="sm ? '' : 'text-h5'">{{ sub.subtitle }}</p>
                                    </v-col>
                                    </v-row>
                                </v-col>
                            </v-row>
                    </v-col>
                    <v-col class="pr-5">
                        <v-img src="https://agriwell.com/wp-content/uploads/2020/05/home-earth.png" :height="height"></v-img>
                    </v-col>
                </v-row>
            </v-container>
        </v-content>
        <!-- Page 6 -->
        <v-content style="background-image: url(https://agriwell.com/wp-content/uploads/2019/05/people-say.png); background-color: #262b2b;">
            <v-container class="mb-16">
                <p v-for="(pg, i) in page6" :key="i" v-text="pg.title" class="display-3 white--text mt-16 text-center"></p>
                <v-carousel :continuous="false" hide-delimiter-background delimiter-icon="mdi-minus">
                    <v-carousel-item v-for="(sub, i) in sub_page6" :key="'sub_page6'+i">
                        <v-sheet :height="height" color="transparent" class="text-center white--text">
                        <v-row class="fill-height" align="center" justify="center">
                           <v-avatar size="200" :class="nosm ? '' : 'my-5' ">
                                <img :src="sub.image" :height="height" />
                           </v-avatar>
                           <span :class="nosm ? 'mt-n16 mx-16 title' : '' ">{{ sub.title }}</span>
                           <p :class="nosm ? 'mt-n16 pt-n16' : 'mt-16' "><span class="font-weight-bold text-h5">{{ sub.people_name }}</span> <br> {{ sub.people_position }}</p>
                        </v-row>
                        </v-sheet>
                    </v-carousel-item>
                </v-carousel>
            </v-container>
        </v-content>
        <!-- Page 7 -->
        <v-content>
            <v-container>
                <v-row class="my-16" v-if="nosm">
                    <v-col cols="4">
                        <p class="display-3" v-for="(disp, i) in page7" :key="'page7'+ i" v-text="disp.title"></p>
                        <div v-for="(latest, i) in news_latest" :key="'page7_1'+ i">
                            <v-img :src="latest.image" :height="height - 300"></v-img>
                            <p class="font-weight-black text-h4 mt-5">{{ latest.title }}</p>
                            <p class="font-weight-thin title">{{ latest.date }} | {{ latest.category_news }}</p>
                            <p class="subtitle">{{ latest.subtitle }}</p>
                            <a class="text-decoration-underline font-weight-bold text-uppercase green--text" href="#">
                                Read More <v-icon color="green">mdi-arrow-right</v-icon>
                            </a>
                        </div>
                    </v-col>
                    <v-col cols="8">
                        <p class="font-weight-light title" v-for="(disp, i) in page7" :key="'page7'+ i" v-text="disp.subtitle"></p>
                        <v-row >
                            <v-col cols="6" v-for="(disp, i) in news_latest_2" :key="'page7_2'+i">
                                <div v-if="disp.number != 1">
                                <v-img :src="disp.image" :height="height - 400"></v-img>
                                <p class="font-weight-black text-h4 mt-5">{{ disp.title }}</p>
                                <p class="font-weight-thin title">{{ disp.date }} | {{ disp.category_news }}</p>
                                <p class="subtitle">{{ disp.subtitle }}</p>
                                <a class="text-decoration-underline font-weight-bold text-uppercase green--text" href="#">
                                    Read More <v-icon color="green">mdi-arrow-right</v-icon>
                                </a>
                                </div>
                            </v-col>
                        </v-row>
                    </v-col>
                </v-row>
                <v-row class="my-16" v-if="sm">
                    <v-col cols="12">
                        <div v-for="(disp, i) in page7" :key="'page7-1'+ i">
                        <p class="display-3" v-text="disp.title"></p>
                        <p class="font-weight-light title" v-text="disp.subtitle"></p>
                    </div>
                    </v-col>
                    <v-col cols="12" v-for="(nw, i) in news" :key="'page7-2'+i">
                        <v-img :src="nw.image" :height="height"></v-img>
                        <p class="font-weight-black text-h4 mt-5">{{ nw.title }}</p>
                        <p class="font-weight-thin title">{{ nw.date }} | {{ nw.category_news }}</p>
                        <p class="subtitle">{{ nw.subtitle }}</p>
                        <!-- <a class="text-decoration-underline font-weight-bold text-uppercase green--text" href="#">
                            Read More <v-icon color="green">mdi-arrow-right</v-icon>
                        </a> -->
                    </v-col>
                </v-row>
            </v-container>
        </v-content>
        <Footer/>
        </div>
    </v-app>
</template>
<script>
import Nav from '../components/Nav.vue'
import Footer from '../components/Footer.vue'
import mix from '../mixins/mix.js'
import Number from '../../../node_modules/vue-number-animation/Number.vue'
export default {
    mixins: [mix],
    components: {
    Nav,
    Footer,
    Number
},
    data(){
        return {
            loading: true,
            slides: [],
            images_slides: [],
            page2: '',
            page3: [],
            sub_page3: [],
            page4: [],
            services: [],
            progress: [],
            page5: [],
            sub_page5: [],
            page6: [],
            sub_page6: [],
            page7: [],
            news: []
        }
    },
    methods: {
        async loadData(){
            try {
                this.loading = true
                await axios.get('/api/home/slides').then(res => {
                    this.slides = res.data
                })
                await axios.get('/api/home/images_slides').then(res => {
                    this.images_slides = res.data
                })
                await axios.get('/api/home/page2').then(res => {
                    this.page2 = res.data
                })
                await axios.get('/api/home/page3').then(res => {
                    this.page3 = res.data
                })
                await axios.get('/api/home/sub_page3').then(res => {
                    this.sub_page3 = res.data
                })
                await axios.get('/api/home/page4').then(res => {
                    this.page4 = res.data
                })
                await axios.get('/api/home/services').then(res => {
                    this.services = res.data
                })
                await axios.get('/api/home/progress').then(res => {
                    this.progress = res.data
                })
                await axios.get('/api/home/page5').then(res => {
                    this.page5 = res.data
                })
                await axios.get('/api/home/sub_page5').then(res => {
                    this.sub_page5 = res.data
                })
                await axios.get('/api/home/page6').then(res => {
                    this.page6 = res.data
                })
                await axios.get('/api/home/sub_page6').then(res => {
                    this.sub_page6 = res.data
                })
                await axios.get('/api/home/page7').then(res => {
                    this.page7 = res.data
                })
                await axios.get('/api/home/news').then(res => {
                    this.news = res.data
                })
                this.loading = false
            } catch (error) {
                console.log(error)
            }
        },
        row(i){
            if(i % 2 == 1){
                return 'text-end'
            }
        }
    },
    mounted(){
        this.loadData()
    },
    computed: {
        news_latest(){
            if (this.news.length > 0) {
                return this.news.filter(item => item.number == 1)
            }
        },
        news_latest_2(){
            if (this.news.length > 0) {
                return this.news.filter(item => item.number != 1)
            }
        }
    }
}
</script>
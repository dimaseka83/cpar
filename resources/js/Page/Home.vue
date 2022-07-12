<template>
    <v-app>
        <Nav/>
        <!-- Page 1 -->
        <v-carousel :continuous="false" cycle :show-arrows="false" :height="height" hide-delimiter-background delimiter-icon="mdi-minus">
        <v-carousel-item v-for="(p, i) in slides" :key="'car1'+i">
                <v-img :height="height" :src="p.image">
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
                                    {{ p.title }}
                                </p>
                                <p class="body-1 text-uppercase white--text text-center">
                                    {{ p.subtitle }}
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
        <v-content style="background-image: url(https://agriwell.com/wp-content/uploads/2019/05/biodynamic-1.png); background-color: #262b2b;;">
            <v-container>
            <div class="d-flex justify-center" v-show="nosm">
                <v-card v-for="(img, idx) in images_slides" :key="'imgslide'+idx" class="mx-6 mt-n16" v-show="nosm">
                    <v-img :src="img.image" max-width="250"></v-img>
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
                        <p class="font-weight-black display-4">{{ pg.title }}</p>
                        <p class="font-weight-light title">{{ pg.subtitle }}</p>
                        </div>
                        <v-row>
                            <v-col md="6" v-for="(sub, i) in sub_page3" :key="'sub_page3'+i">
                                <v-icon x-large color="green">{{ sub.icon }}</v-icon>
                                <p class="font-weight-regular mt-5" :class="sm ? 'text-h5' : 'display-1'">{{ sub.title }}</p>
                                <p class=" font-weight-thin text--secondary" :class="sm ? '' : 'text-h5'">{{ sub.subtitle }}</p>
                            </v-col>
                        </v-row>
                    </v-col>
                </v-row>
            </v-container>
        </v-content>
    </v-app>
</template>
<script>
import Nav from '../components/Nav.vue'
import mix from '../mixins/mix.js'
export default {
    mixins: [mix],
    components: {
        Nav
    },
    data(){
        return {
            slides: [{
                image: 'https://images.unsplash.com/photo-1466692476868-aef1dfb1e735?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80',
                title: 'new corp 2021',
                subtitle: 'stay tuned for our organic crop 2021 growth online'
            },
            {
                image: 'https://images.unsplash.com/photo-1466692476868-aef1dfb1e735?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80',
                title: 'new corp 2021',
                subtitle: 'stay tuned for our organic crop 2021 growth online'
            },
            {
                image: 'https://images.unsplash.com/photo-1466692476868-aef1dfb1e735?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80',
                title: 'new corp 2021',
                subtitle: 'stay tuned for our organic crop 2021 growth online'
            }
            ],
            images_slides: [{
                image: 'https://images.unsplash.com/photo-1601995163168-0894a017d6d1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80'
            },
            {
                image: 'https://images.unsplash.com/photo-1601995163168-0894a017d6d1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80'
            },
            {
                image: 'https://images.unsplash.com/photo-1601995163168-0894a017d6d1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80'
            }],
            page2: {
                title: 'European expert in organic agriculture',
                subtitle: 'We are a global exporter of top-quality oilseeds, pulses, and grains for human consumption, oil extraction, or animal feed. We specialise in organic agriculture. The core of our offer consists of organic flax seeds in the range of 98–99.99% purity, as well as poppy, mustard, caraway, and other oilseeds. Since 2015 our offer has included dried fruit such as apricots, mulberries, rose hips, and raisins. Most of our goods originate from the Czech Republic, Eastern Europe, and Central Asia.'
            },
            page3: [{
                image: 'https://agriwell.com/wp-content/uploads/2020/05/home-farmers.png',
                title: 'Our Core Approach',
                subtitle: 'We help farmers switch from conventional farming to organic farming.'
            }],
            sub_page3: [{
                icon: 'mdi-hat-fedora',
                title: 'Organic Consulting',
                subtitle: 'We help farmers switch from conventional farming to organic farming.'
            },{
                icon: 'mdi-hat-fedora',
                title: 'Organic Consulting',
                subtitle: 'We help farmers switch from conventional farming to organic farming.'
            },{
                icon: 'mdi-hat-fedora',
                title: 'Organic Consulting',
                subtitle: 'We help farmers switch from conventional farming to organic farming.'
            },{
                icon: 'mdi-hat-fedora',
                title: 'Organic Consulting',
                subtitle: 'We help farmers switch from conventional farming to organic farming.'
            }]
        }
    },
    methods: {
        row(i){
            if(i % 2 == 1){
                return 'text-end'
            }
        }
    }
}
</script>
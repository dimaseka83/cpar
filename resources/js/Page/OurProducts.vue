<template>
    <v-app>
        <Nav/>
                <!-- Page 1 -->
        <v-content class="bg-image" style="background-image: url(https://agriwell.com/wp-content/uploads/2019/05/services-header.png);">
            <v-container class="fill-height py-16">
                <v-row class="justify-center">
                    <div> <h1 class="display-3 white--text text-center">OUR PRODUCTS</h1> 
                    <div class="d-flex justify-center">
                        <v-breadcrumbs :items="items">
                        <template v-slot:divider>
                            <v-icon>mdi-circle-small</v-icon>
                        </template>
                    </v-breadcrumbs>
                    </div>
                    </div>
                </v-row>
            </v-container>
        </v-content>
        <!-- Page 2 -->
        <v-content>
            <v-container class="my-16">
                <v-row class="justify-center">
                    <v-col cols="12">
                        <div :class="nosm ? 'd-flex justify-center' : ''">
                        <v-btn text @click="selectCategory(cat.name_cat)" v-for="(cat, i) in category" :key="'cat'+i">{{ cat.name_cat }}</v-btn>
                        </div>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col :cols="nosm ? '4' : '12'" v-for="(it, i) in productSelect" :key="'prdSelect'+i">
                        <v-hover v-slot="{hover}">
                        <v-card >
                            <v-img :height="height-300" :src="it.img_prod" class="white--text align-end" gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)">
                                <v-card-text>
                                    <p class="font-weight-bold text-h5 white--text">{{ it.name_prod }}</p>
                                    <p class="font-weight-light subtitle white--text">{{ it.category }}</p>
                                    <v-expand-transition>
                                    <p v-if="hover" class="font-weight-regular subtitle white--text">{{ it.desc_prod }}</p>
                                    </v-expand-transition>
                                </v-card-text>
                            </v-img>
                        </v-card>
                        </v-hover>
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
        Footer
    },
    data() {
        return {
            items: [
                {
                text: 'Home',
                disabled: false,
                href: '/home',
                },
                {
                text: 'Our Products',
                disabled: true,
                href: '/about',
                },
            ],
            category_select: 'all',
            category: [{
                name_cat: 'all',
            },{
                name_cat: 'agriculture',
            },{
                name_cat: 'fishery',
            },{
                name_cat: 'livestock',
            },{
                name_cat: 'poultry',
            },{
                name_cat: 'veterinary',
            }],
            products:[{
                name_prod: 'Yellow Flax1',
                img_prod: 'https://agriwell.com/wp-content/uploads/2019/07/flax-yellow-thumb-540x540.png',
                desc_prod: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                category: 'agriculture',
            },
            {
                name_prod: 'Yellow Flax2',
                img_prod: 'https://agriwell.com/wp-content/uploads/2019/07/flax-yellow-thumb-540x540.png',
                desc_prod: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                category: 'agriculture',
            },
            {
                name_prod: 'Yellow Flax3',
                img_prod: 'https://agriwell.com/wp-content/uploads/2019/07/flax-yellow-thumb-540x540.png',
                desc_prod: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                category: 'fishery',
            },
            {
                name_prod: 'Yellow Flax4',
                img_prod: 'https://agriwell.com/wp-content/uploads/2019/07/flax-yellow-thumb-540x540.png',
                desc_prod: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                category: 'fishery',
            },
            {
                name_prod: 'Yellow Flax5',
                img_prod: 'https://agriwell.com/wp-content/uploads/2019/07/flax-yellow-thumb-540x540.png',
                desc_prod: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                category: 'livestock',
            },
            {
                name_prod: 'Yellow Flax6',
                img_prod: 'https://agriwell.com/wp-content/uploads/2019/07/flax-yellow-thumb-540x540.png',
                desc_prod: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                category: 'livestock',
            },
            {
                name_prod: 'Yellow Flax7',
                img_prod: 'https://agriwell.com/wp-content/uploads/2019/07/flax-yellow-thumb-540x540.png',
                desc_prod: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                category: 'poultry',
            },
            {
                name_prod: 'Yellow Flax8',
                img_prod: 'https://agriwell.com/wp-content/uploads/2019/07/flax-yellow-thumb-540x540.png',
                desc_prod: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                category: 'poultry',
            },
            {
                name_prod: 'Yellow Flax9',
                img_prod: 'https://agriwell.com/wp-content/uploads/2019/07/flax-yellow-thumb-540x540.png',
                desc_prod: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                category: 'veterinary',
            },
            {
                name_prod: 'Yellow Flax10',
                img_prod: 'https://agriwell.com/wp-content/uploads/2019/07/flax-yellow-thumb-540x540.png',
                desc_prod: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                category: 'veterinary',
            }]
        }
    },
    methods: {
        selectCategory(category) {
            this.category_select = category;
        }
    },
    computed: {
        productSelect() {
            if (this.category_select == "all") {
                return this.products
            } else {
                return this.products.filter(product => product.category === this.category_select)
            }
        }
    }
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

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
                            <v-img :height="height-300" :src="'./images/ourproducts/products/'+it.img_prod" class="white--text align-end" gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)">
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
            category: [],
            products:[]
        }
    },
    methods: {
        async loadData() {
            await axios.get('/api/ourproducts/getDataProducts').then(res => {
                this.products = res.data
            })

            await axios.get('/api/ourproducts/getDataCategory').then(res => {
                this.category = res.data
            })
        },
        selectCategory(category) {
            this.category_select = category;
        }
    },
    mounted() {
        this.loadData();
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

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
        <v-content class="bg-image" style="background-image: url(https://agriwell.com/wp-content/uploads/2019/05/brown-field-header.png);">
            <v-container class="fill-height py-16">
                <v-row class="justify-center">
                    <div> <h1 class="display-3 white--text text-center">QUALITY ASSURANCE</h1> 
                    <div class="d-flex justify-center">
                        <v-breadcrumbs :items="items" dark>
                        <template v-slot:divider>
                            <v-icon>mdi-circle-small</v-icon>
                        </template>
                    </v-breadcrumbs>
                    </div>
                    </div>
                </v-row>
            </v-container>
        </v-content>
        <!-- Page 1 -->
        <v-content style="background-color: #323232;">
            <v-container class="my-16">
                <v-row>
                    <v-col :cols="nosm ? '6' : '12'">
                        <div align="center">
                            <v-img width="200" v-for="(img_par, i) in partner_logo" :key="'img_par'+i" :src="'./images/quality/partner_logo/'+img_par.image" class="mb-16"></v-img>
                        </div>
                    </v-col>
                    <v-col :cols="nosm ? '6' : '12'">
                    <div v-for="(ors, i) in our_social" :key="'our_social'+i">
                        <p class="title white--text">{{ ors.title }}</p>
                        <p  class="subtitle grey--text">{{ ors.subtitle }}</p>
                    </div>
                    </v-col>
                </v-row>
            </v-container>
        </v-content>
        <!-- Page 2 -->
        <v-content>
            <v-container class="my-16">
                <div align="center" v-for="(orc, i) in ourcertifications" :key="'ourcertifications'+i">
                    <p class="display-1 text-uppercase">{{ orc.title }}</p> 
                    <p class="title font-weight-light grey--text">{{ orc.subtitle }}</p>
                </div>
                <v-row>
                    <v-col :cols="nosm ? '4' : '12'" v-for="(cr, i) in certification_logo" :key="'certification_logo'+i">
                        <div class="d-flex justify-center">
                            <v-img max-width="300" :src="'./images/quality/certification_logo/'+cr.image"></v-img>
                        </div>
                    </v-col>
                </v-row>
            </v-container>
        </v-content>
        <!-- Page 3 -->
        <v-content style="background-color: #323232;">
            <v-container class="my-16 white--text text-center">
                <v-row>
                    <v-col :cols="nosm ? '3' : '12'" v-for="(cr, i) in certification" :key="'certification'+i">
                        <div class="d-flex justify-center">
                            <v-img max-width="200" :src="'./images/quality/certification/'+cr.image"></v-img>
                        </div>
                        <p class="font-weight-bold mt-10">{{ cr.title }}</p>
                        <p class="title grey--text mt-5">{{ cr.subtitle }}</p>
                    </v-col>
                </v-row>
            </v-container>
        </v-content>
        <!-- Page 4 -->
        <v-content>
            <v-container class="my-16">
                <div align="center" v-for="(str, i) in strictpage" :key="'strictpage'+i">
                    <p class="display-1 text-uppercase">{{ str.title }}</p> 
                    <p class="title font-weight-light grey--text">{{ str.subtitle }}</p>
                </div>
                <v-row>
                    <v-col :cols="nosm ? '3' : '12'" v-for="(cr, i) in strict_logo" :key="'certification_logo'+i">
                        <div class="d-flex justify-center">
                            <v-img max-width="300" :src="cr.image"></v-img>
                        </div>
                    </v-col>
                </v-row>
            </v-container>
        </v-content>
        <!-- Page 5 -->
        <v-content style="background-color: #CFD8DC;">
            <v-container class="my-16">
                <v-row>
                    <v-col cols="4">
                        <v-card class="text-center" width="400" v-for="(hdqc, i) in headqc" :key="'headqc'+i">
                    <v-img :src="'./images/quality/headqc/'+hdqc.image"></v-img>
                    <v-card-text >
                        <p class="title font-weight-bold ">{{ hdqc.name }}</p>
                        <p class="subtitle">{{ hdqc.title }}</p>
                    </v-card-text>
                </v-card>
                    </v-col>
                    <v-col>
                        <div v-for="(hdem, i) in heademail" :key="'heademail'+i">
                        <p class="text-h5" v-text="hdem.title"></p>
                        <p class="grey--text" v-text="hdem.subtitle"></p>
                        </div>
                        <v-row>
                            <v-col><v-text-field required label="Nama"></v-text-field></v-col>
                            <v-col><v-text-field required label="Email"></v-text-field></v-col>
                        </v-row>
                        <v-row>
                            <v-col><v-textarea required><template v-slot:label>Pesan<div></div></template></v-textarea></v-col>
                        </v-row>
                        <v-btn x-large color="success" dark>send message</v-btn>
                    </v-col>
                </v-row>
            </v-container>
        </v-content>
        <Footer/>
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
        Footer
    },
     data() {
        return {
            loading: true,
            items: [
                {
                text: 'Home',
                disabled: false,
                href: '/home',
                },
                {
                text: 'QUALITY ASSURANCE',
                disabled: true,
                href: '/quality',
                },
            ],
            partner_logo: [],
            our_social:[],
            ourcertifications: [],
            certification_logo: [],
            certification: [],
            strictpage: [],
            strict_logo: [],
            headqc:[],
            heademail: []
        }
    },
    methods: {
        async loadData(){
            await axios.get('/api/quality/partner_logo').then(res => {
                this.partner_logo = res.data
            })

            await axios.get('/api/quality/our_social').then(res => {
                this.our_social = res.data
            })

            await axios.get('/api/quality/ourcertifications').then(res => {
                this.ourcertifications = res.data
            })

            await axios.get('/api/quality/certification_logo').then(res => {
                this.certification_logo = res.data
            })

            await axios.get('/api/quality/certification').then(res => {
                this.certification = res.data
            })

            await axios.get('/api/quality/strictpage').then(res => {
                this.strictpage = res.data
            })

            await axios.get('/api/quality/strict_logo').then(res => {
                this.strict_logo = res.data
            })

            await axios.get('/api/quality/headqc').then(res => {
                this.headqc = res.data
            })

            await axios.get('/api/quality/heademail').then(res => {
                this.heademail = res.data
            })

            this.loading = false
        }
    },

    mounted() {
        this.loadData()
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
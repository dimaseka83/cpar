<template>
    <v-app>
        <Nav/>
        <!-- Page 1 -->
        <v-content class="bg-image" style="background-image: url(https://agriwell.com/wp-content/uploads/2019/05/sunflower3-header.png);">
            <v-container class="fill-height py-16">
                <v-row class="justify-center">
                    <div> <h1 class="display-3 white--text">CONTACTS</h1> 
                    <div class="d-flex justify-center" >
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
        <!-- Page 2 -->
        <v-content style="background-color: #ECEFF1;">
            <v-container class="my-16">
                <v-row>
                    <v-col :cols="nosm ? '4' : '12' ">
                    <v-row>
                        <v-col cols="2"><v-icon color="green" x-large>mdi-map-marker-outline</v-icon></v-col>
                        <v-col>
                            <v-row>
                                <v-col>
                                    <p class="display-1 black--text">{{ officeinf.title }}</p>
                                <p class="title mt-5">{{ officeinf.title_addr }} :</p>
                                <div class="mr-16 pr-16 grey--text">
                                <span class="title">{{ officeinf.office_name }}</span>
                                <span class="title">{{ officeinf.addr }}</span>
                                </div>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col>
                                    <p class="title black--text">{{ officeinf.phone_title }} :</p>
                                    <p class="grey--text" v-for="(ph, i) in phone" :key="''+i">{{ ph.number }} - {{ ph.title }}</p>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col>
                                    <p class="title black--text">Email :</p>
                                    <p class="grey--text">{{ contact[1].text }}</p>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col>
                                    <p class="title black--text">Opening Hours :</p>
                                    <p class="grey--text">{{ contact[3].text }}</p>
                                </v-col>
                            </v-row>
                        </v-col>
                    </v-row>
                    </v-col>
                    <v-col :cols="nosm ? '4' : '12' ">
                    <v-row>
                        <v-col cols="2"><v-icon color="green" x-large>mdi-map-marker-outline</v-icon></v-col>
                        <v-col>
                            <v-row>
                                <v-col>
                                <p class="display-1 black--text">{{ companyinf.title }}</p>
                                <p class="title mt-5">{{ companyinf.title_reg }} :</p>
                                <div class="mr-16 pr-16 grey--text">
                                <span class="title">{{ registration }}</span>
                                </div>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col>
                                    <p class="title mt-5">{{ companyinf.title_vat }} :</p>
                                    <p class="title grey--text" v-for="(vt, i) in vat" :key="'vat'+ i">{{ vt.text }} {{ vt.title }}</p>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col>
                                    <p class="title mt-5">{{ companyinf.title_databox }} :</p>
                                    <p class="title grey--text">{{ databox }}</p>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col>
                                    <p class="title mt-5">{{ companyinf.title_additional }} :</p>
                                    <p class="title grey--text">{{ additional }}</p>
                                </v-col>
                            </v-row>
                        </v-col>
                    </v-row>
                    </v-col>
                    <v-col :cols="nosm ? '4' : '12' ">
                    <v-row>
                        <v-col cols="2"><v-icon color="green" x-large>mdi-map-marker-outline</v-icon></v-col>
                        <v-col>
                            <v-row>
                                <v-col>
                                <p class="display-1 black--text">{{ billinginf.title }}</p>
                                <p class="title mt-5">{{ billinginf.title_bank }} :</p>
                                <p class="title grey--text">{{ name_bank }}</p>
                                </v-col>
                            </v-row>
                        </v-col>
                    </v-row>
                    </v-col>
                </v-row>
                <v-card>
                    <div class="mx-16 pt-16">
                    <v-card-title class="display-3">{{ contact_title.title }}</v-card-title>
                    <v-card-text class="title grey--text pt-5">{{ contact_title.text }}</v-card-text>
                    <v-card-text class="pt-5">
                        <v-row>
                            <v-col><v-text-field required label="Nama"></v-text-field></v-col>
                            <v-col><v-text-field required label="Email"></v-text-field></v-col>
                        </v-row>
                        <v-row>
                            <v-col><v-textarea required><template v-slot:label>Pesan<div></div></template></v-textarea></v-col>
                        </v-row>
                        <v-btn x-large color="success" dark>send message</v-btn>
                    </v-card-text>
                    </div>
                </v-card>
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
            loading: true,
            items: [
                 {
                text: 'Home',
                disabled: false,
                href: '/home',
                },
                {
                text: 'Contacts',
                disabled: true,
                href: '/contacts',
                },
            ],
            officeinf: [],
            companyinf: [],
            billinginf: [],
            registration: [],
            vat: [],
            databox: [],
            additional: [],
            phone: [],
            name_bank: [],
            contact_title: [],
        }
    },
    methods: {
        async loadData(){
            await axios.get('/api/contacts/officeinf', function(response){
                this.officeinf = response.data;
            });

            await axios.get('/api/contacts/companyinf', function(response){
                this.companyinf = response.data;
            });

            await axios.get('/api/contacts/billinginf', function(response){
                this.billinginf = response.data;
            });

            await axios.get('/api/contacts/registration', function(response){
                this.registration = response.data;
            });

            await axios.get('/api/contacts/vat', function(response){
                this.vat = response.data;
            });

            await axios.get('/api/contacts/databox', function(response){
                this.databox = response.data;
            });

            await axios.get('/api/contacts/additional', function(response){
                this.additional = response.data;
            });

            await axios.get('/api/contacts/phone', function(response){
                this.phone = response.data;
            });

            await axios.get('/api/contacts/name_bank', function(response){
                this.name_bank = response.data;
            });

            await axios.get('/api/contacts/contact_title', function(response){
                this.contact_title = response.data;
            });

            this.loading = false;
        }
    },

    mounted() {
        this.loadData();
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

    .map{
        -webkit-filter: grayscale(100%);
        -moz-filter: grayscale(100%);
        -ms-filter: grayscale(100%);
        -o-filter: grayscale(100%);
         filter: grayscale(100%);
    }

</style>
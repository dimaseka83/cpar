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
                <v-card class="mb-n16">
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
        <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1041738.169561381!2d111.95913372497157!3d-7.742517963791048!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbc5a8e9e93f%3A0xd850492b876179fd!2sMaxima%20Flora%20(d%2Fh%20WKF%20Surabaya)!5e0!3m2!1sen!2sid!4v1658119160141!5m2!1sen!2sid" width="100%" :height="height" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
            officeinf: {
                title: 'Prague Office',
                title_addr: 'Address',
                office_name: 'AGRIWELL s.r.o',
                addr: 'Plzeňská 3351/19, 150 00 Prague, Czech Republic',
                phone_title: 'Phone'
            },
            companyinf: {
                title: 'Company Info',
                title_reg: 'Registration Number',
                title_vat: 'VAT Number',
                title_databox: 'Data Box ID',
                title_additional: 'Additional Info',
            },
            billinginf: {
                title: 'Billing Info',
                title_bank : 'Bank',
            },
            registration: 'CZ0990099',
            vat: [{
                title: '(CzechRepublic)',
                text: 'CZ0990099',
            },{
                title: '(Poland)',
                text: 'PL5263189150',
            }],
            databox: 'kp2jtnj',
            additional: 'AGRIWELL s.r.o. is registered on 17.4.2009 in the Commercial Register with the Municipal Court in Prague, section C, insert 150860.',
            phone: [{
                number: '+420 774 774 774',
                title: 'Quality',
            },{
                number: '+420 774 774 774',
                title: 'Purchase',
            },{
                number: '+420 774 774 774',
                title: 'Sales',
            },{
                number: '+420 774 774 774',
                title: 'Logistics',
            }],
            name_bank: 'Československá obchodní banka, a.s. Radlická 333/150, 150 57 Prague, Czech Republic',
            contact_title: {
                title : 'Contact Us',
                text: 'We respect your privacy and do not to tolerate spam. Therefore we will never sell, rent, lease, or give away your information. We will use your contact information only to contact you. The information will not be used for other purposes. For more information, review our privacy policy.',
            },
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

    .map{
        -webkit-filter: grayscale(100%);
        -moz-filter: grayscale(100%);
        -ms-filter: grayscale(100%);
        -o-filter: grayscale(100%);
         filter: grayscale(100%);
    }

</style>
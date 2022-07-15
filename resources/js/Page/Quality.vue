<template>
    <v-app>
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
                            <v-img width="200" v-for="(img_par, i) in partner_logo" :key="'img_par'+i" :src="img_par.image" class="mb-16"></v-img>
                        </div>
                    </v-col>
                    <v-col :cols="nosm ? '6' : '12'">
                        <p class="title white--text">{{ our_social.title }}</p>
                        <p  class="subtitle grey--text">{{ our_social.subtitle }}</p>
                    </v-col>
                </v-row>
            </v-container>
        </v-content>
        <!-- Page 2 -->
        <v-content>
            <v-container class="my-16">
                <div align="center">
                    <p class="display-1 text-uppercase">{{ ourcertifications.title }}</p> 
                    <p class="title font-weight-light grey--text">{{ ourcertifications.subtitle }}</p>
                </div>
                <v-row>
                    <v-col :cols="nosm ? '4' : '12'" v-for="(cr, i) in certification_logo" :key="'certification_logo'+i">
                        <div class="d-flex justify-center">
                            <v-img max-width="300" :src="cr.image"></v-img>
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
                            <v-img max-width="200" :src="cr.image"></v-img>
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
                <div align="center">
                    <p class="display-1 text-uppercase">{{ strictpage.title }}</p> 
                    <p class="title font-weight-light grey--text">{{ strictpage.subtitle }}</p>
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
                        <v-card class="text-center" width="400">
                    <v-img :src="headqc.image"></v-img>
                    <v-card-text >
                        <p class="title font-weight-bold ">{{ headqc.name }}</p>
                        <p class="subtitle">{{ headqc.title }}</p>
                    </v-card-text>
                </v-card>
                    </v-col>
                    <v-col>
                        <p class="text-h5" v-text="heademail.title"></p>
                        <p class="grey--text" v-text="heademail.subtitle"></p>
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
                text: 'QUALITY ASSURANCE',
                disabled: true,
                href: '/quality',
                },
            ],
            partner_logo: [{
                image: 'https://agriwell.com/wp-content/uploads/2019/10/SMETA-Ver6.0-300x300-150x150.png'
            },{
                image: 'https://agriwell.com/wp-content/uploads/2019/10/SMETA-Ver6.0-300x300-150x150.png'
            }],
            our_social:{
                title: 'OUR SOCIAL & ETHICAL RESPONSIBILITY',
                subtitle: 'Our company complies with the four pillars of SMETA 6.0. Our audits encompass all the aspects of responsible business practices created by the Sedex Stakeholder Forum. SMETA (Sedex Members Ethical Trade Report) is an audit procedure that is a compilation of good practice in ethical audit techniques. It provides a globally-recognised way to assess responsible supply chain activities and is based on four pillars. Sedex (the Supplier Ethical Data Exchange) is a not-for-profit membership organisation that leads work with buyers and suppliers to deliver improvements in responsible and ethical business practices in global supply chains.'
            },
            ourcertifications: {
                title: 'OUR ORGANIC CERTIFICATIONS',
                subtitle: 'We are certified by the following bodies:'
            },
            certification_logo: [{
                image: 'https://agriwell.com/wp-content/uploads/2019/09/abcert.png'
            },{
                image: 'https://agriwell.com/wp-content/uploads/2019/09/abcert.png'
            },{
                image: 'https://agriwell.com/wp-content/uploads/2019/09/abcert.png'
            }],
            certification: [{
                image: 'https://agriwell.com/wp-content/uploads/2019/06/eu-bio-thumb-1.png',
                title: 'EU BIO-CERTIFICATION',
                subtitle: 'The European Union has a strict set of requirements for the production of organic foodstuffs. This certification is a means of ensuring that the foodstuffs produced comply with these requirements.'
            },{
                image: 'https://agriwell.com/wp-content/uploads/2019/06/eu-bio-thumb-1.png',
                title: 'EU BIO-CERTIFICATION',
                subtitle: 'The European Union has a strict set of requirements for the production of organic foodstuffs. This certification is a means of ensuring that the foodstuffs produced comply with these requirements.'
            },{
                image: 'https://agriwell.com/wp-content/uploads/2019/06/eu-bio-thumb-1.png',
                title: 'EU BIO-CERTIFICATION',
                subtitle: 'The European Union has a strict set of requirements for the production of organic foodstuffs. This certification is a means of ensuring that the foodstuffs produced comply with these requirements.'
            },{
                image: 'https://agriwell.com/wp-content/uploads/2019/06/eu-bio-thumb-1.png',
                title: 'EU BIO-CERTIFICATION',
                subtitle: 'The European Union has a strict set of requirements for the production of organic foodstuffs. This certification is a means of ensuring that the foodstuffs produced comply with these requirements.'
            }],
            strictpage: {
                title: 'STRICT SUPERVISION',
                subtitle: 'Confirmation of our goods’ organic status is under strict supervision, based on samples that are analysed in accredited European laboratories prior export approval.'
            },
            strict_logo: [{
                image: 'https://agriwell.com/wp-content/uploads/2019/08/galab-1.png'
            },{
                image: 'https://agriwell.com/wp-content/uploads/2019/08/galab-1.png'
            },{
                image: 'https://agriwell.com/wp-content/uploads/2019/08/galab-1.png'
            },{
                image: 'https://agriwell.com/wp-content/uploads/2019/08/galab-1.png'
            }],
            headqc:{
                image: 'https://agriwell.com/wp-content/uploads/2021/07/Anton_r_new-1600x1600.jpg',
                name: 'Anton R',
                title: 'Head of Quality Control',
            },
            heademail: {
                title: 'CALL OR EMAIL TO LEARN MORE',
                subtitle: 'Use the form below or call +420 226 208 232 to learn more about our certificates and quality assurance.'
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
<template>
    <div style="background-color:#262b2b">
        <v-container>
            <v-row class="mt-10">
                <v-col>
                    <v-img :src="'/images/logo.png'" width="200"></v-img>
                    <p class="white--text">Global exporter of top quality oilseeds, pulses, and grains for human consumption, oil extraction or animal feed. We specialises in organic agriculture. The core assortment consists of organic flax seeds in range of 98-99,95% of purity, as well as poppy, mustard, caraway and other oilseeds.</p>
                </v-col>
                <v-col>
                    <p class="display-1 white--text">Useful Links</p>
                    <p v-for="(men, i) in menu" :key="i" v-text="men.name" class="text-uppercase body-2 white--text"></p>
                </v-col>
                <v-col>
                    <p class="display-1 white--text">Contact Info</p>
                    <div v-for="(ctc, id) in contact" :key="id">
                        <p class="body-1 white--text"><v-icon color="green">{{ ctc.icon }}</v-icon> {{ ctc.text }}</p>
                    </div>
                </v-col>
                <v-col>
                    <p class="display-1 white--text">Our Certificates</p>
                    <v-img src="https://agriwell.com/wp-content/uploads/2020/05/certificates-footer-small.png"></v-img>
                    <p class="text-h6 mt-5 white--text">Follow Us On Social Media</p>
                    <div class="d-flex flex-wrap-reverse">
                        <a v-for="(soc, id) in social_media" :key="id" :href="soc.link"><v-icon  x-large dark class="mr-2">{{ soc.icon }}</v-icon></a>
                    </div>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>
<script>
import mix from '../mixins/mix.js'
export default {
    mixins: [mix],
}

</script>
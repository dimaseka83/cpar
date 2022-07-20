<template>
    <v-app>
        <v-card class="my-16">
            <v-data-table :headers="headerslides" :items="slides">
                <template v-slot:item.image="data">
                    <v-img
                        :src="'/images/home/slides/'+data.item.image"
                        :width="100"
                        :height="100"
                        class="mr-4"
                    ></v-img>                    
                </template>
                <template v-slot:item.actions="data">
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="edit(data.index)">
                                <v-icon>mdi-pencil</v-icon>
                            </v-btn>
                        </template>
                        <span>Edit</span>
                    </v-tooltip>
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="hapus(data.index)">
                                <v-icon>mdi-delete</v-icon>
                            </v-btn>
                        </template>
                        <span>Delete</span>
                    </v-tooltip>
                </template>
            </v-data-table>
        </v-card>
    </v-app>
</template>
<script>
export default {
    data() {
        return {
                loading: true,
                slides: [],
                headerslides: [
                    { text: 'Title', value: 'title' },
                    { text: 'Subtitle', value: 'subtitle' },
                    { text: 'Image', value: 'image' },
                    { text: 'Actions', value: 'actions', sortable: false },
                ],
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
        async loadData() {
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
    
    async editSlide(index) {
        try {
            await axios.post('/api/home/slides/edit', {
                index: index,
                slide: this.slides[index]
            }).then(res => {
                this.$router.push('/admin/home/slides/edit/'+index)
            })
        } catch (error) {
            
        }
    },

    async deleteSlide(index) {
        try {
            await axios.delete('/api/home/slides/'+this.slides[index].id)
            this.slides.splice(index, 1)
        } catch (error) {
            console.log(error)
        }
    },
    },

    mounted() {
        this.loadData()
    },
}
</script>
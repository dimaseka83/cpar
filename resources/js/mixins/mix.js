export default {
    data() {
        return {
            menu: [
                {
                    name: 'Home',
                    link: '/'
                },
                {
                    name: 'about us',
                    icon: 'mdi-package',
                    link: '/about',
                }, {
                    name: 'our offer',
                    icon: 'mdi-phone',
                    link: '/our-offer',
                }, {
                    name: 'our products',
                    icon: 'mdi-information',
                    link: '/our-products',
                }, {
                    name: 'quality',
                    icon: 'mdi-information',
                    link: '/quality',
                }, {
                    name: 'news',
                    icon: 'mdi-information',
                    link: '/news',
                }, {
                    name: 'contacts',
                    icon: 'mdi-information',
                    link: '/contacts',
                },{
                    name: 'laporan',
                    icon: 'mdi-information',
                    link: '/laporan',
                }],
            perusahaan: [],
            contact: [],
            social_media: [],
            footer: [],
        }
    },
    methods: {
        async loadData(){
            await axios.get('/api/company/perusahaan').then(response => {
                this.perusahaan = response.data;
            })
            
            await axios.get('/api/company/contact').then(response => {
                this.contact = response.data;
            })

            await axios.get('/api/company/social_media').then(response => {
                this.social_media = response.data;
            })

            await axios.get('/api/company/detailFooter').then(response => {
                this.footer = response.data;
            })
        }
    },

    mounted() {
        this.loadData();
    },
    computed: {
        height() {
            switch (this.$vuetify.breakpoint.name) {
                case 'xs': return 220
                case 'sm': return 400
                case 'md': return 500
                case 'lg': return 600
                case 'xl': return 800
            }
        },
        nosm() {
            return this.$vuetify.breakpoint.sm || this.$vuetify.breakpoint.md || this.$vuetify.breakpoint.lg || this.$vuetify.breakpoint.xl;
        },
        sm(){
            return this.$vuetify.breakpoint.xs;
        },
    }
}
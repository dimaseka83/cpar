export default {
    data() {
        return {
            perusahaan: {
                phone: '+62812-1234-1234',
                open_day: 'Senin - Jumat',
                open_hour: '08.00 - 17.00',
            },
            contact: [{
                icon: 'mdi-phone',
                text: '+62812-1234-1234',
            },
            {
                icon: 'mdi-email',
                text: 'mail@mail.com'
            },
            {
                icon: 'mdi-map-marker',
                text: 'Jl. Kebon Kacang No.1, Jakarta'
            },
            {
                icon: 'mdi-clock-outline',
                text: 'Mon-Fri: 9:00 - 17:00'
            }
            ],
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
            social_media: [{
                link: 'https://www.facebook.com/',
                icon: 'mdi-facebook',
            },{
                link: 'https://www.instagram.com/',
                icon: 'mdi-instagram',
            },{
                icon: 'mdi-linkedin',
                link: 'https://www.linkedin.com/',
            },{
                icon: 'mdi-youtube',
                link: 'https://www.youtube.com/',
            }]  
        }
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
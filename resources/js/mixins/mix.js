export default {
    data() {
        return {
            perusahaan: {
                phone: '+62812-1234-1234',
                open_day: 'Senin - Jumat',
                open_hour: '08.00 - 17.00',
            },
            menu: [
                {
                    name: 'Home',
                    link: '/'
                },
                {
                    name: 'about us',
                    icon: 'mdi-package',
                    link: '/produk',
                }, {
                    name: 'our offer',
                    icon: 'mdi-phone',
                    link: '/kontak',
                }, {
                    name: 'our products',
                    icon: 'mdi-information',
                    link: '/tentang',
                }, {
                    name: 'quality',
                    icon: 'mdi-information',
                    link: '/tentang',
                }, {
                    name: 'news',
                    icon: 'mdi-information',
                    link: '/tentang',
                }, {
                    name: 'contacts',
                    icon: 'mdi-information',
                    link: '/tentang',
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
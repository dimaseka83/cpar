import VueRouter from 'vue-router';
import Home from './Page/Home.vue';
import About from './Page/About.vue';
import News from './Page/News.vue';
import Contacts from './Page/Contacts.vue';
import OurOffer from './Page/OurOffer.vue';
import OurProducts from './Page/OurProducts.vue';
import Quality from './Page/Quality.vue';
import Laporan from './Page/Laporan.vue';

const routes = [
    { path: '/', component: Home, name: 'home' },
    { path: '/about', component: About, name: 'about' },
    { path: '/news', component: News, name: 'news' },
    { path: '/contacts', component: Contacts, name: 'contacts' },
    { path: '/our-offer', component: OurOffer, name: 'our-offer' },
    { path: '/our-products', component: OurProducts, name: 'our-products' },
    { path: '/quality', component: Quality, name: 'quality' },
    { path: '/laporan', component: Laporan, name: 'laporan' },
]

const router = new VueRouter({
    routes,
    mode: 'history'
});

export default router;
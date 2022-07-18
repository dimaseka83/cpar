import VueRouter from 'vue-router';
// Frontend
import Home from './Page/Home.vue';
import About from './Page/About.vue';
import News from './Page/News.vue';
import Contacts from './Page/Contacts.vue';
import OurOffer from './Page/OurOffer.vue';
import OurProducts from './Page/OurProducts.vue';
import Quality from './Page/Quality.vue';
import Laporan from './Page/Laporan.vue';
// Backend
import HomeAdmin from './PageAdmin/HomeAdmin.vue';
import AboutAdmin from './PageAdmin/AboutAdmin.vue';
import NewsAdmin from './PageAdmin/NewsAdmin.vue';
import ContactsAdmin from './PageAdmin/ContactsAdmin.vue';
import OurOfferAdmin from './PageAdmin/OurOfferAdmin.vue';
import OurProductsAdmin from './PageAdmin/OurProductsAdmin.vue';
import QualityAdmin from './PageAdmin/QualityAdmin.vue';
import LaporanAdmin from './PageAdmin/LaporanAdmin.vue';
// Login
import Login from './auth/Login.vue';

const routes = [
    // Login
    { path: '/login', component: Login },
    // Frontend
    { path: '/', component: Home, name: 'home' },
    { path: '/about', component: About, name: 'about' },
    { path: '/news', component: News, name: 'news' },
    { path: '/contacts', component: Contacts, name: 'contacts' },
    { path: '/our-offer', component: OurOffer, name: 'our-offer' },
    { path: '/our-products', component: OurProducts, name: 'our-products' },
    { path: '/quality', component: Quality, name: 'quality' },
    { path: '/laporan', component: Laporan, name: 'laporan' },
    // Backend
    { path: '/admin', component: HomeAdmin, name: 'Homeadmin' },
    { path: '/admin/about', component: AboutAdmin, name: 'Aboutadmin' },
    { path: '/admin/news', component: NewsAdmin, name: 'Newsadmin' },
    { path: '/admin/contacts', component: ContactsAdmin, name: 'Contactsadmin' },
    { path: '/admin/our-offer', component: OurOfferAdmin, name: 'OurOfferadmin' },
    { path: '/admin/our-products', component: OurProductsAdmin, name: 'OurProductsadmin' },
    { path: '/admin/quality', component: QualityAdmin, name: 'Qualityadmin' },
    { path: '/admin/laporan', component: LaporanAdmin, name: 'Laporanadmin' },
]

const router = new VueRouter({
    routes,
    mode: 'history'
});

export default router;
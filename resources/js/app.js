import '../css/app.css';
import './bootstrap';

// Impor weight font yang Anda butuhkan.
// 400 = normal, 500 = medium, 600 = semi-bold, 700 = bold, 800 = extra-bold
import '@fontsource-variable/plus-jakarta-sans';
// --- AKHIR BLOK ---

/* Impor Font Awesome */
import { library } from '@fortawesome/fontawesome-svg-core';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

/* Impor SEMUA ikon yang Anda gunakan dari seeder */
import { 
    faPalette, faCode, faShoppingCart, faServer, faRobot, faChevronLeft,
    faChartLine, faShieldHalved, faCubesStacked, faCommentsDollar,
    faMagnifyingGlassChart, faUsers, faSitemap, faObjectGroup, 
    faMobileAlt, faThumbsUp, faRecycle, faCodeBranch, faDesktop, 
    faMobileScreenButton, faCloudUploadAlt, faPuzzlePiece, faTachometerAlt, 
    faShieldAlt, faStore, faCreditCard, faBoxesStacked, faTruckFast, 
    faChartArea, faUsersCog, faSmileBeam, 
    faRocket, faShieldVirus, faHandHoldingUsd, faHeadset, faBrain, 
    faCameraRetro, // faChartNetwork mungkin tidak ada, alternatif: faProjectDiagram
    faLightbulb as faLightbulbOn, // Alias jika nama bentrok atau untuk kejelasan
    faSearchPlus, faUserSecret, faFileAlt, faShieldHeart, faLock, 
    faBalanceScale, faProjectDiagram, faFileSignature, 
    faCoins, faWallet, faEye, faLightbulb, faSearchLocation, 
    faRoad, faCompass, faDollarSign, 
    faChartBar, faInfoCircle, faCheckCircle, faCheck,
    faStar, // Untuk badge "Unggulan"
    faConciergeBell, // Ikon default untuk layanan
    faHandshake
} from '@fortawesome/free-solid-svg-icons'; 

/* Tambahkan semua ikon yang diimpor ke library Font Awesome */
library.add(
    faPalette, faCode, faShoppingCart, faServer, faRobot, faChevronLeft,
    faChartLine, faShieldHalved, faCubesStacked, faCommentsDollar,
    faMagnifyingGlassChart, faUsers, faSitemap, faObjectGroup, 
    faMobileAlt, faThumbsUp, faRecycle, faCodeBranch, faDesktop, 
    faMobileScreenButton, faCloudUploadAlt, faPuzzlePiece, faTachometerAlt, 
    faShieldAlt, faStore, faCreditCard, faBoxesStacked, faTruckFast, 
    faChartArea, faUsersCog, faSmileBeam, 
    faRocket, faShieldVirus, faHandHoldingUsd, faHeadset, faBrain, 
    faCameraRetro, faProjectDiagram, // Mengganti faChartNetwork
    faLightbulbOn, faSearchPlus, faUserSecret, faFileAlt, faShieldHeart, 
    faLock, faBalanceScale, faFileSignature, 
    faCoins, faWallet, faEye, faLightbulb, faSearchLocation, 
    faRoad, faCompass, faDollarSign, 
    faTachometerAlt, // Mengganti faTachometerAltFast 
    faChartBar, faInfoCircle, faCheckCircle, faCheck,
    faStar, faConciergeBell, faHandshake
    // Tambahkan SEMUA objek ikon yang diimpor di sini juga
);

import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import WebLayout from './Layouts/WebLayout.vue';

const appName = import.meta.env.VITE_APP_NAME || 'Beyond Digital Nusantara';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => {
        const page = resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue'));
        page.then((module) => {
            // Jika halaman ada di dalam folder 'Web', gunakan WebLayout
            if (name.startsWith('Web/')) {
                module.default.layout = WebLayout;
            }
            // Anda bisa menambahkan 'else if' untuk AdminLayout nanti
        });
        return page;
    },
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .component('font-awesome-icon', FontAwesomeIcon) 
            .use(ZiggyVue)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});

import '../css/app.css';
import './bootstrap';

import { createInertiaApp, Head, Link  } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

import router from './router';
import Material  from '@primevue/themes/aura';
import PrimeVue from 'primevue/config';
import ConfirmationService from 'primevue/confirmationservice';
import ToastService from 'primevue/toastservice';
import '@/assets/styles.scss';
import '@/assets/tailwind.css';
import AppLayout from '@/layout/AppLayout.vue';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => {
        //const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        //let page = pages[`./Pages/${name}.vue`]
        let page = resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob('./Pages/**/*.vue'),
        );
        console.log(page)
        return  page;
    },
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(AppLayout, () => h(App, props)) })
            .use(plugin)
            .use(ZiggyVue)
            .use(ToastService)
            .use(router)
            .use(ConfirmationService)
            .use(PrimeVue, {
                theme: {
                    preset: Material ,
                    options: {
                        darkModeSelector: '.app-dark'
                    }
                }
            })
            .component('Head', Head)
            .component('Link', Link)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
    layout: AppLayout
});

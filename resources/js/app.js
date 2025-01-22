import '../css/app.css';
import './bootstrap';
import 'primeicons/primeicons.css';
import PrimeVue from 'primevue/config';
import Lara from '@primevue/themes/lara';
import StyleClass from 'primevue/styleclass';
import Ripple from 'primevue/ripple';


import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

const appName = import.meta.env.VITE_APP_NAME || 'Hair Space';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob('./Pages/**/*.vue'),
        ),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(PrimeVue, {
                theme: {
                    preset: Lara,
                    options: {
                        prefix: 'p',
                        darkModeSelector: 'system',
                        cssLayer: false
                    }
                }
            })
            .directive('styleclass', StyleClass)
            .directive('ripple', Ripple)
            .mount(el);
    },
    progress: {
        color: '#34d399',
    },
});

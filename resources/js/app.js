import './bootstrap';
import '../css/app.css'; // Import global CSS yang sudah kita buat

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            // .use(ZiggyVue) // Uncomment jika kamu menggunakan Ziggy untuk routing
            .mount(el);
    },
    progress: {
        color: '#fddb00', // Sesuaikan warna loading bar dengan tema KPM (Kuning)
    },
});
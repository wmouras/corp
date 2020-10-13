require('./bootstrap');

import Vue from 'vue';

import { InertiaApp } from '@inertiajs/inertia-vue';
import { InertiaForm } from 'laravel-jetstream';
import { VueMaskDirective } from 'v-mask'
import PortalVue from 'portal-vue';
import vSelect from 'vue-select';
import VueRouter from 'vue-router';

Vue.directive('mask', VueMaskDirective);
Vue.directive('router', VueRouter);
Vue.component('v-select', vSelect);

Vue.use(InertiaApp);
Vue.use(InertiaForm);
Vue.use(PortalVue);
Vue.use(VueMaskDirective);
Vue.use(VueRouter)

const app = document.getElementById('app');

new Vue({
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: (name) => require(`./Pages/${name}`).default,
            },
        }),
}).$mount(app);

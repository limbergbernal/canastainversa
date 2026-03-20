import { createApp } from 'vue';
import $ from 'jquery';

import './bootstrap';


const components = import.meta.glob('./components/*.vue')

document.querySelectorAll('[data-vue]').forEach(async (el) => {

    const componentName = el.dataset.vue
    const path = `./components/${componentName}.vue`

    if (components[path]) {

        const module = await components[path]()
        let props = {};

        Object.keys(el.dataset).forEach(key => {
            if (key === 'vue') return

            try{
                props[key] = JSON.parse(el.dataset[key])
            }catch(e){
                props[key] = el.dataset[key]
            }
        })
        const app = createApp(module.default, props)

        app.mount(el)

    }

});
window.$ = window.jQuery = $;

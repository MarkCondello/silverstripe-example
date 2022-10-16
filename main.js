import './public/scss/index.scss'
import { createApp } from 'vue'
import FooterSocialsApp from './vue/FooterSocialsApp.vue'

const copyrightSection = document.getElementById('copyright'),
 rootSocialsElement = document.getElementById('socialsContainer')
if (copyrightSection && rootSocialsElement) {
  const footerSocialsApp = createApp(FooterSocialsApp, {
    token: copyrightSection.dataset.token,
    content: JSON.parse(rootSocialsElement.dataset.content)
  })
  footerSocialsApp.mount('#socialsContainer')
}

const womenVMenContainer = document.getElementById('womenVMenContainer')
if (womenVMenContainer){
  import('./modules/wvm')
}

const counter = document.querySelector('#counter')
if (counter) {
  import('/public/javascript/modules/counter.js').then((Module) => {
    Module.setupCounter(counter)
  })
}

// ToDo:
// Use a css module
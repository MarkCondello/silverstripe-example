import './public/scss/index.scss'
import { createApp } from 'vue'
import FooterSocialsApp from './vue/FooterSocialsApp.vue'

const rootSocialsElement = document.getElementById('socialsContainer')
if (rootSocialsElement) {
  const footerSocialsApp = createApp(FooterSocialsApp, {
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
import { createApp } from 'vue'
import FooterSocialsApp from './vue/FooterSocialsApp.vue' // should this be imported as a dynamic module
// import WomenVersusMenGadget from './vue/WomenVersusMenGadget.vue' // should this be imported as a dynamic module

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
  // createApp(WomenVersusMenGadget).mount('#womenVMenContainer')
}

const counter = document.querySelector('#counter')
if (counter) {
  import('/public/javascript/modules/counter.js').then((Module) => {
    Module.setupCounter(counter)
  })
}

// ToDo:
// Use a dynamic module import DONE
// Integrate Vue DONE
// Use a css module
// Use scss import in this file
import { createApp } from 'vue'
import FooterSocialsApp from '../vue/FooterSocialsApp.vue'

const rootSocialsElement = document.getElementById('socialsContainer'),
footerSocialsApp = createApp(FooterSocialsApp, {
  content: JSON.parse(rootSocialsElement.dataset.content)
})
footerSocialsApp.mount('#socialsContainer')

const counter = document.querySelector('#counter')
if (counter) {
  import('./modules/counter.js').then((Module) => {
    Module.setupCounter(counter)
  })
}

// ToDo:
// Use a dynamic module import DONE
// Integrate Vue DONE
// Use a css module
// Use scss
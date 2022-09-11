import '../css/bootstrap.min.css'
import '../css/font-awesome.min.css'
import '../css/font.css'
import '../css/style.css'
// import { setupCounter } from './modules/counter'

import {
  createApp
} from 'vue'
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


console.log('test again.')

// ToDo:
// Use a dynamic module import DONE
// Use a css module
// Integrate Vue DONE
// Use scss


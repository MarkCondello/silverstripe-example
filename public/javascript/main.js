
import '../css/bootstrap.min.css'
import '../css/style.css'

import { setupCounter } from './modules/counter'

console.log('main.js loaded')

setupCounter(document.querySelector('#counter'))

import React from 'react'
// import ReactDOM from 'react-dom'
import { createRoot } from 'react-dom/client';

import Page from './components/Page.jsx'

const container = document.getElementById('app');
const root = createRoot(container); // createRoot(container!) if you use TypeScript
root.render(<Page />);

// ReactDOM.render(
//   <React.StrictMode>
//     <Page />
//   </React.StrictMode>,
//   document.getElementById('app')
// )

const cool = () => {
  console.log('COOL youalls')
}

cool()
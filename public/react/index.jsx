import React from 'react'
import { createRoot } from 'react-dom/client';
import Page from './components/Page.jsx'

async function fetchViewableData(){
  try {
    const path = document.location.pathname === '/' ? `${document.location}home` : document.location
    const response = await fetch(`${path}/fetchViewableData`, {
      method: 'GET',
      headers: {'Content-Type': 'application/json'}
    })
    const body = await response.text()
    const result = JSON.parse(body)
    return result
  } catch(error) {
    console.log(error)
  }
}

const container = document.getElementById('app');
const root = createRoot(container); // createRoot(container!) if you use TypeScript
root.render(<Page fetchViewableData={fetchViewableData} />)
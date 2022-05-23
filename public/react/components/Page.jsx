import React, { useEffect, useState } from 'react'

function Page({fetchViewableData}) {
  const [content, setContent] = useState('')

  useEffect(() => {
    loadViewableData()
  })

  const loadViewableData = async() => {
    const data = await fetchViewableData()
    if (data) {
      console.log('...',{data})
      let parsedContent = '<p></p>'
      if(data.Content) {
        parsedContent = data.Content.replace(/\[image(.*)\]/, '<img $1 />')
      }
      setContent(parsedContent)
    }
  }
  return (
    <>
    <h1>Hello from the React Page Component</h1>
    <div dangerouslySetInnerHTML={{__html: content}}></div>
    </>
  );
}

export default Page;
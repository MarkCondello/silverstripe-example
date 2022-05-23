if($('.pagination').length) {
   function paginate(url) {
    $.ajax(url)
      .done(function(resp){
        // console.log({resp})
        //load the response into the body
        $('body').html(resp)
        $('html').animate({
          scrollTop: 0
        })
        window.history.pushState(
          { url: url },
          document.title,
          url
        )
      })
      .fail(function(resp){
        alert('Error: ' + resp.responseText)
      })
  }
  $('.pagination a').click(function(event){
    event.preventDefault()
    var url = $(this).attr('href')
    paginate(url)
  })
  //This function works when the user presses back in the browser history
  window.onpopstate = function(event) {
     console.log({ event })
    if(event.state.url) {
      paginate(event.state.url)
    } else {
      event.preventDefault()
    }
  }
}

// This script makes a get request to the server and retrieves the content from the url request from the pagination links.
// It replaces the existing content with the response data which is the new page.
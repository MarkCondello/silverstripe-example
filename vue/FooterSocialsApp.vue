<template>
  <ul class="social-networks">
    <li v-for="social in content" :key="social">
      <a :href="social.link" target="_blank">
        <i class="fa" :class="social.icon"></i>
      </a>
    </li>
  </ul>
  <fieldset>
    <legend>Leave a video comment</legend>
    <div>
      <label>Your name</label>
      <input type="text" v-model="name" required/>
    </div>
    <div>
      <label>Your comment</label>
      <textarea @input="handleComment" required></textarea>
    </div>
    <div>
      <button @click="handleSend">Send comment</button>
    </div>
  </fieldset>
</template>
<script>
import axios from 'axios'
export default {
  props: {
    content: {
      required: true,
      type: String,
    },
    token: {
      required: true,
      type: String,
    },
  },
  name: 'FooterSocials',
  data(){
    return {
      name: '',
      comment: '',
    }
  },
  created(){
    console.log('Reached created FooterSocials. axios example request', )
    // console.log('Reached created FooterSocials. $.ajax example request', )
    // console.log('Reached created FooterSocials. fetch example request', )
  },
  methods: {
    handleComment(ev){
      // Text areas do not work properly with v-model
      // console.log('Reached handle comment: ', ev.target.value)
      this.comment = ev.target.value
    },
    handleSend(){
      if (this.name === '') {
        alert('Add a name')
        return
      }
      if (this.comment === '') {
        alert('Add a commment')
        return
      }
      const data = {
        name: this.name,
        comment: this.comment,
        SecurityID: this.token
      }

      $.ajax({
          type: 'POST',
          url: '/userContent/createVideoComment',
          data,
          dataType: 'json'
      }).done(function(rsp) {
        console.log('Reached success with $.ajax: ', {resp})
      }).fail(function(err) {
        console.error
      }).always(function() {
          this.name = ''
          this.comment = ''
      })

      // fetch('/userContent/createVideoComment', {
      //   method: "POST",
      //   headers: {'Content-Type': 'application/x-www-form-urlencoded'}, 
      //   body: JSON.stringify(data)
      //   // body: data// this does not work
      // }).then(resp => {
      //   console.log('Reached success with fetch: ', {resp})
      // })
      // .catch(err => console.error)
      // .finally(()=>{
      //   this.name = ''
      //   this.comment = ''
      // })

      axios.post(`/userContent/createVideoComment?name=${this.name}&comment=${this.comment}&SecurityID=${this.SecurityID}`)
      .then(resp => {
        console.log('Reached success axios.post: ', {resp})
      })
      .catch(err => console.error)
      .finally(()=>{
        this.name = ''
        this.comment = ''
      })

      // axios.post('/userContent/createVideoComment', data)
      // .then(resp => {
      //   console.log('Reached success: ', {resp})
      // })
      // .catch(err => console.error)
      // .finally(()=>{
      //   this.name = ''
      //   this.comment = ''
      // })
    }
  }
}
</script>

<template>
  <ul class="social-networks">
    <li v-for="social in content" :key="social">
      <a :href="social.link" target="_blank">
        <i class="fa" :class="social.icon"></i>
      </a>
    </li>
  </ul>
  <!-- <fieldset>
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
  </fieldset> -->
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
    // console.log('Reached created FooterSocials.', this.content)
  },
  methods: {
    handleComment(ev){
      // Text areas do not work properly with v-model
      console.log('Reached handle comment: ', ev.target.value)
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
      axios.post('/userContent/createVideoComment', {
        name: this.name,
        comment: this.comment,
        SecurityID: this.token
      })
      .then(resp => {
        console.log('Reached success: ', {resp})
      })
      .catch(err => console.error)
      .finally(()=>{
        this.name = ''
        this.comment = ''
      })
    }
  }
}
</script>
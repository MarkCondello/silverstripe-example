<template>
  <ul class="social-networks">
    <li v-for="social in content" :key="social">
      <a :href="social.link" target="_blank">
        <i class="fa" :class="social.icon"></i>
      </a>
    </li>
  </ul>
</template>

<script>
export default {
  props: {
    content: {
      required: true,
      type: String,
    }
  },
  name: 'FooterSocials',
  created(){
    console.log('Reached created FooterSocials.', this.content)
  }
}
</script>
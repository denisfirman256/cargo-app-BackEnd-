<template>
  <div id="admin">
    <dashboard-component></dashboard-component>
    <router-view></router-view>
  </div>
</template>

<script>
import Vue from "vue"


export default {
  async created()
  {
    const response = await axios.get('/api/v1/auth/me', {
      headers: {
        Authorization: 'Bearer '+localStorage.getItem('token')
      }
    })
  }
  
}
</script>
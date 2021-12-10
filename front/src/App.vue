<template>
   <section>
      <!-- <searchbar v-if="active_login"></searchbar> -->
      <div class="container-fluid">
         <div class="row">  
               <navbar class="col-3" v-if="active_login" @log_out="isLogout"></navbar>
               <router-view class="col-9" @log_in="isLogin"></router-view>
         </div>
      </div>
   </section>
</template>

<script>
import Navbar from './components/navbar/Navbar.vue'
export default {
  components: {
      Navbar,
  },
  data() {
     return {
        active_login: null
        
     }
  },
  watch : {
     active_login(){
        return this.active_login !== null
     }
  },
  methods: {
     isLogin(user){
        this.active_login = user;
     },
     isLogout(){
        this.active_login = null;
     }
  },
  mounted() {
     this.active_login = localStorage.getItem('user');
  },
}
</script>

<style> 
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

:root {
    --main-color: #F53F3E;
    --main-color-light: cyan;
}

* {
    box-sizing: border-box;
}

html {
    font-family: 'Roboto', sans-serif;
}

body {
    margin: 0;
}

.right-main-button {
    float: right;
    margin-right: 2rem;
}
#app {
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #4D4D4D;
  font-size: 16px;
  font-family: 'Roboto', sans-serif;
}
</style>
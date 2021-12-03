<template>
  <section class="form">
    <form class="col-4 m-auto p-4">
      <div class="text-center">
        <h2>Welcome back</h2>
        <p>Login to continue</p>
      </div>
      <div class="form-group">
        <label for="inputEmail">Email</label>
        <div class="input-group mb-3">
          <input
            type="email"
            class="form-control bg-light border-0"
            id="inputEmail"
            v-model="email"

          />
          <div class="input-group-prepend">
            <span class="input-group-text bg-danger border-0 rounded-right">
              <i class="fa fa-envelope text-light" aria-hidden="true"></i>
            </span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword">Password</label>
        <div class="input-group mb-5">
          <input
            type="password"
            class="form-control bg-light border-0"
            id="inputPassword"
            v-model="password"

          />
          <div class="input-group-prepend">
            <span class="input-group-text bg-danger border-0 rounded-right">
              <i class="fa fa-unlock-alt text-light" aria-hidden="true"></i>
            </span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <button type="submit" @click="login" class="btn btn-danger w-100">LOGIN</button>
      </div>
      <div class="form-group text-center">
        <label >Don't have an account?</label>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-outline-danger w-100">
          REGISTER
        </button>
      </div>
    </form>
  </section>
</template>

<script>
import axios from 'axios';
export default {
    user: '',
  data() {
  
    return {
      email:'',
      password:''

    }
  },
  methods: {
    login(e)
    {
      e.preventDefault();
        axios.get("http://eventme.org:3000/api/users").then(
        response => this.user = response.data
      )
      console.log(this.user)
    }
  },
}
</script>

<style>

</style>
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
                    <input type="email" class="form-control bg-light border-0" id="inputEmail" v-model="email">
                    <div class="input-group-prepend">
                        <span class="input-group-text border-0 rounded-right">
                            <i class="fa fa-envelope text-light" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control bg-light border-0" id="inputPassword" v-model="password">
                    <div class="input-group-prepend">
                        <span class="input-group-text border-0 rounded-right">
                            <i class="fa fa-unlock-alt text-light" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>
                <small class="text-danger">{{messageError}}</small>
            </div>
            <div class="form-group">
                <button v-on:click.prevent="login" type="submit" class="btn w-100 mt-5">LOGIN</button>
            </div>
            <p>Don't have an account?</p>
            <div class="form-group">
                <router-link class="link" to='/register'><button type="submit" class="btn-register btn w-100">REGISTER</button></router-link>
            </div>
        </form>
    </section>
</template>
<script>
    import axios from 'axios';
    const url = "http://127.0.0.1:8000/api/login";
    export default {
        emits : ['log_in'],
        data() {
            return {
                email: null,
                password: null,
                messageError: null
            };
        },
        methods: {
            login() {
                let data = {
                    email: this.email,
                    password: this.password
                };
                console.log(data)
                axios.post(url, data).then(res => {
                    console.log(res.data);
                    const user = res.data;
                    this.$emit('log_in', user)
                    localStorage.setItem('user', JSON.stringify(user));
                    this.$router.push('/home');
                }).catch(error => {
                    let errorStatus = error.response.data.message;
                    console.log(errorStatus)
                    if(error.response) {
                        this.messageError = errorStatus;
                    }
                })
            }
        },
    };
</script>
<style scoped>
    .form{
        background-image: url(../../assets/bg.png);
        background-position: center; 
        background-size: cover;
        height: 100vh;
        width: 100%;
        padding: 20px;
    }
    form{
        box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
        padding: 10px;
        border-radius: 10px;
        background: #ffff;
    }
    .btn-register{
        border-width: 2px;
        border-color: #5c5cbc;
        background: none;
    }
    .link > .btn-register {
        text-decoration: none;
        color: #5c5cbc;
    }
    .link > .btn-register:hover {
        color: white;
        background: #5c5cbc;
    }
    span{
        background: #5c5cbc;
    }
    button{
        background: #5c5cbc;
        color: white;
    }
</style>
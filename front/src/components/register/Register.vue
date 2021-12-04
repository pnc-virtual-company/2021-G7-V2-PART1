<template>
    <section class="form">
        <form class="col-4 m-auto p-4">
            <div class="form-row">
                <div class="form-group col-md-6 m-0">
                    <label for="inputFirstname">First name</label>
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0" id="inputFirstname" v-model="firstName">
                        <div class="input-group-prepend">
                            <span class="input-group-text border-0 rounded-right">
                                <i class="fa fa-user text-light" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                    <small class="text-danger">{{messageError.first_name}}</small>
                </div>
                <div class="form-group col-md-6 m-0">
                    <label for="inputLastName">Last name</label>
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0" id="inputLastName" v-model="lastName">
                        <div class="input-group-prepend">
                            <span class="input-group-text border-0 rounded-right">
                                <i class="fa fa-user text-light" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                    <small class="text-danger">{{messageError.last_name}}</small>
                </div>
            </div>
            <div class="form-group m-0">
                <label for="inputEmail">Email</label>
                <div class="input-group">
                    <input type="email" class="form-control bg-light border-0" id="inputEmail" v-model="email">
                    <div class="input-group-prepend">
                        <span class="input-group-text border-0 rounded-right">
                            <i class="fa fa-envelope text-light" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>
                <small class="text-danger">{{messageError.email}}</small>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 m-0">
                    <label for="inputPassword">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control bg-light border-0" id="inputPassword" v-model="password">
                        <div class="input-group-prepend">
                            <span class="input-group-text border-0 rounded-right">
                                <i class="fa fa-unlock-alt text-light" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                    <small class="text-danger">{{messageError.password}}</small>
                </div>
                <div class="form-group col-md-6 m-0">
                    <label for="cfpassword">Confirm password</label>
                    <div class="input-group">
                        <input type="password" class="form-control bg-light border-0" id="cfpassword" v-model="cfpassword">
                        <div class="input-group-prepend">
                            <span class="input-group-text border-0 rounded-right">
                                <i class="fa fa-check-circle text-light" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                    <small class="text-danger">{{messageError.cfpassword}}</small>
                </div>
            </div>
            <div class="form-group m-0">
                <label for="inputPhone">Phone number</label>
                <div class="input-group">
                    <input type="number" class="form-control bg-light border-0" id="inputPhone" v-model="phone">
                    <div class="input-group-prepend">
                        <span class="input-group-text border-0 rounded-right">
                            <i class="fa fa-phone text-light" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <small class="text-danger">{{messageError.phone}}</small>
                </div>
            </div>
            <div class="form-group">
                <label for="addPic">Choose profile</label>
                <input type="file" class="form-control-file" id="addPic">
            </div>
            <div class="form-group">
                <router-link class="link" to='/'><p>Already have an account?</p></router-link>
            </div>
            <div class="form-group">
                <button v-on:click.prevent="register" type="submit" class="btn w-100">REGISTER</button>
            </div>
        </form>
    </section>
</template>
<script>
    import axios from 'axios';
    const url = "http://127.0.0.1:8000/api/register";
    export default {
        data() {
            return {
                firstName: "",
                lastName: "",
                email: "",
                password: "",
                cfpassword: "",
                phone: "",
                url: "http://eventme.org:3000/api/register",
                messageError : {
                    first_name: null,
                    last_name: null,
                    email: null,
                    password:  null,
                    cfpassword: null,
                    phone: null
                }
            };
        },
        methods: {
            register() {
                let dataUser = {
                    first_name: this.firstName,
                    last_name: this.lastName,
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.cfpassword,
                    phone_number: this.phone
                };
                axios.post(url, dataUser).then(res => {
                    console.log(res.data);
                    this.$router.push('/home');
                }).catch(error => {
                    let errorStatus = error.response.data.errors;
                    console.log(errorStatus)
                    if(errorStatus.first_name !== undefined) {
                        this.messageError.first_name = "Name must be 3 to 10 characters";
                    }
                    if(errorStatus.last_name !== undefined) {
                        this.messageError.last_name = "Name must be 3 to 10 characters";
                    }
                    if(errorStatus.email !== undefined) {
                        this.messageError.email = "Existing email or invalid email address!";
                    }
                    if(errorStatus.password !== undefined) {
                        this.messageError.password = "Password must be match and at least 8 characters";
                    }
                    if(errorStatus.phone_number !== undefined) {
                        this.messageError.phone = "Phone number must be 9 characters";
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
        padding: 10px;
    }
    form{
        box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
        padding: 10px;
        border-radius: 10px;
        background: #ffff;
    }
    .link {
        text-decoration: none;
    }
    span{
        background: #5c5cbc;
    }
    button{
        background: #5c5cbc;
        color: white;
    }
</style>
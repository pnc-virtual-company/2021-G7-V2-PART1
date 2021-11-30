<template>
    <section class="form">
        <form class="col-4 m-auto p-4">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputFirstname">First name</label>
                    <div class="input-group">
                        <input v-model="firstName" type="text" class="form-control bg-light border-0" id="inputFirstname">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-danger border-0 rounded-right">
                                <i class="fa fa-user text-light" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputLastName">Last name</label>
                    <div class="input-group">
                        <input v-model="lastName" type="text" class="form-control bg-light border-0" id="inputLastName">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-danger border-0 rounded-right">
                                <i class="fa fa-user text-light" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail">Email</label>
                <div class="input-group">
                    <input v-model="email" type="email" class="form-control bg-light border-0" id="inputEmail">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-danger border-0 rounded-right">
                            <i class="fa fa-envelope text-light" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputPassword">Password</label>
                    <div class="input-group">
                        <input v-model="password" type="password" class="form-control bg-light border-0" id="inputPassword">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-danger border-0 rounded-right">
                                <i class="fa fa-unlock-alt text-light" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputConfirm">Confirm password</label>
                    <div class="input-group">
                        <input v-model="cfPassword" type="password" class="form-control bg-light border-0" id="inputConfirm">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-danger border-0 rounded-right">
                                <i class="fa fa-check-circle text-light" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail">Phone number</label>
                <div class="input-group">
                    <input v-model="phone" type="number" class="form-control bg-light border-0" id="inputEmail">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-danger border-0 rounded-right">
                            <i class="fa fa-phone text-light" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="addPic">Choose profile</label>
                <input type="file" class="form-control-file" id="addPic">
            </div>
            <div class="form-group">
                <label>Already have an account?</label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-danger w-100">REGISTER</button>
            </div>
        </form>
    </section>
</template>
<script>
export default{
    data() {
        return {
            firstName:'',
            lastName: '',
            email:    '',
            password: '',
            cfPassword:''
        }
    },
}
</script>
<style>
    .form{
        background-image: url(../../../dist/img/bg.png);
         background-position: center; 
        background-size: cover;
        height: 100vh;
        width: 100%;
        padding: 30px;
    }
    form{
        box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
        padding: 10px;
        border-radius: 10px;
        background: #ffff;
    }
</style>
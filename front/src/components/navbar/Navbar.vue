<template>
    <section>
    <nav class="menu">
            <router-link class="link" to="/home"><div class="item">
                <li><i class="fa fa-home" aria-hidden="true"></i>All Event</li>
            </div></router-link>
            <router-link class="link" to="/my_event"><div class="item">
                <li><i class="fa fa-calendar-o" aria-hidden="true"></i>My Event</li>
            </div></router-link>

            <router-link  class="link" to="/join"><div class="item">
                <li><i class="fa fa-archive" aria-hidden="true"></i>Joined</li>
            </div></router-link>

            <router-link class="link" to="/category"><div class="item">
                <li><i class="fa fa-th-large" aria-hidden="true"></i>Category</li>
            </div></router-link>

            <hr class="text-bold">
        
            <router-link class="link" to="/about"><div class="item">
                <li><i class="fa fa-exclamation-circle" aria-hidden="true"></i>About</li>
            </div></router-link>
            
            <div class=" logout">
                <li><button type="button" class="btn btn-danger" @click="logOut"><i class="fa fa-sign-out" aria-hidden="true"></i>Log Out</button></li>
            </div>
        </nav>
    </section>
</template>
<script>
    export default {
        emits: ['log_out'],
        methods: {
            logOut(){
                localStorage.clear();
                this.$emit('log_out');
                this.$router.push('/');
            }
        },
    }
</script>
<style scoped>

    .menu{
        padding: 0;
        overflow: hidden;
        position: fixed;
    }
    a {
        text-decoration: none;
    }
    .link {
        text-decoration: none;
    }
    .logout {
        margin-left: 9%;
    }
    .logout> li {
        margin-right: 25px;
        color: #4D4D4D;
        font-size: 17px;
        padding: 10px 30px;
        display: block;
        width: 100%;
    }
    .item > li{
        margin-right: 25px;
        color: #4D4D4D;
        font-size: 17px;
        padding: 10px 30px;
        display: block;
        width: 100%;
    }
    .item > li:hover{
        background: #DDEFFF;
        color: #0085FF;
        transition: 0.3s ease;
    }
    .item > li > i{
        font-size: 18px;
        margin-right: 30px;
        margin-left: 30px;
    }
    .item > button {
        width: 30px;
    }
    nav .router-link-active .item > li {
        color: #0085FF;
        background: #DDEFFF;
    }
</style>
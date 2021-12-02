<template>
    <section>
        <nav class="navbar navbar-light bg-light">
            <form class="input-group col-5 m-auto">
                    <input type="search" class="form-control bg-white" placeholder="Search" v-model="search">
                    <div class="input-group-prepend">
                        <button class="btn-search input-group-text border-0 rounded-right">
                            <i class="fa fa-search text-light" aria-hidden="true"></i>
                        </button>
                    </div>
            </form>
        </nav>
        <div class="contain row">
            <div class="menu col-3 ">
                <div class="item"><li><i class="fa fa-home" aria-hidden="true"></i>Home</li></div>
                <div class="item"><li><i class="fa fa-calendar-o" aria-hidden="true"></i>My Event</li></div>
                <div class="item"><li><i class="fa fa-archive" aria-hidden="true"></i>Joined</li></div>
                <div class="item"><li><i class="fa fa-th-large" aria-hidden="true"></i>Category</li></div>
                <div class="item"><li><i class="fa fa-user-circle" aria-hidden="true"></i>Personal Info</li></div>
                <hr class="text-bold">
                <div class="item"><li><i class="fa fa-calendar-o" aria-hidden="true"></i>Events</li></div>
                <div class="item"><li><i class="fa fa-users" aria-hidden="true"></i>Users</li></div>
                <div class="item"><li><i class="fa fa-exclamation-circle" aria-hidden="true"></i>About</li></div>
                <div class="item"><li><i class="fa fa-sign-out" aria-hidden="true"></i>Log Out</li></div>
            </div>
            <div class="col-9">
                My event
            </div>
        </div>
    </section>
</template>
<script>
export default {
    
}
</script>
<style scoped>
    .navbar{
        box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
    }
    .contain {
        width: 100%;
    }
    .btn-search {
        color: white;
        background: #5c5cbc;
    }
    .item > li{
        margin-right: 30px;
        color: #4D4D4D;
        font-size: 16px;
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
    }
</style>
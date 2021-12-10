<template>
<section class="p-0">
    <nav class="navbar navbar-light bg-light">
        <form class="input-group col-5 m-auto">
            <input type="search" class="form-control bg-white" placeholder="Search" >
            <div class="input-group-prepend">
                <button class="btn-search input-group-text border-0 rounded-right">
                    <i class="fa fa-search text-light" aria-hidden="true"></i>
                </button>
            </div>
        </form>
    </nav>
    <div class="title mt-2">
        <h3>Joined</h3>
        <p>All the events that you have joined are store here</p>
    </div>
</section>

</template>
<script>


export default {
    // props: ['category']
}
</script>
<style scoped>
    .title{
    text-align: center;
    }
    .category{
    overflow-y: scroll;
    }
    .navbar {
    box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px;
    position: sticky;
    top: 0;
    }
    .contain {
    width: 100%;
    }
    .btn-search {
    color: white;
    background: #5c5cbc;
    }
</style>
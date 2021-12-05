<template>
    <nav class="navbar navbar-light bg-light">
        <form class="input-group col-5 m-auto" @submit.prevent="search">

            <input type="text" placeholder="Search.." name="search" v-model="categoryTitle">
            <button  type="submit" class="fa fa-search" id="btnSearch"></button>
            
        </form>
    </nav>
</template>
<script>
export default {
    emit:["addName"],
    data(){
        return {
            categoryTitle:'',
        }
    },
    methods:{
        search(){
            this.$emit('addName',this.categoryTitle);
        }
    }
}
</script>
<style scoped>
    .navbar{
    box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
    }
    .btn-search {
        color: white;
        background: #5c5cbc;
    }
</style>
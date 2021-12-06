<template>
    <form class="input-group" @submit.prevent="search">
    <input type="search" class="form-control bg-white" placeholder="Search"  v-model="categoryTitle" >
    <div class="input-group-prepend">
        <button class="btn-search input-group-text border-0 rounded-right">
        <i class="fa fa-search text-light" aria-hidden="true"></i>
        </button>
    </div>
    </form>
    
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
            this.categoryTitle='';
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
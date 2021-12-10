<template>
  <section class="p-0">
    <!-- button search category -->
    <nav class="navbar navbar-light bg-light">
        <form class="input-group col-5 m-auto" @submit.prevent="search">
            <input type="search" class="form-control bg-white" placeholder="Search"  v-model="search">
            <div class="input-group-prepend">
                <button class="btn-search input-group-text border-0 rounded-right">
                    <i class="fa fa-search text-light" aria-hidden="true"></i>
                </button>
            </div>
        </form>
    </nav>
    <div class="title mt-2">
        <h3>Category</h3>
        <p>Here's all cotegories of evet, you also ca create it</p>
    </div>
    <div class="container-fluid">
        <div class="row">
          <!-- 1. sort  -->
          <div class="col-3 p-3">
              <form class="col-8 m-auto">
                <select class="form-control">
                    <option>Sort by</option>
                    <option>Latest</option>
                    <option>Oldest</option>
                </select>
              </form>
          </div>
          <!--2. card category -->        
          <div class="cotegory col-6">
            <category-card
            v-for="category of listCategory"
            :key="category.id"
            :category="category"
            @remove-category="removeCategory">
            </category-card>
          </div>
          <!-- 3. button add Category -->
          <div class="col-3 p-3">
            <button type="button" class="btn btn-primary m-auto" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" >Add Category +</button>
            <category-form  @add-category="addNewCategory"></category-form>
          </div>
        </div>
      </div>   
  </section>
</template>
<script>

import CategoryCard from "./CategoryCard.vue";
import CategoryForm  from "./CategoryForm.vue"
import axios from "axios";
const url='http://127.0.0.1:8000/api';
export default {


  components: { CategoryCard,CategoryForm, },
  data() {
      return {
          listCategory:[],
          search: '',
        
      }
  },
  methods: {
    // -----------get all category -----------------
    getCategory(){
      axios.get(url+'/categories')
      .then((response)=>{
        this.listCategory=response.data;
      })
    },

    // ----------------add new category ----------------
    addNewCategory(categoryName){
      const newCategory={
        id:new Date().toISOString(),
        categoryName:categoryName,
      }
      axios.post(url+'/categories',newCategory)
      .then((response)=>{
        // console.log(response.data.category);
        this.listCategory.push(response.data.category);
        this.getCategory();
      })
    },

    // -------------remove category---------------
     removeCategory(id){
      if (confirm("Do you really want to delete?")) {
        axios.delete(url + "/categories/" + id)
        .then(() => {
            // this.getCategory();
            this.listCategory = this.listCategory.filter((category) => category.id !== id);
        });
      }

    },

    // Search category 
    searchCategory(value) {
      if (value !=''){
        axios.get(url + "/categories/search/" + value).then(res => {
          this.listCategory = res.data;
          })
        }else{
          this.getCategory();
        }
      },
    },
  watch:{
      search: function(){
        // console.log(this.search);
        this.searchCategory(this.search);
      }
    },

  //-----------------reload page--------------------------
  mounted() {
    this.getCategory();
  },

};
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
.item > li {
  margin-right: 30px;
  color: #4d4d4d;
  font-size: 16px;
  padding: 10px 30px;
  display: block;
  width: 100%;
}
.item > li:hover {
  background: #ddefff;
  color: #0085ff;
  transition: 0.3s ease;
}
.item > li > i {
  font-size: 18px;
  margin-right: 30px;
}
</style>
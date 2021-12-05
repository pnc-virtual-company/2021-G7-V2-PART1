<template>
  
  <section >
    <!-- button search category -->

    <div class="row">
          <search @addName="searchCategory"></search>
    </div>

    <div class="title">
        <h3>Category</h3>
        <p>Here's all cotegories of evet, you also ca create it</p>
    </div>
    <div class="contain">
        <div class="row">
          <!-- 1. sort  -->
          <div class="col-3 ">
              <form>
                <label for="category">Short by</label>
                <select id="category" name="category">
                    <option value="volvo">Latest</option>
                    <option value="saab">Oldest</option>
                </select>
              </form>
          </div>
          <!--2. card category -->
        
          <div class="col-6 ">
            <category-card
            v-for="category of listCategory"
            :key="category.id"
            :category="category"

            @remove-category="removeCategory"
            
            >

            </category-card>

          </div>
          <!-- 3. button add Category -->
          <div class="col-3">

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" >Add Category +</button>
            <category-form  @add-category="addNewCategory"></category-form>
            
          </div>
        </div>
      </div>
    
  </section>
</template>
<script>
import Search from './Search.vue';
import CategoryCard from "./CategoryCard.vue";
import CategoryForm  from "./CategoryForm.vue"
import axios from "axios";
const url='http://127.0.0.1:8000/api';
export default {


  components: { CategoryCard,CategoryForm,Search },
  data() {
      return {
          listCategory:[],
        
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
      axios.delete(url+"/categories/"+id)
      .then(()=>{
        // this.getCategory();
        this.listCategory=this.listCategory.filter((category)=>category.id !== id);
      });
    },

    // -------------add category's name that searched---------------
    searchCategory(categoryTitle) {
        if(categoryTitle !== '') {
          axios.get(url + "/categories/search/" + categoryTitle).then(res => {
            this.listCategory = res.data;
            
          })
        }else {
          this.getCategory();
        }
    },
  

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
.navbar {
  box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px,
    rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
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
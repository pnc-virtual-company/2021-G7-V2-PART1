<template>
<section class="p-0">
    <!-- button search category -->
    <nav class="navbar navbar-light bg-light">
        <form class="input-group col-5 m-auto" @submit.prevent="search">
            <input type="search" class="form-control bg-white" placeholder="Search" v-model="search">
            <div class="input-group-prepend">
                <button class="btn-search input-group-text border-0 rounded-right">
                    <i class="fa fa-search text-light" aria-hidden="true"></i>
                </button>
            </div>
        </form>
        <h6 class="text-success">{{username}}</h6>
    </nav>
    <div class="title mt-2">
        <h3>Category</h3>
        <p>Here's all cotegories of evet, you also ca create it</p>
    </div>
    <div class="contain">
        <div class="row">
            <!-- 1. sort  -->
            <div class="col-3 p-3">

            </div>
            <!--2. card category LANH GET DATA TO ADD ON VUEJS FRONT END -->
            <div class="cotegory col-6">
                <category-card v-for="category of listCategory" :key="category.id" :category="category" @delete-category="deleteCategory"  @update-category="UpdateCategory">
                </category-card>
            </div>
            <!-- 3. button add Category -->
            <div class="col-3 p-3">
                <button type="button" class="kc_fab_main_btn" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">+</button>
                <category-form @add-category="addNewCategory"></category-form>
                    
            </div>
        </div>
    </div>
</section>
</template>

<script>
import CategoryCard from "../components/category/CategoryCard.vue";
import CategoryForm from "../components/category/CategoryForm.vue";
import axios from "../axios-request.js";

export default {

    components: {
        CategoryCard,
        CategoryForm,
    },
    data() {
        return {
            listCategory: [],
            search: '',

            
            username :JSON.parse(localStorage.getItem("user")),
           
        }
    },
    methods: {
      
        UpdateCategory(id,category){
            axios.put("/categories/" +  id, category).then(res => {
                // console.log("Updated");
                this.getCategory();
                return res.data
            })

        },
        // -----------get all category -----------------
        getCategory() {
            axios.get('/categories')
                .then((response) => {
                    this.listCategory = response.data;
                })
        },

        // ----------------add new category ----------------
        addNewCategory(categoryName) {
            const newCategory = {
                id: new Date().toISOString(),
                categoryName: categoryName,
            }
            axios.post('/categories', newCategory)
                .then((response) => {
                    this.listCategory.push(response.data);
                    this.getCategory();
                })
        },

        // -------------remove category---------------
        deleteCategory(id) {
           
                axios.delete("/categories/" + id)
                    .then(() => {
                        this.listCategory = this.listCategory.filter((category) => category.id !== id);
                    });
            

        },

        // Search category 
        searchCategory(value,) {
            if (value != '') {
                axios.get("/categories/search/" + value).then(res => {
                    this.listCategory = res.data;
                })
            } else {
                this.getCategory();
            }
        },
    },

    watch: {
        search: function () {
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

<style>
.title {
    text-align: center;
}

.category {
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

.item>li {
    margin-right: 30px;
    color: #4d4d4d;
    font-size: 16px;
    padding: 10px 30px;
    display: block;
    width: 100%;
}

.item>li:hover {
    background: #ddefff;
    color: #0085ff;
    transition: 0.3s ease;
}

.item>li>i {
    font-size: 18px;
    margin-right: 30px;
}
</style>

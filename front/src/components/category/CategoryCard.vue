<template>
<section>
    <!-- card -->
    <div class="card m-3">
        <div class="row" style="height:10vh">
            <div class="title-area">
                <h4>{{category.categoryName}}</h4>
            </div>
            <div class="button-area">
                <!-- <button type="button" class="delete btn btn-danger" @click="remove">Delete</button> -->
                <button type="submit" class="delete btn btn-danger" @click="ShowDilogDelete(category)">Delete</button>
                <button type="submit" class="btn btn-outline-primary" @click="ShowDilogEdit(category)">Edit</button>
            </div>
        </div>
    </div>
    <!-----------Edid Dialog---------- -->
    <dialog-edit-category v-if="showEdit" 
    :dataCategory="categoryInfo" 
    @cancel="cancel" 
    @update="updateCategory">
    </dialog-edit-category>
    
     <!-----------Delete Dialog---------- -->
     
    <delete v-if="showDelete"
    :dataCategory="categoryInfo" 
    @cancel-form="cencelFrom"
    @remove-category="removeCategory"
    >
    </delete>

</section>
</template>

<script>

import DialogEditCategory from './DialogEditCategory.vue';
import Delete from './Delete.vue';
export default {
    components: {
        DialogEditCategory,
        Delete,

    },
    props: ["category"],
    emits: ["update-category","delete-category"],
    data() {
        return {
            showDialog: false,
            showEdit: false,
            showDelete:false,
            dataUpdate: "",
            enterName: "",
            categoryInfo: "",
            cate_id:"",
        }
    },
    methods: {
        updateCategory(id, category, hide) {
            this.showEdit = hide;
            let newUpdate = {
                categoryName: category
            }
            this.$emit('update-category', id, newUpdate);
        },
        cancel() {
            this.showEdit = false;
        },
        ShowDilogEdit(category) {
            this.showEdit = true;
            this.categoryInfo = category;
        },

        ShowDilogDelete(category) {
            this.showDelete= true;
            this.categoryInfo = category;
        },
        cencelFrom() {
            this.showDelete = false;
        },
        removeCategory(id){
            this.$emit('delete-category', id);
        }
    },

};
</script>

<style scoped>
.card {
    padding: 10px;
    background: rgb(255, 255, 255);
    box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
    border: none;
    border-radius: 7px;
    margin-top: 2px;
}

.title-area {
    width: 70%;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    padding: 5px;
}

.button-area {
    width: 30%;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
}

.button-area>button {
    width: 55%;
    font-size: 13px;
    height: 25px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.button-area>.edit {
    color: #5c5cbc;
    background: none;
    border-width: 1px;
    border-color: #5c5cbc;
}

.button-area>.edit:hover {
    background: #5c5cbc;
    color: white;
}

#overflowTest {
    background: #4CAF50;
    color: white;
    padding: 15px;
    width: 50%;
    height: 100px;
    overflow: scroll;
    border: 1px solid #ccc;
}
</style>

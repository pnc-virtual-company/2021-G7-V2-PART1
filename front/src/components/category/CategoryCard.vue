<template>
    <div class="card m-3">
        <div class="row" style="height:10vh" >
            <div class="image-area">
                <img src="" alt="">
            </div>
            <div class="title-area">
                <h5>{{category.categoryName}}</h5>
            </div>
            <div class="button-area">
                <button type="button" class="delete btn btn-danger" data-toggle="modal" data-target="#modal_del" @click="remove" >Delete</button>
                   <button type="button" class="edit btn" data-toggle="modal" data-target="#exampleModal"  >Edit</button> 
                   
                <!-- <button type="button" class="edit btn" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" @click="updateCategory(category.categoryName, category.id)" >Edit</button>  -->

            </div>
        </div>
        


    </div>
    
</template>

<script>

export default {
    props: ["category"],
    emits: ["remove-category"],
    // emits: ["remove-category", "updateCTR"],

    data(){
        return {
            
        }
    },
    methods: {
        remove() {
            this.$emit("remove-category", this.category.id);
        },

        // updateCategory(ctrName, ctrID){
        //     this.$emit("updateCTR", ctrName, ctrID)
        // }
    
    },
};
</script>

<style scoped>
    .card{
        padding: 10px;
        background: rgb(255, 255, 255);
        box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;
        border: none;
    }
    .image-area{
        width: 20%;
        box-sizing: border-box;
        background:gray;
        box-sizing: border-box;
        
    }
    .image-area > img {
        width: 100%;
        height: 100%;
        /* background: violet; */
        
    }
    .title-area{
        width: 50%;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        padding: 5px;
    }
    .button-area{
        width: 30%;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
    }
    .button-area > button{
        width: 55%;
        font-size: 13px;
        height: 25px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .button-area > .edit{
        color: #5c5cbc;
        background: none;
        border-width: 1px;
        border-color: #5c5cbc;
    }
    .button-area > .edit:hover{
        background: #5c5cbc;
        color: white;
    }
</style>

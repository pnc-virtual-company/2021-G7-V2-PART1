<template>
    <div class="card m-3">
        <div class="row" style="height:10vh">
            <div class="title-area">
                <h4>{{category.categoryName}}</h4>
            </div>
            <div class="button-area">
                <button type="button" class="delete btn btn-danger" data-toggle="modal" data-target="#modal_del">Delete</button>
                <button type="button" class="edit btn" >Edit</button>
            </div>
        </div>
        <!-- delete dialog -->
        <div class="modal fade" id="modal_del">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Are you sure?</h4>
                  <button type="button" class="close" data-dismiss="modal" style="border:none; outline:none; box-shadow:none;">&times;</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" style="border:none; outline:none; box-shadow:none; background: #191262;" data-dismiss="modal">Cancel</button>
                    <button type="button" v-on:click="remove" class="btn btn-primary" style="border:none; outline:none; box-shadow:none; background: #dc4e41;" data-dismiss="modal">Yes</button>
                </div>
              </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    props: ["category"],
    emits: ["remove-category"],

    data(){
        return {

        }
    },
    methods: {
        remove() {
            this.$emit("remove-category", this.category.id);
        },

    
    },
};
</script>

<style scoped>
    .card{
        padding: 10px;
        background: rgb(255, 255, 255);
        box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
        border: none;
        border-radius: 7px;
    }  
    .title-area{
        width: 70%;
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

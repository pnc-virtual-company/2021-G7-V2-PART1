<template>
    <div
        class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">
                    <b>Create Category of Event</b>
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#">
                    <div class="form-group">
                        <label for="category-name" class="col-form-label">Category name</label>
                        <div>
                            <label for="" class="fa-3x d-flex">
                                <input type="text" class="form-control w-65" id="category-name" v-model="enterName"  />
                            
                                <i class="fa fa-list-alt" aria-hidden="true" style="color: red" ></i>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="hvr-icon-forward">
                            <label for="message-text" class="col-form-label">Choose Image</label><br />
                        </div>
                        <label for="img" class="fa-3x">
                            <i class="fas fa-images" style="color: red"></i>
                        </label>
                        <input type="file" id="img" style="display: none; visibility: none" />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" @click="SubmitCategory">Add</button>

                <!-- <button type="button" class="btn btn-danger" data-dismiss="modal" @click="SubmitUpdateCategory">update</button> -->
             
                

            </div>
        </div>
        </div>
    </div>
</template>

<script>

export default {
    emits:["add-category"],

    data(){
        return {
            enterName:'',
        }
    },
    methods:{
        SubmitCategory(){
            this.$emit("add-category",this.enterName);
            this.enterName='';
        }
        // SubmitUpdateCategory(){
        //     this.$emit("@edit-category",this.enterName);
        // }
    },
    mounted() {
        // console.log(this.ctrName, this.ctrId)
        // this.enterName = this.ctrName
    },

}
</script>

<style>

</style>
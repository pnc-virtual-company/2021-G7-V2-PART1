<template>
    
    <section>
        
        <div class="contain row">
            <div class="col-9">
                <div class="row"></div>
                <div class="row">
                    <div class="col-3">

                    </div>
                    <div class="col-6">

                    </div>
                    
                    <div class="col-3 mt-5">
                        
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add Category +</button>

                        <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog " role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                               
                                <h3 class="modal-title" id="exampleModalLabel"><b>Create Category of Event</b></h3>
                               
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                <div class="form-group">
                                    <label for="category-name" class="col-form-label">Category name</label>
                                    <div>
                                        <label for="" class="fa-3x d-flex">
                                            <input type="text" class="form-control w-65" id="category-name">

                                            <i class="fa fa-list-alt" aria-hidden="true" style="color:red"></i>
                                        </label>
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <div class="hvr-icon-forward">
                                       <label for="message-text" class="col-form-label " >Choose Image</label> <br>

                                    </div>
                                    <label for="img" class="fa-3x">
                                        <i class="fas fa-images" style="color:red"></i>
                                    </label>
                                    <input type="file" id="img" style="display:none ; visibility: none"> 
                                </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-danger">Add</button>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
</template>
<script>
export default {
    
}
</script>
<style scoped>
    .navbar{
        box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
    }
    .contain {
        width: 100%;
    }
    .btn-search {
        color: white;
        background: #5c5cbc;
    }
    .item > li{
        margin-right: 30px;
        color: #4D4D4D;
        font-size: 16px;
        padding: 10px 30px;
        display: block;
        width: 100%;
    }
    .item > li:hover{
        background: #DDEFFF;
        color: #0085FF;
        transition: 0.3s ease;
    }
    .item > li > i{
        font-size: 18px;
        margin-right: 30px;
    }
</style>
<template>
    <div class="row">
            
            <div class="col text-center">
                <div class="col">
                    <h1>Category</h1>
                </div>
                <div class="col">
                    <p>Here's all cotegories of evet, you also ca create it</p>
                </div>
                <div class="card">
                    <div class="row">
                        <div class="col">
                            <i class="fa fa-user-circle-o m-4 " style="font-size:20px"></i>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <p>Name: </p>
                                </div>
                               
                            </div>  
                        </div>
                        <div class="col">
                            <div class="row space-bettween">
                                <div class="col">
                                    <button>Delete</button>
                                    <button>Edit</button>
                                </div>
                                <div class="col">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
</template>
<script>
    export default{
        props: ["category"]
    }

</script>
<style>

</style>
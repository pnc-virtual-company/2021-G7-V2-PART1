<template>
<div class="overlay">
    <div class="dialog">
        <div class="content">
            <h2>Do you want to delete?</h2>
        </div>
        <hr />
        <div class="footer">
            <button @click="CencelFormDelete" class="cancel">Cancel</button>
            <button @click="remove" class="confirm">Delete</button>
        </div>
    </div>
</div>
</template>
<script>
export default({
    props:["dataCategory"],
    emits:[ 'cancel-form','remove-category'],
    methods:{
        CencelFormDelete(){
            this.$emit('cancel-form', false);
        },
        remove() {
            this.$emit("remove-category", this.dataCategory.id);
        },
    },
})
</script>
<style scoped>
    h2{
        font-size: 20px;
        text-align:center;
    }
    .dialog {
        background-color: rgba(255, 255, 255, var(--tw-bg-opacity));
        border-radius: 0.75rem;
        margin-left: auto;
        margin-right: auto;
    
    }
    .overlay {
        height: 25%;
        position: fixed;
        background: #fff;
        box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
        top: 5px;
        right: 0px;
        bottom: 0px;
        left: 35%;
        width: 30%;
        z-index: 10;
        border-radius: 10px;
    }
    .content {
        padding-left: 0.75rem;
        padding-right: 0.75rem;
        padding-top: 1rem;
        padding-bottom: 1rem;
    }
    .footer {
        display: flex;
        justify-content: flex-end;
        padding: 5px;
    }
    .cancel,
    .confirm{
        border: none;
        outline: none;
        padding: 3px 10px;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
    }
    .cancel {
        margin-right: 3%;
        background: rgba(0, 0, 255, 0.719);
    } 
    .confirm {
        
        background: rgba(0, 0, 255, 0.719);
    } 
    
</style>



 
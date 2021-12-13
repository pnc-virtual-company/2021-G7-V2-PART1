<template>
    <section class="p-0">
    <nav class="navbar navbar-light bg-light">
        <form class="input-group col-5 m-auto">
            <input type="search" class="form-control bg-white" placeholder="Search" >
            <div class="input-group-prepend">
                <button class="btn-search input-group-text border-0 rounded-right">
                    <i class="fa fa-search text-light" aria-hidden="true"></i>
                </button>
            </div>
        </form>
    </nav>
    <div class="title mt-2">
        <h3>Home</h3>
        <p>Collection of all eventsw</p>
    </div>
    <!-- Card event -->
   
    <div class="eventContainer">
        <my-event-card v-for="event of this.listMyEvent" :key="event.id" :event="event"></my-event-card>
    </div>
    </section>
</template>
<script>
import MyEventCard from '../components/myEvent/MyEventCard.vue'
import axios from "../axios-request.js";


export default {
    
    components:{
        MyEventCard,
    },
    
    data() {
        return {
            isJoined: false,
            listMyEvent:[],
        }
    },
    mounted() {
       axios.get('/events')
                .then((response) => {
                    this.listMyEvent = response.data
                    this.listMyEvent.filter(value=>{
                        console.log(value)
                        value.id !== parseInt(localStorage.getItem("userID"))
                    })
                    
                })
    },
}
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
    .card{
        border: none;
        background: rgb(250, 250, 250);
        display: flex;
        justify-content: space-around;
        align-items: center; 
        height: 30vh;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
        margin-bottom: 4vh;
    }
    .image-side {
        width: 27vh;
        height: 27vh;
        
    }
    .image-side > img {
        width: 100%;
    }
    .text-content {
        width: 38vh;
        height: 27vh;
    }
    .text-content > .title {
        width: 100%;
        height: 5vh;
        text-align: left;
        padding: 5px;
    }
    .text-content > .date-time {
        padding: 5px;
        width: 100%;
        height: 15vh;
    }
    .text-content > .date-time > p {
        padding: 0;
        margin: 0;
    }
    .text-content > .foot-card {
        width: 100%;
        height: 7vh;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 5px;
    }
    .text-content > .foot-card > .number {
        width: 40%;
    }
    .text-content > .foot-card > .btn {
        width: 60%;
        display: flex;
        justify-content: flex-end;
    }
    .text-content > .foot-card > .btn > button {
        width: 10vh;
        height: 5vh;
        margin-left: 5px;
        display: flex;
        justify-content: center;
        align-items: center;

    }
</style>
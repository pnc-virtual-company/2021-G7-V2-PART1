<template>
<section class="p-0">
    <!-- button search category -->
    <nav class="navbar navbar-light bg-light">
        <form class="input-group col-5 m-auto" @submit.prevent="search">
            <input type="search" class="form-control bg-white" placeholder="Search"  v-model="search">
            <div class="input-group-prepend">
                <button class="btn-search input-group-text border-0 rounded-right">
                    <i class="fa fa-search text-light" aria-hidden="true"></i>
                </button>
            </div>
        </form>
    </nav>
    <div class="title mt-2">
        <h3> My Events </h3>
        <p> Collect all events from your post </p>
    </div>
    <div class="myEvent">
        <ul>
            <my-event-card 
                
            ></my-event-card>
        </ul>
    </div>
  </section>
    
</template>

<script>
    import axios from "axios";
    import MyEventCard from "../components/myEvent/MyEventCard.vue";

    export default {
        components: { MyEventCard },
        data() {
            return {
                listMyEvent:[],
                search: '',
            };
        },
        methods: {
        // -----------get all Event -----------------
            getListEvent(){
                axios.get('/events')
                .then((response)=>{
                    this.listMyEvent=response.data;
                    console.log(response.data)
                })
            },
            deleteContact(eventId) {
                axios
                    .delete("/events/" + eventId)
                    .then(() => {
                        this.listMyEvent = this.listMyEvent.filter((myEvent) => myEvent.id !== eventId);
                });
            },
        },
        

        //-----------------reload page--------------------------
        mounted() {
            this.getListEvent();
        },

    }
</script>

<style>
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
    
</style>
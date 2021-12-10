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
    </nav>
    <div class="title mt-2">
        <h3> My Events </h3>
        <p> Collect all events from your post </p>
    </div>
    <div class="create-event">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" id="create-event" data-toggle="modal" data-target="#exampleModal">+</button>
        <my-event-form @add-event="addNewEvent"></my-event-form> <!-- Modal form create event -->
    </div>
    <div class="myEvent">
        <my-event-card v-for="event of listMyEvent" :key="event.id" :event="event"></my-event-card>
    </div>
</section>
</template>

<script>
import axios from "../axios-request.js";
import MyEventCard from "../components/myEvent/MyEventCard.vue";
import MyEventForm from '../components/myEvent/MyEventForm.vue';

export default {
    components: {
        MyEventCard,
        MyEventForm
    },
    data() {
        return {
            listMyEvent: [],
            search: '',
        };
    },
    methods: {
        // -----------get all Event -----------------
        getListEvent() {
            axios.get('/events')
                .then((response) => {
                    this.listMyEvent = response.data;
                })
        },
        addNewEvent(
            eventName,
            starteDate,
            endDate,
            city,
            country,
            participants,
            description,
            image      
        ) {
            
            const newEvent = new FormData();
            newEvent.append('eventName', eventName);
            newEvent.append('start_date', starteDate);
            newEvent.append('end_date', endDate);
            newEvent.append('city', city);
            newEvent.append('country', country);
            newEvent.append('participants', participants);
            newEvent.append('description', description);
            newEvent.append('image', image);
               
            
            axios.post('/events', newEvent)
                .then((response) => {
                    console.log(response.data);
                    this.getListEvent();
                    console.log("created");
                })
        },
    },
    //-----------------reload page--------------------------
    mounted() {
        this.getListEvent();
    },
}
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

#create-event {
    margin-left: 90%;
    justify-content: end;
    background: #fd3300;
    border-radius: 20px;
}
</style>

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
        <div class="row m-0 p-2">
                <my-event-card 
                    v-for="myEvent of listMyEvent"
                    :key="myEvent.id"  
                    :myEvent="myEvent" 
                    @remove-myevent="removeMyEvent"
                ></my-event-card>
        </div>
        <div class="create-event">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" id="create-event" data-toggle="modal" data-target="#exampleModal">+</button>
            <my-event-form  @add-event="addNewEvent"></my-event-form> <!-- Modal form create event -->
        </div>
    </section>
    
</template>

<script>
    import axios from "../axios-request.js";
    import MyEventCard from "../components/myEvent/MyEventCard.vue";
    import MyEventForm from "../components/myEvent/MyEventForm.vue";

export default {
    components: {
        MyEventCard,
        MyEventForm,
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
            removeMyEvent(id) {
                axios
                    .delete("/events/" + id)
                    .then(() => {
                        this.listMyEvent = this.listMyEvent.filter((myEvent) => myEvent.id !== id);
                        console.log(id);
                });
            },
        },
        addNewEvent(
            eventName,
            starteDate,
            endDate,
            city,
            country,
            participants,
            description,
            // image,        
        ) {
            const newEvent = {
                eventName: eventName,
                start_date: starteDate,
                end_date: endDate,
                city: city,
                country: country,
                participants: participants,
                description: description,
                // image: image,
            }
            console.log(newEvent);
            axios.post('/events', newEvent)
                .then((response) => {
                    this.listMyEvent.unshift(response.data)
                    console.log(this.listMyEvent)
                })
        },
            //-----------------reload page--------------------------

        mounted() {
        this.getListEvent();
    },
};
    
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

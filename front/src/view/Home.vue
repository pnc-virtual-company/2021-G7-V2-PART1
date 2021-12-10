<template>
<section class="p-0">
    <nav class="navbar navbar-light bg-light">
        <form class="input-group col-5 m-auto">
            <input type="search" class="form-control bg-white" placeholder="Search">
            <div class="input-group-prepend">
                <button class="btn-search input-group-text border-0 rounded-right btn btn-primary" >
                    <i class="fa fa-search text-light" aria-hidden="true"></i>
                </button>
            </div>
        </form>
    </nav>
    <div class="title mt-2">
        <h3>Home</h3>
        <p>Welcome to all events where you can join activities you want.</p>
    </div>
    <!---------------- list card------------------>
    <div class="event-container ">
        <div class="row justify-content-around">
            <div class="card col-5">
                <my-event-card v-for="event of listMyEvent" :key="event.id" :event="event" class="my-event-card mt-2 p-2">
                    <div class="inside-card d-flex">
                        <div class="img">
                            <img src="../assets/event.png" alt="">
                        </div>
                        <div class="validation-display ml-3 mt-4">
                            <div class="myEvent">
                                <h4 class="text-primary">{{event.eventName}}</h4>
                                <h6>Start Date : {{event.start_date}}</h6>
                                <h6>End Date : {{event.end_date}}</h6>
                                <h6>Creator : No name</h6>
                            </div>
                            <button class="btn btn-danger .hvr-pulse">0/15 Joined</button>

                        </div>

                    </div>
                    <div class="btn-join">
                        <button class="btn btn-primary" v-on:click="isClicked = !isClicked" v-if="isClicked" type="button"  data-toggle="modal" data-target="#exampleModal">Join<i class="far fa-comment-alt-medical ml-1 w-10"></i></button>
                    </div>
                    <div class="btn-joined">
                        <button class="btn btn-success" v-if="!isClicked">Joined<i class="fas fa-check ml-1"></i></button>
                    </div>
                    <!-- Button trigger modal -->
                    

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">You have joined this event</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </my-event-card>
            </div>

        </div>
    </div>
</section>
</template>

<script>
import axios from "../axios-request.js";
import MyEventCard from "../components/myEvent/MyEventCard.vue"

export default {
    // props: ['category']
    component: MyEventCard,

    data() {
        return {
            listMyEvent: [],
            isClicked: true,
        }
    },
    methods: {
        getListEvent() {
            axios.get('/events')
                .then((response) => {
                    this.listMyEvent = response.data;
                    console.log(response.data);
                })
        },

    },
    mounted() {
        return this.getListEvent();
    },
}
</script>

<style scoped>
body {
    font-family: Arial, Helvetica, sans-serif;
}
.event-container{
    float: left;
}
.title {
    text-align: center;
}

.event-container .row .card .my-event-card{
    box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
    height: 30vh;
    width: 500px;
}
/* .row{
    float: left;
} */
.event-container .row .card{
    border: none;
    display: grid;
    grid-template-columns: repeat(2,1fr);
    grid-gap: 50px;
    margin-right: 30%;
    /* box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3;
    width: 40% */
}
.event-container .row .card .my-event-card:hover{
    box-shadow: 0 13px 29px 0 rgba(0,0,0,0.2);
}
.event-container .row .card .btn-join {
    display: flex;
    justify-content: flex-end;
}

.col-5 img {
    width: 230px;
    height: 20vh;
    margin-top: 30px;
    border-radius: 10px;
}

.card .btn-joined {
    display: flex;
    justify-content: flex-end;
}

</style>

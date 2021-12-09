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
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Create New Event</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="span-clos" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-6 m-0">
                                <label for="inputTitle" class="title mb-0">Name</label>
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0" id="inputTitle" v-model="eventName">

                                    <div class="input-group-prepend">
                                        <span id="span" class="input-group-text border-0 rounded-right">
                                            <i class="fa fa-envelope text-light" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                                <small>{{messageError.eventName}}</small>
                            </div>
                            <div class="form-group col-md-6  m-0">
                                <label for="inputImage" class="choose-image mb-0">Choose Image</label>
                                <div class="input-group">
                                    <input type="file" class="form-control bg-light border-0 mb-3" id="inputImage">
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-0">
                            <label class="description mb-0">Description</label>
                            <textarea class="form-control bg-light border-0 mb-3" id="inputTexarea" v-model="description"></textarea>
                        </div>
                        <div class="form-group m-0">
                            <label for="inputStartDate" class="stat-date mb-0">Start date</label>
                            <div class="input-group mb-3">
                                <input type="datetime-local" class="form-control bg-light border-0" id="inputStartDate" v-model="start_date">
                            </div>
                        </div>
                        <div class="form-group m-0">
                            <label for="inputEndDate" class="end-date mb-0">End date</label>
                            <div class="input-group  mb-3">
                                <input type="datetime-local" class="form-control bg-light border-0" id="inputEndDate" v-model="end_date">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 m-0">
                                <label for="inputParticipant" class="participant mb-0">Participants</label>
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0" id="inputParticipant" v-model="participants">
                                    <div class="input-group-prepend">
                                        <span id="span" class="input-group-text border-0 rounded-right">
                                            <i class="fa fa-group text-light" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 m-0">
                                <label for="chooseCity" class="country mb-0">Category</label>
                                <select name="category" id="chooseCity" class="select-city bg-light mb-3" v-model="category">
                                    <option>Education</option>
                                    <option>Music</option>
                                    <option>Dance</option>
                                </select>
                            </div>
                            <!--  -->
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 m-0">
                                <label for="chooseCountry" class="country mb-0">Country</label>
                                <select name="country" id="chooseCountry" class="select-city bg-light mb-3" v-model="country">
                                    <option>Cambodia</option>
                                    <option>USA</option>
                                    <option>Frence</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 m-0">
                                <label for="chooseCity" class="city mb-0">City</label>
                                <select name="city" id="chooseCity" class="select-city bg-light mb-3" v-model="city">
                                    <option>Phnom Penh</option>
                                    <option>Don Kav</option>
                                    <option>Soung</option>
                                </select>
                                <small class="text-danger">{{messageError.city}}</small>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn w-100" @click="addNewEvent(eventName, start_date, end_date, city, country, participants, category, description)" data-dismiss="modal">CREATE</button>
                        </div>
                          <!-- data-dismiss="modal" -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="myEvent">
        <my-event-card v-for="event of listMyEvent" :key="event.id" :event="event"></my-event-card>
    </div>
</section>
</template>

<script>
import axios from "../axios-request.js";
import MyEventCard from "../components/myEvent/MyEventCard.vue";

export default {
    components: {
        MyEventCard
    },
    data() {
        return {
            listMyEvent: [],
            search: '',
            eventName: '',
            start_date: '',
            end_date: '',
            city: '',
            country: '',
            participants: '',
            category   : '',
            description: '',
            messageError: {
                eventName: null,
                start_date: null,
                end_date: null,
                city: null,
                country: null,
                participants: null,
                category   : null,
                description: null
            },
            // image
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
            start_date,
            end_date,
            city,
            country,
            participants,
            category,
            description,
            // image,        
        ) {
            const newEvent = {
                eventName: eventName,
                start_date: start_date,
                end_date: end_date,
                city: city,
                country: country,
                participants: participants,
                category   : category,
                description: description,
                // image: image,
            }
            axios.post('/events', newEvent)
                .then((response) => {
                    if (eventName !== '' & start_date !== '' & end_date !== '' & city !== '' & country !== '' & participants !== '' & category !== '' & description !== '') {
                        this.listMyEvent.unshift(response.data)
                    } else {
                        alert("Your infor not complete!")
                    }
                }).catch(error => {
                    let errorStatus = error.response.data;
                    if (errorStatus.eventName !== null) {
                        this.messageError.eventName = "Name must be input";
                    }
                    if (errorStatus.start_date !== null) {
                        start_date = "Startdate must be input";
                    }
                    if (errorStatus.end_date !== null) {
                        end_date = "Enddate must be input";
                    }
                    if (errorStatus.city !== null) {
                        city = "City must be input";
                    }
                    if (errorStatus.country !== null) {
                        country = "Country mush be input";
                    }
                    if (errorStatus.participants !== null) {
                        participants = "Participants must be input";
                    }
                    if (errorStatus.category !== null) {
                        category = "Category must be input";
                    }
                    if (errorStatus.description !== null) {
                        description = "Description must be input";
                    }
                })
        },
    },
    //-----------------reload page--------------------------
    mounted() {
        this.getListEvent();
    },
}
</script>

<style scoped>
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

#span {
    background: #fd3300;
}

button {
    background: #3a3a3d;
    color: white;
}

.select-city {
    height: 6vh;
    width: 100%;
}

.fa-group {
    font-size: 13px;
}

.modal-title {
    margin-left: auto;
    margin-right: auto;
}
</style>

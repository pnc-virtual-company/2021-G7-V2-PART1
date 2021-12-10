<template>
<section>
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
                            <label for="inputTitle" class="title mb-0">Name category</label>
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0" id="inputTitle" v-model="eventName">
                                <div class="input-group-prepend">
                                    <span id="span" class="input-group-text border-0 rounded-right">
                                        <i class="fa fa-envelope text-light" aria-hidden="true"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6  m-0">
                            <label for="inputImage" class="choose-image mb-0">Choose Image</label>
                            <div class="input-group">
                                <input type="file" class="form-control bg-light border-0 mb-3" id="inputImage" @change="onFileSelected">
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
                            <select name="category" id="chooseCity" class="select-city bg-light mb-3" v-model="category" @click="getCategoryData">
                                <option v-for="categorys of category_data" :key="categorys.id">{{categorys.categoryName}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 m-0">
                            <label for="chooseCountry" class="country mb-0">Country</label>
                            <select name="country" id="chooseCountry" class="select-city bg-light mb-3" v-model="countrys">
                                <option v-for="allCountrys of country_data" :key="allCountrys">{{allCountrys}}</option>
                                <!-- country_data -->
                            </select>
                        </div>
                        <div class="form-group col-md-6 m-0">
                            <label for="chooseCity" class="city mb-0">City</label>
                            <select name="city" id="chooseCity" class="select-city bg-light mb-3" v-model="city">
                                <option v-for="city of countries[countrys]" :key="city">{{city}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn w-100" data-dismiss="modal" @click="submitEvent">CREATE</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</template>

<script>
import axios from "../../axios-request.js";
    export default {
        
        emits: ["add-event"],
        data() {
            return {
                eventName: null,
                start_date: null,
                end_date: null,
                city: null,
                countrys: null,
                participants: null,
                category: null,
                description: null,
                image: null,
                category_data : [],
                country_data  : [],
                countries: []
            }
        },
        methods: {
            onFileSelected(event) {
                this.image = event.target.files[0];
            },
            submitEvent() {
                var date1 = this.start_date;
                var date2 = this.end_date;
                console.log(this.countrys);
                if( this.eventName !== null & this.start_date!== null & this.end_date  !== null & this.city !== null &
                    this.countrys   !== null & this.participants!== null & this.category  !== null & this.description !== null &
                    this.image     !== null & date1 < date2
                ) { this.$emit("add-event", this.eventName, this.start_date, this.end_date, this.city, this.countrys, this.participants,
                        this.category, this.description, this.image );
                }else if(
                    this.eventName    === null & 
                    this.start_date   === null &
                    this.end_date     === null &
                    this.city         === null &
                    this.countrys     === null &
                    this.participants === null &
                    this.category     === null &
                    this.description  === null & 
                    this.image        === null) { 
                        alert("You need to fill all input !")
                }else if( this.eventName === null){
                    alert("EventName cannot null")
                }else if( date1 > date2 ) {
                    alert("Second time cannot less than first time !")
                }else if( this.city === null){
                    alert("City cannot null !")
                }else if( this.countrys === null){
                    alert("Country cannot null !")
                }else if( this.participants === null){
                    alert("Participants cannot null !")
                }else if( this.category === null){
                    alert("Category cannot null !")
                }else if( this.description === null){
                    alert("Description cannot null !")
                }else if( this.image === null){
                    alert("Image cannot null !")
                }
                // clear data 
                this.eventName        = null,
                this.start_date   = null,
                this.end_date     = null,
                this.city         = null,
                this.countrys      = null,
                this.participants = null,
                this.category     = null,
                this.description  = null,
                this.image        = null
            },
            getcountryData(){
                axios.get('/countries')
                .then((res)=> {          
                    this.countries = res.data
                    for (let country in this.countries) {
                        this.country_data.push(country)
                    }
                })
            }, 
            TestCity(){
                console.log("Show"+ this.city)
            },
            TestCoutry(){
                console.log("Show"+this.countrys)
            }
        },
        mounted() {
             axios.get('/categories')
                    .then((response) => {
                        this.listCategory = response.data;
                        this.category_data=response.data;
                    })
            // GET COUNTRY FROM BACKEND
            axios.get('/countries')
            .then((res)=> {          
                 
                this.countries = res.data
                for (let country in this.countries) {
                    this.country_data.push(country)
                }
            })
        },
    }
</script>

<style scoped>
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

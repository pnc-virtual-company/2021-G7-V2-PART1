<template>
<section>
    <div class="row m-0 p-2">
        <div class="col-6 m-auto">
            <base-dialog v-if="dialogDisplayed" :title="dialogTitle" @close="closeDialog">
                <div>
                    <strong> {{dialogTextFile}} </strong>
                </div>
                <form @submit.prevent="submitData" v-if= 'dialogForm'>    
                    <div class="modal-body">
                            <div class="form-row">
                                <div class="form-group col-md-6 m-0">
                                    <label for="inputTitle" class="title mb-0">Name Event</label>
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
                    </div>
                </form>
                <template #actions>
                    <base-button @click="onConfirm">CANCEL</base-button>
                    <base-button v-if="dialogText==='delete'"  @click="remove">{{ dialogButtton }}</base-button>
                    <base-button v-if="dialogText==='edit'"  @click="onConfirm">{{ dialogButtton }}</base-button>
                </template>
            </base-dialog>
            <div class="card row">
                <div class="image-side">
                    <img :src="url + event.image" alt="">
                </div>
                <div class="text-content">
                    <div class="title">
                        <h5 class="card-title">{{event.eventName}}</h5>
                    </div>
                    <div class="date-time">
                        <small>Start Date: {{event.start_date}} </small><br>
                        <small>End   Date: {{event.end_date}}  </small><br>
                        <small>City  Name: {{event.city}} </small><br>
                        <small>Country   : {{event.country}} </small>
                    </div>
                    <div class="foot-card">
                        <div class="number">
                            <p></p>
                        </div>
                        <div class="btn">
                            <div class="myEventContainer" v-if="isClicked" v-on:click="isClicked != isClicked">
                                <button @click="showEditRessource" type="submit" class="btn btn-outline-primary m-2">Edit</button>
                                <button @click="showDeleteRessource" type="submit" class="btn btn-danger">Delete</button>
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
import axios from "../../axios-request.js";
export default {
    props: ['event'],
    emits: ["remove-myevent"],
    data() {
        return {
                dialogMode: 'delete',
                dialogDisplayed: false,
                dialogForm: false,
                dialogTextFile: '',
                dialogText: '',
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
                countries: [],
                isClicked: true,
            url: "http://127.0.0.1:8000/storage/images/",
        };
    },
    computed: {
        dialogTitle() {
            return this.dialogMode === 'delete' ? 'Remove' : 'Edite RESSOURCE';
        },
        dialogButtton() {
            return this.dialogMode === 'edit' ? 'EDIT' : 'Remove';
        },
    },
    methods: {
        remove() {
            this.$emit("remove-myevent", this.event.id);
        },
        
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
            },getcountryData(){
                axios.get('/countries')
                .then((res)=> {          
                    this.countries = res.data
                    for (let country in this.countries) {
                        this.country_data.push(country)
                    }
                })
            }, 

        closeDialog() {
            this.dialogDisplayed = false;
        },
        showEditRessource() {
            this.dialogTextFile = '';
            this.dialogText = 'edit';
            this.dialogMode = 'edit';
            this.dialogDisplayed = true;
            this.dialogForm = true;
        },
        showDeleteRessource() {
            this.dialogTextFile = 'Do you want to remove the event? (Y?N)';
            this.dialogText = 'delete';
            this.dialogMode = 'delete';
            this.dialogDisplayed = true;
            this.dialogForm = false;
        },
        onConfirm() {
            if (this.dialogMode === 'delete') {
                console.log(' deleted ');
            } else if (this.dialogMode === 'edit') {
                console.log(' edited ');
            }
            this.closeDialog();
        },
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
};
</script>

<style scoped>
.right-main-button {
    float: right;
    margin-right: 2rem;
}

.card {
    border: none;
    display: flex;
    justify-content: space-around;
    align-items: center;
    height: 30vh;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
}

.image-side {
    width: 27vh;
    height: 27vh;
    background: rgb(199, 199, 199);
}

.image-side>img {
    width: 100%;
    height: 100%;
}

.text-content {
    width: 50vh;
    height: 27vh;
}

.text-content>.title {
    width: 100%;
    height: 5vh;
    text-align: left;
    padding: 5px;
}

.text-content>.date-time {
    padding: 5px;
    width: 100%;
    height: 15vh;
}

.text-content>.date-time>p {
    padding: 0;
    margin: 0;
}

.text-content>.foot-card {
    width: 100%;
    height: 7vh;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 5px;
}

.text-content>.foot-card>.number {
    width: 40%;
}

.text-content>.foot-card>.btn {
    width: 60%;
    display: flex;
    justify-content: flex-end;
}

.text-content>.foot-card>.btn>button {
    width: 13vh;
    margin-left: 5px;
}
</style>

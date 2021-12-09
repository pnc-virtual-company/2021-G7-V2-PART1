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
                            <label for="inputTitle" class="title mb-0">Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0" id="inputTitle" v-model="eventName" required>
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
                    <div class="form-group m-0">
                        <label for="inputParticipant" class="participant mb-0">Participants</label>
                        <div class="input-group">
                            <input type="number" class="form-control bg-light border-0" id="inputParticipant" v-model="participants">
                            <div class="input-group-prepend">
                                <span id="span" class="input-group-text border-0 rounded-right">
                                    <i class="fa fa-group text-light" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
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
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn w-100" @click="submitEvent" data-dismiss="modal">CREATE</button>
                         
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</template>

<script>
export default {
    emits: ["add-event"],
    data() {
        return {
            eventName: '',
            start_date: '',
            end_date: '',
            city: '',
            country: '',
            participants: '',
            description: '',
            // image
        }
    },
    methods: {
        submitEvent() {
            var date1 = this.start_date
            var date2 = this.end_date
            if (date1 < date2) {
                this.$emit("add-event",
                    this.eventName,
                    this.start_date,
                    this.end_date,
                    this.city,
                    this.country,
                    this.participants,
                    this.description,
                    console.log(this.eventName)
                    );
                    // clear data 
                    this.eventName  = '';
                    this.start_date = '';
                    this.end_date   = '';
                    this.city       = '';
                    this.country    = '';
                    this.participants = '';
                    this.description  = '';
                
            } else if (date1 > date2) {
                alert("Can not create event! Please Check you time again!");
            } 
        }
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

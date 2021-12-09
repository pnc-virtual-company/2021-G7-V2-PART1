<template>
    <div class="col-6 m-auto">
         <base-dialog v-if="dialogDisplayed" :title="dialogTitle" @close="closeDialog">
            <div>
                <strong> {{dialogTextFile}} </strong>
            </div>
            <form @submit.prevent="submitData" v-if= 'dialogForm'>
                <div class="modal-content">
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
                                <option></option>
                                <option>Cambodia</option>
                                <option>USA</option>
                                <option>Frence</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 m-0">
                            <label for="chooseCity" class="city mb-0">City</label>
                            <select name="city" id="chooseCity" class="select-city bg-light mb-3" v-model="city">
                                <option></option>
                                <option>Phnom Penh</option>
                                <option>Don Kav</option>
                                <option>Soung</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <template #actions>
                <base-button @click="onConfirm">CANCEL</base-button>
                <base-button v-if="dialogText==='delete'"  @click="removeEvent">{{ dialogButtton }}</base-button>
                <base-button v-if="dialogText==='edit'"  @click="onConfirm">{{ dialogButtton }}</base-button>
            </template>
        </base-dialog>
        <div class="card row">
            <div class="image-side">
                <img src="https://cdni.iconscout.com/illustration/premium/thumb/girl-student-studying-with-book-3028092-2532630.png" alt="">
            </div>
            <div class="text-content">
                <div class="title">
                    <h5 class="card-title"> {{myEvent.eventName}} </h5>
                </div>
                <div class="date-time">
                    <small>Start  date: {{myEvent.start_date}}</small><br>
                    <small>End    Date: {{myEvent.end_date}} </small><br>
                    <small>City   Name: {{myEvent.city}} </small><br>
                    <small>Country Name: {{myEvent.country}}</small>
                    <p>  0/{{myEvent.participants}} People </p>
                    
                </div>
                <div class="foot-card">
                    <div class="number">
                    </div>
                    <div class="btn">
                        <button  @click="showEditRessource" type="submit" class="btn btn-outline-primary" >Edit</button>
                        <button  @click="showDeleteRessource" type="submit" class="btn btn-danger" >Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</template>
<script>
export default {
    props: ['myEvent'],
    emits: ['remove-myevent', 'edit-myevent'],

    data() {
        return {
            dialogMode: 'delete',
            dialogDisplayed: false, 
            dialogForm: false,
            dialogTextFile: '',
            dialogText: '',
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
        removeEvent() {
            this.$emit("remove-myevent", this.myEvent.id);
           
        }, 
        editEvent() {

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
};
</script>

<style scoped>

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
/* Edite form style */
#span {
    background: #fd3300;
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

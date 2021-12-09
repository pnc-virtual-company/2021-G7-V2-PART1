<template>
    <div class="col-6 m-auto">
         <base-dialog v-if="dialogDisplayed" :title="dialogTitle" @close="closeDialog">
            <div>
                <strong> {{dialogTextFile}} </strong>
            </div>
            <form @submit.prevent="submitData" v-if= 'dialogForm'>
                <div>
                    <label>Name: </label>
                    <input type="text" v-model="enteredUsername" /> 
                </div>
                <textarea v-model="dialogTextField" id="description" name="description" rows="3" ref="descInput"></textarea>
                <div>
                    <label>Start Date </label>
                    <input type="date" v-model="enteredphone" />
                </div>
                <div>
                    <label>End Date </label>
                    <input type="date" v-model="enteredphone" />
                </div>
                <div>
                    <label>Start Time </label>
                    <input type="text" v-model="enteredemail" />
                </div>
                <div>
                    <label>End Time </label>
                    <input type="text" v-model="enteredemail" />
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
                    <small>End    Date: {{myEvent.start_time}} - {{myEvent.end_time}} </small><br>
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
    emits: ['remove-myevent'],
    data() {
        return {
            dialogMode: 'delete',
            dialogDisplayed: false, 
            dialogForm: false,
            dialogTextFile: '',
            dialogText: '',
            enteredUsername: '',
            enteredphone: '',
            enteredemail: '',
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
    justify-content: end;
}

.text-content>.foot-card>.btn>button {
    width: 13vh;
    margin-left: 5px;
}
</style>

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
                    <!-- form -->
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-6 m-0">
                                <label for="inputTitle" class="title mb-0">Title</label>
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0" id="inputTitle">
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
                            <textarea class="form-control bg-light border-0 mb-3" id="inputTexarea"></textarea>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 m-0">
                                <label for="inputStartDate" class="stat-date mb-0">Start date</label>
                                <div class="input-group">
                                    <input type="date" class="form-control bg-light border-0" id="inputStartDate">
                                    <div class="input-group-prepend">
                                        <span id="span" class="input-group-text border-0 rounded-right">
                                            <i class="fas fa-calendar-alt text-light" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 m-0">
                                <label for="inputEndDate" class="end-date mb-0">End date</label>
                                <div class="input-group mb-3">
                                    <input type="date" class="form-control bg-light border-0" id="inputEndDate">
                                    <div class="input-group-prepend">
                                        <span id="span" class="input-group-text border-0 rounded-right">
                                            <i class="fas fa-calendar-alt text-light" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 m-0">
                                <label for="inputStartTime" class="start-time mb-0">Start time</label>
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0" id="inputStartTime">
                                    <div class="input-group-prepend">
                                        <span id="span" class="input-group-text border-0 rounded-right">
                                            <i class="far fa-clock text-light " aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 m-0">
                                <label for="inputEndTime" class="end-time mb-0">Ent time</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control bg-light border-0" id="inputEndTime">
                                    <div class="input-group-prepend">
                                        <span id="span" class="input-group-text border-0 rounded-right">
                                            <i class="far fa-clock text-light" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 m-0">
                                <label for="inputParticipant" class="participant mb-0">Participants</label>
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0" id="inputParticipant">
                                    <div class="input-group-prepend">
                                        <span id="span" class="input-group-text border-0 rounded-right">
                                            <i class="fa fa-group text-light" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 m-0">
                                <label for="chooseCity" class="country mb-0">Category</label>
                                <select name="category" id="chooseCity" class="select-city bg-light mb-3">
                                    <option value="volvo"></option>
                                    <option value="saab">Education</option>
                                    <option value="opel">Music</option>
                                    <option value="audi">Dance</option>
                                </select>
                            </div>
                            <!--  -->
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 m-0">
                                <label for="chooseCountry" class="country mb-0">Country</label>
                                <select name="country" id="chooseCountry" class="select-city bg-light mb-3">
                                    <option value="volvo"></option>
                                    <option value="saab">Cambodia</option>
                                    <option value="opel">USA</option>
                                    <option value="audi">Frence</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 m-0">
                                <label for="chooseCity" class="city mb-0">City</label>
                                <select name="city" id="chooseCity" class="select-city bg-light mb-3">
                                    <option value="volvo"></option>
                                    <option value="saab">Phnom Penh</option>
                                    <option value="opel">Don Kav</option>
                                    <option value="audi">Soung</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn w-100" data-dismiss="modal">CREATE</button>
                        </div>
                    </div>
                    <!--  -->
                </div>
            </div>
        </div>
    </section>
</template>
<script>
export default ({
    setup() {
        
    },
})
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

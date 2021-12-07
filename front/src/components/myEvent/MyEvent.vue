<template>
<section>
    <div class="title mt-2">
        <h3>My Event</h3>
        <p>Collect all of your event that you have posted</p>
    </div>
    <!-- This is button create event -->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Create Event</button>
    <my-event-form></my-event-form> <!-- Relation form from button create  to file MyEventForm.vue-->
</section>
</template>

<script>
import MyEventForm from './MyEventForm.vue';
export default {
    components: {
        MyEventForm
    },
    methods: {
        // 
    },
}
</script>

<style scoped>
.title {
    text-align: center;
}
</style>

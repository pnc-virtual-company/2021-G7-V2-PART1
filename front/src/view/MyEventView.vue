<template>
  <section class="p-0">
    <!-- button search category -->
    <nav class="navbar navbar-light bg-light">
      <form class="input-group col-5 m-auto" @submit.prevent="search">
        <input
          type="search"
          class="form-control bg-white"
          placeholder="Search"
          v-model="search"
        />
        <div class="input-group-prepend">
          <button class="btn-search input-group-text border-0 rounded-right">
            <i class="fa fa-search text-light" aria-hidden="true"></i>
          </button>
        </div>
      </form>
      <h6 class="text-success">{{username}}</h6>
    </nav>
    <div class="title mt-2">
      <h3>My Events</h3>
      <p>Collect all events from your post</p>
    </div>
    <div class="create-event">
      <button
        type="button"
        class="kc_fab_main_btn"
        data-toggle="modal"
        data-target="#exampleModal"
      >
        +
      </button>
      <my-event-form @add-event="addNewEvent"></my-event-form>
      <!-- Modal form create event -->
    </div>
    <div class="myEvent">
      <my-event-card
        v-for="event of listMyEvent"
        :key="event.id"
        :event="event"
        @remove-myevent="removeMyEvent"
        @update-myevent="updateMyEvent"
      ></my-event-card>
    </div>
    <!--  -->
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
      search: "",
   
      username :JSON.parse(localStorage.getItem("user")),
    };
  },
  methods: {
    getListEvent() {
      axios.get("/events").then((response) => {
        this.listMyEvent = response.data;
        this.listMyEvent = this.listMyEvent.filter(
          (event) => event.user_id == localStorage.getItem("userId")
        );
      });
    },
    removeMyEvent(id) {
      axios.delete("/events/" + id).then(() => {
        this.listMyEvent = this.listMyEvent.filter((event) => event.id !== id);
        console.log(id);
      });
    },
    searchMyEvents(value) {
      if (value != "") {
        axios.get("/events/search/" + value).then((res) => {
          this.listMyEvent = res.data;
        });
      } else {
        this.getListEvent();
      }
    },
    addNewEvent(
      eventName,
      starteDate,
      endDate,
      city,
      country,
      participants,
      categoryId,
      userId,
      description,
      image
    ) {
      console.log(userId);
      const newEvent = new FormData();
      newEvent.append("eventName", eventName);
      newEvent.append("start_date", starteDate);
      newEvent.append("end_date", endDate);
      newEvent.append("city", city);
      newEvent.append("country", country);
      newEvent.append("participants", participants);
      newEvent.append("category_id", categoryId);
      newEvent.append("user_id", userId);
      newEvent.append("description", description);
      newEvent.append("image", image);
      axios.post("/events", newEvent).then(() => {
        this.getListEvent();
        console.log("created");
      });
    },
  },
  watch: {
    search: function () {
      // console.log(this.search);
      this.searchMyEvents(this.search);
    },
  },
  mounted() {
    this.getListEvent();
    
  },
};
</script>

<style>
.home {
  display: none;
}
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

.item > li {
  margin-right: 30px;
  color: #4d4d4d;
  font-size: 16px;
  padding: 10px 30px;
  display: block;
  width: 100%;
}

.item > li:hover {
  background: #ddefff;
  color: #0085ff;
  transition: 0.3s ease;
}

.kc_fab_main_btn {
  background-color: #f44336;
  width: 60px;
  height: 60px;
  border-radius: 100%;
  background: #f44336;
  border: none;
  outline: none;
  color: #fff;
  font-size: 36px;
  box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
  transition: 0.3s;
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
  position: fixed;
  left: 200vh;
}

.kc_fab_main_btn:focus {
  transform: scale(1.1);
  transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
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

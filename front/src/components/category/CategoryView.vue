<template>
    <section>
        <div class="title">
        <h3>Category</h3>
        <p>Here's all cotegories of evet, you also ca create it</p>
        </div>

        <div class="row">
            <div class="col-3">
                <form>
                <label for="category">Short by</label>
                <select id="category" name="category">
                    <option value="volvo">Latest</option>
                    <option value="saab">Oldest</option>
                </select>
                </form>
            </div>
            <div class="col-7">
                <category-card
                v-for="category of listCard"
                :key="category.id"
                :name="category.categoryName"
                :id="category.id"
                @remove="removeCard"
                ></category-card>
            </div>
            <div class="col-2 mt-5">
                <button
                    type="button"
                    class="btn btn-primary"
                    data-toggle="modal"
                    data-target="#addCard"
                    data-whatever="@mdo"
                >
                Add Category +
                </button>
                <div
                    class="modal fade"
                    id="addCard"
                    tabindex="-1"
                    role="dialog"
                    aria-labelledby="addCardLabel"
                    aria-hidden="true"
                >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="addCardLabel">
                                <b>Create Category of Event</b>
                                </h3>
                                <button
                                    type="button"
                                    class="close"
                                    data-dismiss="modal"
                                    aria-label="Close"
                                >
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="category-name" class="col-form-label"
                                        >Category name</label
                                        >
                                        <div>
                                            <label for="" class="fa-3x d-flex">
                                                <input
                                                type="text"
                                                class="form-control w-65"
                                                id="category-name"
                                                />
                                                <i
                                                class="fa fa-list-alt"
                                                aria-hidden="true"
                                                style="color: red"
                                                ></i>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="hvr-icon-forward">
                                        <label for="message-text" class="col-form-label"
                                            >Choose Image</label
                                        >
                                        <br />
                                        </div>
                                        <input
                                        type="file"
                                        id="img"
                                        style="display: none; visibility: none"
                                        />
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button
                                type="button"
                                class="btn btn-secondary"
                                data-dismiss="modal"
                                >
                                Cancel
                                </button>
                                <button
                                type="button"
                                class="btn btn-danger"
                                data-dismiss="modal"
                                >
                                Add
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
import CategoryCard from "./CategoryCard.vue";
import axios from "axios";
const url = "http://127.0.0.1:8000/api/categories";

export default {
  data() {
    return {
      listCard: "",
    };
  },
  components: { CategoryCard },
  methods: {
    getData() {
      axios.get(url).then((res) => {
        this.listCard = res.data;
      });
    },
    removeCard(id) {
      axios.delete(url + "/" + id).then(() => {
        this.getData();
      });
    },
    // editCard(id) {
    //     axios.pos(url)
    // }
  },
  mounted() {
    this.getData();
  },
};
</script>
<style scoped>
.navbar {
  box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px,
    rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
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
.item > li > i {
  font-size: 18px;
  margin-right: 30px;
}
.title {
  text-align: center;
  margin-top: 6px;
}
.title > p {
  margin-top: -6px;
}
</style>
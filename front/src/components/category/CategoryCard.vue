<template>
  <div class="card col-card">
    <div class="row">
      <div class="col col-img mt-3 ml-1">
        <i class="fa fa-user-circle"></i>
      </div>
      <div class="col mt-4">
        <p>{{ name }}</p>
      </div>
      <div class="col">
        <div class="col">
          <!-- Delete Card -->
          <div class="row">
            <button
              type="button"
              class="btn btn-danger btn-d"
              data-toggle="modal"
              data-target="#deletCard"
              data-whatever="@mdo"
            >
              Delete
            </button>
            <div
              class="modal fade"
              id="deletCard"
              tabindex="-1"
              role="dialog"
              aria-hidden="true"
            >
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                      Delete card
                    </h5>
                    <button
                      type="button"
                      class="close"
                      data-dismiss="modal"
                      aria-label="Close"
                    >
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <p>Are you sure you want to delte card ?</p>
                  <div class="modal-footer">
                    <button
                      type="button"
                      class="btn btn-secondary"
                      data-dismiss="modal"
                    >
                      Cancel
                    </button>
                    <button
                      @click="$emit('remove', id)"
                      type="button"
                      class="btn btn-danger"
                      data-dismiss="modal"
                    >
                      Delete
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Edit card -->
          <div class="row">
            <button
              type="button"
              class="btn btn-light btn-e"
              data-toggle="modal"
              data-target="#edit"
              data-whatever="@mdo"
            >
              Edit
            </button>
            <div
              class="modal fade"
              id="edit"
              tabindex="-1"
              role="dialog"
              aria-hidden="true"
            >
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-body">
                    <form>
                      <div class="form-group">
                        <label>Edit event category</label>
                        <div>
                          <label class="fa-3x d-flex">
                            <input
                              type="text"
                              class="form-control w-65"
                              id="category-name"
                            />
                          </label>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button
                      type="button"
                      class="btn btn-light"
                      data-dismiss="modal"
                    >
                      DISCARD
                    </button>
                    <button type="button" class="btn btn-light">UPDATE</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    id: {
      type: Number,
      required: true,
    },
    name: {
      type: String,
      required: true,
    },
  },
  emits: ["remove"],
  methods: {
    remove() {
      this.$emits("delete", this.id);
    },
  },
};
</script>
<style>
.btn-e,
.btn-d {
  width: 80px;
  margin: 1px;
}

.col-card {
  box-shadow: 0 3px rgba(172, 158, 157, 0.26);
  border-radius: 10px;
  margin: 5px;
}
.btn-d,
.btn-e {
  height: 30px;
  margin: 3px;
}
.col-img {
  font-size: 200%;
}
</style>
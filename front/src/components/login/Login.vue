<template>
  <section>
    <form class="col-4 m-auto p-4">
      <div class="form-group">
        <label for="inputEmail">Email</label>
        <div class="input-group mb-3">
          <input
            type="email"
            class="form-control bg-light border-0"
            id="inputEmail"
            required
          />
          <div class="input-group-prepend">
            <span class="input-group-text bg-danger border-0 rounded-right">
              <i class="fa fa-envelope text-light" aria-hidden="true"></i>
            </span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword">Password</label>
        <div class="input-group mb-5">
          <input
            type="password"
            class="form-control bg-light border-0"
            id="inputPassword"
            required
          />
          <div class="input-group-prepend">
            <span class="input-group-text bg-danger border-0 rounded-right">
              <i class="fa fa-unlock-alt text-light" aria-hidden="true"></i>
            </span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-danger w-100">LOGIN</button>
      </div>
      <div class="form-group">
        <label class="m-auto">Don't have an account?</label>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-outline-danger w-100">
          REGISTER
        </button>
      </div>
    </form>
  </section>
</template>
<script>
</script>
<style>
</style>
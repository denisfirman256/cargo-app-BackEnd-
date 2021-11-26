<template>
  <div class="d-flex align-items-center justify-content-center forgot-page">
    <div class="card text-center">
      <div class="card-body">
        <h5 class="card-title mb-4">Reset Kata Sandi</h5>
        <h6 class="card-subtitle mb-5 text-muted">Masukan email anda untuk mereset kata sandi</h6>
        <form action="">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Masukan email Anda">
          </div>
          <button type="submit" class="btn btn-primary font-weight-bold">Berikutnya</button>
        </form>
        <router-link :to="{ name : 'Login'}">Back</router-link>
      </div>
    </div>
  </div>
</template>
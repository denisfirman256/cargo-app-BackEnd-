<template>
  <!-- Main Content -->
  <div class="wrapper-main">
    <div class="dashboard mt-5 container-fluid">

      <!-- Analytic Feature -->
      <div class="row">

        <!-- Sum Feature -->
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8 mb-3">
          <!-- Sum  Feature -->
          <div class="row">
            <!-- Request Order -->
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 col-xxl-3 mb-3">
              <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                  <img :src="'../libraries/images/icons/box-time.svg'" alt="send-order" class="icon bg-primary">
                  <div class="font-weight-medium ml-3">
                    Total Permintaan Pengiriman Barang
                  </div> 
                  <!-- <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger text-white">
                    99+
                  </span> -->
                </div>
              </div>
            </div>
            <!-- /Request Order -->

            <!-- Process Order -->
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 col-xxl-3 mb-3">
              <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                  <img :src="'../libraries/images/icons/truck-time.svg'" alt="send-order" class="icon bg-warning">
                  <div class="font-weight-medium ml-3">
                    Total Proses Pengiriman Barang
                  </div> 
                  <!-- <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger text-white">
                    99+
                  </span> -->
                </div>
              </div>
            </div>
            <!-- /Process Order -->

            <!-- Send Order Agreed-->
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 col-xxl-3 mb-3">
              <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                  <img :src="'../libraries/images/icons/truck-tick.svg'" alt="send-order" class="icon bg-success">
                  <div class="font-weight-medium ml-3">
                    Total Pengiriman Disetujui
                  </div> 
                  <!-- <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger text-white">
                    99+
                  </span> -->
                </div>
              </div>
            </div>
            <!-- /Send Order Agreed-->

            <!-- Send Order Disagreed -->
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 col-xxl-3 mb-3">
              <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                  <img :src="'../libraries/images/icons/truck-remove.svg'" alt="send-order" class="icon bg-danger">
                  <div class="font-weight-medium ml-3">
                    Total Pengiriman Ditolak
                  </div> 
                  <!-- <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger text-white">
                    99+
                  </span> -->
                </div>
              </div>
            </div>
            <!-- /Send Order Disagreed -->
          </div>
          <!-- /Sum Feature -->

          <!-- Chart Analytic -->
          <div class="card">
            <div class="card-body">
              <h1>Grafik Pengiriman Perbulan</h1>
            </div>
          </div>
          <!-- /Chart Analytic -->
        </div>
        <!-- /Sum Feature -->

        <!-- Online Activity -->
        <div class="col-sm 12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 mb-3">
          <div class="card">
            <div class="card-body online-activity">
              <h5 class="card-title mb-4">Aktivitas Pegawai</h5>
              <ul class="list-group">
                <!-- User Activity -->
                <li class="list-group-item d-flex align-items-center justify-content-between">
                  
                  <div class="user-profile d-flex align-items-center">
                    <!-- Image Profile -->
                    <img :src="'../libraries/images/404_img.png'" width="34px" height="34px" alt="profile-user">

                    <!-- User Profile -->
                    <div class="d-block align-items-center ml-3">
                      <p class="font-weight-semi-bold mb-0">Usep Bujang</p>
                      <small class="mb-0">Kantor Pusat</small>
                    </div>
                  </div>
                  <div class="status d-flex align-items-center">
                    <div class="round-online mr-2"></div>
                    <span class="d-sm-none d-md-none d-lg-block">Online</span>
                  </div>
                </li>
                <!-- /User Activity -->
                <!-- User Activity -->
                <li class="list-group-item d-flex align-items-center justify-content-between">
                  
                  <div class="user-profile d-flex align-items-center">
                    <!-- Image Profile -->
                    <img :src="'../libraries/images/404_img.png'" width="34px" height="34px" alt="profile-user">

                    <!-- User Profile -->
                    <div class="d-block align-items-center ml-3">
                      <p class="font-weight-semi-bold mb-0">Usep Bujang</p>
                      <small class="mb-0">Kantor Pusat</small>
                    </div>
                  </div>
                  <div class="status d-flex align-items-center">
                    <div class="round-online mr-2"></div>
                    <span class="d-sm-none d-md-none d-lg-block">Online</span>
                  </div>
                </li>
                <!-- /User Activity -->
                <!-- User Activity -->
                <li class="list-group-item d-flex align-items-center justify-content-between">
                  
                  <div class="user-profile d-flex align-items-center">
                    <!-- Image Profile -->
                    <img :src="'../libraries/images/404_img.png'" width="34px" height="34px" alt="profile-user">

                    <!-- User Profile -->
                    <div class="d-block align-items-center ml-3">
                      <p class="font-weight-semi-bold mb-0">Usep Bujang</p>
                      <small class="mb-0">Kantor Pusat</small>
                    </div>
                  </div>
                  <div class="status d-flex align-items-center">
                    <div class="round-online mr-2"></div>
                    <span class="d-sm-none d-md-none d-lg-block">Online</span>
                  </div>
                </li>
                <!-- /User Activity -->
                <!-- User Activity -->
                <li class="list-group-item d-flex align-items-center justify-content-between">
                  
                  <div class="user-profile d-flex align-items-center">
                    <!-- Image Profile -->
                    <img :src="'../libraries/images/404_img.png'" width="34px" height="34px" alt="profile-user">

                    <!-- User Profile -->
                    <div class="d-block align-items-center ml-3">
                      <p class="font-weight-semi-bold mb-0">Usep Bujang</p>
                      <small class="mb-0">Kantor Pusat</small>
                    </div>
                  </div>
                  <div class="status d-flex align-items-center">
                    <div class="round-online mr-2"></div>
                    <span class="d-sm-none d-md-none d-lg-block">Online</span>
                  </div>
                </li>
                <!-- /User Activity -->
                <!-- User Activity -->
                <li class="list-group-item d-flex align-items-center justify-content-between">
                  
                  <div class="user-profile d-flex align-items-center">
                    <!-- Image Profile -->
                    <img :src="'../libraries/images/404_img.png'" width="34px" height="34px" alt="profile-user">

                    <!-- User Profile -->
                    <div class="d-block align-items-center ml-3">
                      <p class="font-weight-semi-bold mb-0">Usep Bujang</p>
                      <small class="mb-0">Kantor Pusat</small>
                    </div>
                  </div>
                  <div class="status d-flex align-items-center">
                    <div class="round-online mr-2"></div>
                    <span class="d-sm-none d-md-none d-lg-block">Online</span>
                  </div>
                </li>
                <!-- /User Activity -->
                <!-- User Activity -->
                <li class="list-group-item d-flex align-items-center justify-content-between">
                  
                  <div class="user-profile d-flex align-items-center">
                    <!-- Image Profile -->
                    <img :src="'../libraries/images/404_img.png'" width="34px" height="34px" alt="profile-user">

                    <!-- User Profile -->
                    <div class="d-block align-items-center ml-3">
                      <p class="font-weight-semi-bold mb-0">Usep Bujang</p>
                      <small class="mb-0">Kantor Pusat</small>
                    </div>
                  </div>
                  <div class="status d-flex align-items-center">
                    <div class="round-online mr-2"></div>
                    <span class="d-sm-none d-md-none d-lg-block">Online</span>
                  </div>
                </li>
                <!-- /User Activity -->
                <!-- User Activity -->
                <li class="list-group-item d-flex align-items-center justify-content-between">
                  
                  <div class="user-profile d-flex align-items-center">
                    <!-- Image Profile -->
                    <img :src="'../libraries/images/404_img.png'" width="34px" height="34px" alt="profile-user">

                    <!-- User Profile -->
                    <div class="d-block align-items-center ml-3">
                      <p class="font-weight-semi-bold mb-0">Usep Bujang</p>
                      <small class="mb-0">Kantor Pusat</small>
                    </div>
                  </div>
                  <div class="status d-flex align-items-center">
                    <div class="round-online mr-2"></div>
                    <span class="d-sm-none d-md-none d-lg-block">Online</span>
                  </div>
                </li>
                <!-- /User Activity -->
                <!-- User Activity -->
                <li class="list-group-item d-flex align-items-center justify-content-between">
                  
                  <div class="user-profile d-flex align-items-center">
                    <!-- Image Profile -->
                    <img :src="'../libraries/images/404_img.png'" width="34px" height="34px" alt="profile-user">

                    <!-- User Profile -->
                    <div class="d-block align-items-center ml-3">
                      <p class="font-weight-semi-bold mb-0">Usep Bujang</p>
                      <small class="mb-0">Kantor Pusat</small>
                    </div>
                  </div>
                  <div class="status d-flex align-items-center">
                    <div class="round-online mr-2"></div>
                    <span class="d-sm-none d-md-none d-lg-block">Online</span>
                  </div>
                </li>
                <!-- /User Activity -->
                <!-- User Activity -->
                <li class="list-group-item d-flex align-items-center justify-content-between">
                  
                  <div class="user-profile d-flex align-items-center">
                    <!-- Image Profile -->
                    <img :src="'../libraries/images/404_img.png'" width="34px" height="34px" alt="profile-user">

                    <!-- User Profile -->
                    <div class="d-block align-items-center ml-3">
                      <p class="font-weight-semi-bold mb-0">Usep Bujang</p>
                      <small class="mb-0">Kantor Pusat</small>
                    </div>
                  </div>
                  <div class="status d-flex align-items-center">
                    <div class="round-online mr-2"></div>
                    <span class="d-sm-none d-md-none d-lg-block">Online</span>
                  </div>
                </li>
                <!-- /User Activity -->
                <!-- User Activity -->
                <li class="list-group-item d-flex align-items-center justify-content-between">
                  
                  <div class="user-profile d-flex align-items-center">
                    <!-- Image Profile -->
                    <img :src="'../libraries/images/404_img.png'" width="34px" height="34px" alt="profile-user">

                    <!-- User Profile -->
                    <div class="d-block align-items-center ml-3">
                      <p class="font-weight-semi-bold mb-0">Usep Bujang</p>
                      <small class="mb-0">Kantor Pusat</small>
                    </div>
                  </div>
                  <div class="status d-flex align-items-center">
                    <div class="round-online mr-2"></div>
                    <span class="d-sm-none d-md-none d-lg-block">Online</span>
                  </div>
                </li>
                <!-- /User Activity -->
              </ul>
            </div>
          </div>
        </div>
        <!-- /Online Activity -->
      </div>
      <!-- Analytic Feature -->

      <!-- Table Feature -->

      <!-- row 1/2 -->
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 mb-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tabel</h5>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 mb-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">
                Ini Body
              </h5>
            </div>
          </div>
        </div>
      </div>
      <!-- /row 1/2 -->

      <!-- row 1 -->
      <div class="card mb-5">
        <div class="card-body">
          <h5 class="card-title">Tabel Permintaan Pengiriman Barang</h5>
        </div>
      </div>
      <!-- row 1 -->
      <!-- /Table Feature -->
    </div>
  </div>
  <!-- /Main Content -->
</template>

<script>
import Vue from "vue"


export default {
  // mounted() {
  //   this.getUser();
  // },
  methods: {
    getAdmin(){
      axios.get('/api/v1/auth/me', {headers : {Authorization: 'Bearer '+this.token}}).then((response) => {
        this.user = response.data.authme
        console.log(this.user)
      }).catch((error) => {
        if(error.response.status) {
          this.$router.push({
            name: 'Login'
          })
        }
      })
    }
  }
}
</script>
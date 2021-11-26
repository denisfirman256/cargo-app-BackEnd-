<template>
  <section>
    <div class="wrapper-main mt-5">
      <div class="dashboard">
        <!-- row -->
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 mb-3">
            <!-- Photo Profile -->
            <div class="card">
              <div class="card-body">
                <div class="d-block">
                  <h5 class="card-title">Foto Profile</h5>
                </div>
                <div class="d-flex justify-content-center">

                  <img v-if="user.photo" :src="user.photo" alt="" class="img-fluid rounded-circle">
                </div>
                <small class="mb-3">
                  <center>
                    Ukuran file foto tidak boleh melebihi dari 10mb atau
                    kerapatan pixel melebihi 300px. Ekstensi berkas yang
                    diperbolehkan JPG, JPEG, dan PNG
                  </center>
                </small>
                <!-- Plain mode -->
                <b-form-file v-model="file2" class="mt-3" plain></b-form-file>
                <div class="mt-3">Selected file: {{ file2 ? file2.name : 'Not Uploaded' }}</div>
              </div>
            </div>
            <!-- /Photo Profile -->
          </div>
          <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8 mb-3">
            <!-- Bio Data -->
            <div class="card mb-4">
              <div class="card-body">
                <h5 class="card-title">
                  Bio Data
                </h5>
                <ul class="list-group">
                  <!-- Name -->
                  <li class="list-group-item font-weight-bold d-flex align-items-center text-capitalize">
                    Nama : &nbsp;
                    <span><img :src="'../../libraries/images/icons/user-octagon.svg'" width="28px" alt="name-edit"></span>
                    &nbsp; {{user.first_name}}&nbsp;{{ user.last_name }}
                  </li>
                  <!-- Email -->
                  <li class="list-group-item font-weight-bold d-flex align-items-center">
                    Email : &nbsp;
                    <span><img :src="'../../libraries/images/icons/directbox-notif.svg'" width="28px" alt="email-edit"></span>
                    &nbsp; {{user.email}}
                  </li>
                  <!-- /Email -->
                  <!-- No HP -->
                  <li class="list-group-item font-weight-bold d-flex align-items-center">
                    No Handphone : &nbsp;
                    <span><img :src="'../../libraries/images/icons/call.svg'" width="28px" alt="hp-edit"></span>
                    &nbsp; {{user.no_telp}}
                  </li>
                  <li class="list-group-item font-weight-bold d-flex align-items-center">
                    Level : &nbsp;
                    <span><img :src="'../../libraries/images/icons/user-octagon.svg'" width="28px" alt="level-edit"></span>
                    &nbsp; {{user.level}}
                  </li>
                </ul>

              </div>
            </div>
            <!-- /Bio Data -->
          </div>
        </div>
        <!-- /row -->
      </div>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      // State Token
      token: localStorage.getItem('token'),
      // state user
      user : {

      }
    }
  },
  mounted() {
    this.getAdmin();
  },
  methods : {
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
      });
    } 
  }
}
</script>
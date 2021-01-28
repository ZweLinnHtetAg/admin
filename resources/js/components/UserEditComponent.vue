<template>
    <div class="row">
      <div class="col-md-6">
          <form  autocomplete="off" class="form-horizontal">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Edit Profile</h4>
                <p class="card-category">User information</p>
              </div>
              <div class="card-body ">
                
                  <!-- <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        
                      </div>
                    </div>
                  </div> -->
                
               
                <div class="row">
                  <label class="col-sm-4 col-form-label">Name</label>
                  <div class="col-sm-8">
                    <div class="form-group has-danger">
                      <input class="form-control is-invalid" name="name" id="input-name" type="text" placeholder="Name" :value="username" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-4 col-form-label">Email</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <input class="form-control" name="email" id="input-email" type="email" placeholder="Email" :value="email" required />
                      
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer justify-content-end">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </div>
          </form>
      </div>
      <div class="col-md-6">
        <form @submit.prevent="changePassword" class="form-horizontal">
          <div class="card ">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Change password</h4>
              <p class="card-category">Password</p>
            </div>
            <div class="card-body ">
                <!-- <div class="row">
                  <div class="col-sm-12">
                    <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                      </button>
                    </div>
                  </div>
                </div> -->
              <div class="row">
                <label class="col-sm-4 col-form-label" for="input-current-password">Current Password </label>
                <div class="col-sm-8">
                  <div class="form-group">
                    <input class="form-control  is-invalid" input type="password" name="old_password" v-model="password" v-on:keyup="checkPassword" id="input-current-password" placeholder="Current Password"  />
                    <span id="name-error" class="error text-danger" for="input-name" v-if="!passwordStatus"> Incorrect Password</span>
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-4 col-form-label" for="input-password">New Password</label>
                <div class="col-sm-8">
                  <div class="form-group">
                    <input class="form-control" name="password" :disabled="passwordStatus == ' ' "  id="input-password" type="password" placeholder="New Password" value="" required v-model="newPassword" />
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-4 col-form-label" for="input-password-confirmation">Confirm New Password</label>
                <div class="col-sm-8">
                  <div class="form-group">
                    <input class="form-control" name="password_confirmation" v-on:keyup="checkConfirm" :disabled="passwordStatus == ' '" id="input-password-confirmation" type="password" placeholder="Confirm New Password" value="" required v-model="confirmPassword" />
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer justify-content-end">
              <button type="submit" class="btn btn-primary" :disabled="confirmedStatus == 'false'" >Change password</button>
            </div>
          </div>
        </form>
      </div>
    </div>
</template>

<script>
export default {
    name : 'user-edit-component',
    props: ['username','email'],
    data: function () {
      return {
        password : "",
        passwordStatus : " ",
        newPassword : "",
        confirmPassword : "",
        confirmedStatus : "false"
      }
    },
    methods : {
      checkPassword()
      {
        axios.get("check-password/"+this.password).then((response) => {
          this.passwordStatus = response.data;
        });
      },
      checkConfirm()
      {
        if(this.confirmPassword == this.newPassword)
        {
          this.confirmedStatus = "true"
        }
      },
      changePassword()
      {
        axios.post('change-password/'+this.newPassword).then((response) => {
          console.log('Changed');
        });
      }
    }
}
</script>

<style>

</style>
<template>
    <div class="row">
      <div class="col-md-8 offset-2">
          <form @submit.prevent="changeNameEmail" autocomplete="off" class="form-horizontal">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Edit Profile</h4>
                <p class="card-category">User information</p>
              </div>
              <div class="card-body ">
                <div class="row" v-if="profileUpdateStatus != ' ' ">
                  <div class="col-sm-12">
                    <div class="alert alert-success">
                      <button type="button" v-on:click="dismiss" class="close"  aria-label="Close">
                        <i class="material-icons">close</i>
                      </button>
                        {{ profileUpdateStatus }}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-4 col-form-label">Name</label>
                  <div class="col-sm-8">
                    <div class="form-group has-danger">
                      <input class="form-control is-invalid" name="name" id="input-name" type="text" placeholder="Name" v-model="username" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-4 col-form-label">Email</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <input class="form-control" name="email" id="input-email" type="email" placeholder="Email" v-model="email" required />
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
      <div class="col-md-8 offset-2">
        <form @submit.prevent="changePassword" autocomplete="off" class="form-horizontal">
          <div class="card ">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Change password</h4>
              <p class="card-category">Password</p>
            </div>
            <div class="card-body ">
              <div class="row" v-if="passwordUpdateStatus != ' ' ">
                  <div class="col-sm-12">
                    <div class="alert alert-success">
                      <button type="button" class="close" v-on:click="pwdismiss" aria-label="Close">
                        <i class="material-icons">close</i>
                      </button>
                      {{ passwordUpdateStatus }}
                    </div>
                  </div>
              </div>
              <div class="row">
                <label class="col-sm-4 col-form-label" for="input-current-password">Current Password </label>
                <div class="col-sm-8">
                  <div class="form-group">
                    <input class="form-control  is-invalid" input type="password" name="old_password" v-model="password" v-on:keyup="checkPassword" id="input-current-password" placeholder="Current Password" :disabled="passwordStatus != ' '"  />
                    <span id="name-error" class="error text-danger" for="input-name" v-if="!passwordStatus"> Incorrect Password</span>
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-4 col-form-label" for="input-password">New Password</label>
                <div class="col-sm-8">
                  <div class="form-group">
                    <input class="form-control" name="password" v-on:keyup="checkConfirm" :disabled="passwordStatus == ' ' "  id="input-password" type="password" placeholder="New Password" value="" required v-model="newPassword" />
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-4 col-form-label" for="input-password-confirmation">Confirm New Password</label>
                <div class="col-sm-8">
                  <div class="form-group">
                    <input class="form-control" name="password_confirmation" v-on:keyup="checkConfirm" :disabled="passwordStatus == ' '" id="input-password-confirmation" type="password" placeholder="Confirm New Password" value="" required v-model="confirmPassword" />
                    <span id="name-error" class="error text-danger" for="input-name" v-if="confirmedStatus == 'false' "> Passwords do not match !</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer justify-content-end">
              <button type="submit" class="btn btn-primary" :disabled="confirmedStatus == 'false' || confirmedStatus == '' " >Change password</button>
            </div>
          </div>
        </form>
      </div>
    </div>
</template>

<script>
const axios = require('axios');

export default {
    name : 'profile-edit-component',
    props: ['username','email'],
    data: function () {
      return {
        profileUpdateStatus : " ",
        password : "",
        passwordStatus : " ",
        newPassword : "",
        confirmPassword : "",
        confirmedStatus : "",
        passwordUpdateStatus: " "
      }
    },
    methods : {
      checkPassword()
      {
        axios.get("check-password/"+this.password).then((response) => {
          this.passwordStatus = response.data
        });
      },
      checkConfirm()
      {
        if(this.confirmPassword == this.newPassword)
        {
          this.confirmedStatus = "true"
        }
        else {
          this.confirmedStatus = "false"
        }
      },
      dismiss()
      {
        this.profileUpdateStatus = ' ';
      },
      pwdismiss()
      {
        this.passwordUpdateStatus = ' ';
      },
      changePassword()
      {
        axios.post('change-password/'+this.newPassword).then((response) => {
          this.passwordUpdateStatus = response.data.success
          this.password=""
          this.passwordStatus=" "
          this.newPassword=""
          this.confirmPassword=""
          this.confirmedStatus=""
        });
      },
      changeNameEmail()
      {
        axios.post('update-profile/'+this.username+'/'+this.email).then((response) => {
          this.profileUpdateStatus = response.data.success;
        });
      }
    }
}
</script>

<style>

</style>
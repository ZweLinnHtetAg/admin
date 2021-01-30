<template>
    <div class="card">
      <div class="card-header card-header-success">
        <h4 class="card-title ">New User</h4>
        <p class="card-category"> add new user</p>
      </div>
      <div class="card-body mt-3">
      <form action="" autocomplete="off">
          <div class="form-group  label-floating mb-4">
              <label class="control-label" for="">Name</label>
              <input type="text" class="form-control" v-model="userData.name"  autofocus>
          </div>
          <div class="form-group label-floating" :class="emailClass">
            <label class="control-label">Email</label>
            <input type="text" value="" v-model="userData.email" v-on:keyup="emailCheck" class="form-control" />
            <span class="material-icons form-control-feedback" v-if="emailStatus">done</span>
            <span class="material-icons form-control-feedback" v-if="!emailStatus">clear</span>
            <span class="text-danger font-weight-bold" v-if="!emailStatus && emailStatus != '' ">
              This email is already Taken !
            </span>
            <span class="text-white" v-else>
              success mail
            </span>
          </div>
          <div class="form-group label-floating mb-4">
            <label for="exampleFormControlSelect1">Role</label>
            <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1">
              <option value="">Admin</option>
              <option value="" selected>User</option>
            </select>
          </div>
          <div class="form-group label-floating mb-4" v-title.light="passwordTitle" title-placement="right">
            <label class="control-label" for="">Password</label>
            <input type="password" class="form-control" :disabled="!emailStatus" autocomplete="off">
          </div>
          <div class="form-group label-floating mb-4" v-title.light="passwordTitle" title-placement="right">
            <label class="control-label" for="">Confirm Password</label>
            <input type="password" class="form-control" :disabled="!emailStatus" autocomplete="off">
          </div>
          <div class="form-group mb-4" >
            <button type="submit" class="btn btn-success float-right btn-block" :disabled="!status" > Add User </button>
          </div>
              
      </form>
      </div>
    </div> 
</template>

<script>
import axios from 'axios'
import VTitle from 'v-title';
export default {
    name : 'user-add-component',
    components: {
      VTitle
    },
    data() {
      return {
        passwordTitle : "Please fill upper fields first !",
        status : false,
        emailStatus : "",
        emailClass : "",
        userData : {
          name: '',
          email : '',
          password : '',
        },
        pickerClass : 'selectpicker'
      }
    },
    watch : {
      'emailStatus': {
      handler: function (val, oldVal) {
          // console.log('watch 1', 'newval: ', val, '   oldVal:', oldVal)
          if(val == true) 
            this.passwordTitle = "Please Fill Password"
          else
              this.passwordTitle = "Please fill upper fields first !"
             }
            },

    },
    methods: {
      nameCheck()
      {
        //
      },
      emailCheck()
      {
        axios.get('emailCheck/'+this.userData.email).then((response)=>{
           
          

          if(response.data.status == true)
          {

            if(this.userData.email.includes('@') && this.userData.email.includes('.com'))
              {
                this.emailStatus = true
                this.emailClass = "has-success"
              }
            else 
            {
              this.emailStatus = false
              this.emailClass = ""
            }
          }
          else
            this.emailClass = "has-danger"
        });
      },
    },

}
</script>

<style>

</style>
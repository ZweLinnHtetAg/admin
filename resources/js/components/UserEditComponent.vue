<template>
    <div class="card">
      <div class="card-header card-header-info">
        <h4 class="card-title ">Edit User</h4>
        <p class="card-category"> add new user</p>
      </div>
      <div class="card-body mt-3">
      <form action="">
          <div class="form-group">
              <label for="">Name</label>
              <input type="text" class="form-control" v-model="userData.name">
          </div>
          <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" v-model="userData.email">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-info float-right btn-block"> Update </button>
          </div>      
      </form>
      </div>
    </div> 
</template>

<script>
export default {
    name : 'user-edit-component',
    props : [ 'name' , 'email' , 'password'],
    data () {
      return {
        userData : new form({
          name : "",
          email : "",
          password : ""
        })
      }
    },
    methods : {
      fetchData(){
        this.userData.name = this.name;
        this.userData.email = this.email;
        this.userData.password = this.password;
      }
    },
    watch: {
        name: function(val, oldVal) { // watch it
            //console.log('Prop changed: ', val, ' | was: ', oldVal)  
            this.fetchData()
        },

        email: function(val, oldVal) { // watch it
                //console.log('Prop changed: ', val, ' | was: ', oldVal)  
                this.fetchData()
        },
    }, 
    mounted(){
       this.fetchData()
    }
}
</script>

<style>

</style>
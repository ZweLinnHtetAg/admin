<template>
    <div class="row">
      <div class="col-md-8">
          <div class="card">
            <div class="card-header card-header-info">
              <h4 class="card-title ">Users</h4>
              <p class="card-category"> Here you can manage users</p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-info">
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Creation Date</th>
                        <th class="text-right">
                        Actions
                        </th>
                  </tr>
                  </thead>
                  <tbody>
                      <tr v-for="(user,itemObjKey) in users" :key="user.id">
                        <td>{{itemObjKey+1}}</td>
                        <td>{{user.name}}</td>
                        <td>{{user.email}}</td>
                        <td>
                            <vue-moments-ago prefix="" suffix="ago" :date="user.created_at" />
                        </td>
                        <td class="td-actions text-right">
                            <button rel="tooltip" class="btn btn-primary btn-link" @click="toMail(user.email,user.name)"  data-original-title="Mail" title="Mail">
                              <i class="material-icons">mail</i>
                              <div class="ripple-container"></div>
                            </button>
                            <button rel="tooltip" class="btn btn-info btn-link" @click="toEdit(user.name,user.email,user.password)" data-original-title="Edit" title="Edit">
                              <i class="material-icons">edit</i>
                              <div class="ripple-container"></div>
                            </button>
                            <button rel="tooltip" class="btn btn-warning btn-link"  data-original-title="Lock" title="Lock">
                              <i class="material-icons">lock</i>
                              <div class="ripple-container"></div>
                            </button>
                            <button rel="tooltip" class="btn btn-danger btn-link" data-original-title="Ban" title="Ban">
                              <i class="material-icons">not_interested</i>
                              <div class="ripple-container"></div>
                            </button>
                        </td>
                      </tr>
                    </tbody>
                </table>
                <button class="btn btn-success float-right" v-if="!isAdd" @click="toAdd">Add User</button>
              </div>
            </div>
          </div>
      </div>
      <div class="col-md-4"> 
        <mail-component :email="email" :name="name" v-if="isMail"/>
        <user-add-component v-if="isAdd"  />
        <user-edit-component :name="name" :email="email" :password="password" v-if="isEdit" />
      </div>
    </div>
</template>

<script>
const axios = require('axios');
import VueMomentsAgo from 'vue-moments-ago';
export default {
    name : 'users-component',
    components: {
        VueMomentsAgo
    },
    data: function () {
        return {
            users: [],
            isMail : false,
            isAdd : true,
            isEdit : false,
            name : "",
            email : "",
            password : ""
        }
    },
    methods : {
        browse(){
            axios.get('getUsers').then((response)=>{
                this.users = response.data;
            });
        },
      toMail(email,name){
        this.isMail = true
        this.isEdit = false
        this.isAdd  = false

        this.email = email
        this.name = name
      },
      toEdit(name,email,password){
        this.isMail = false
        this.isEdit = true
        this.isAdd  = false

        this.name = name
        this.email = email 
        this.password = password
      },
      toAdd(){
        this.isMail = false
        this.isEdit = false
        this.isAdd  = true
      }
    },
    created() {
        this.browse()
    }
}
</script>

<style>

</style>
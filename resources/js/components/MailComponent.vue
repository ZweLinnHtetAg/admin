<template>
        <section class="card">
            <div class="card-header-primary">
                 Mail 
            </div>
            <div class="card-body mt-3">
                <form @submit.prevent="send" autocomplete="off">
                <div class="form-group">
                    <label for="" class="form-label">To</label>
                    <input type="text" class="form-control" v-model="mailData.name">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Email</label>
                    <input type="text" class="form-control" v-model="mailData.email">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Subject</label>
                    <input type="text" v-model="mailData.subject" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Content</label>
                    <textarea v-model="mailData.body" class="form-control" id="" cols="30" rows="8"></textarea>
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary btn-block"> Send </button>
                </div>
                </form>
            </div>
            <loading  
            :can-cancel="true"></loading>
        </section> 
</template>

<script>
import axios from 'axios'
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';

export default {
    name : 'mail-component',
    props : ['email','name'],
    components: {
        Loading
    },
    data() {
        return {
            mailData: new form({
                name : "",
                email : "",
                subject: "",
                body: "",
              })
        }
    },
    methods : {
        send(){
            
            let loader = this.$loading.show({
                color : "blue"
            });

            this.mailData.post('sendMail').then((request)=>{
                loader.hide()
            }).catch(error=> {  console.log(error) });

            
        },
        fetchData()
        {
            this.mailData.name = this.name;
            this.mailData.email = this.email;
        },
    },
    created(){ 
        // console.log("created");
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
    },
}
</script>

<style>

</style>
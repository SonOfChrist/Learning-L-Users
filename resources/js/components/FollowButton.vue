<template>
    <div>
        <button class="btn btn-primary" style=" margin-left: 30px;" @click="followUser" v-text="buttonText"></button>
    </div>
</template>

<script>
import axios from 'axios';

    export default {
        props: ['userId', 'follows'],

        mounted() {
            console.log('Component mounted.')
        },

        data: function ()
        {
            return{
                status: this.follows,
            }

        },

        methods: {
            followUser(){
               axios.post('/follow/' + this.userId)
               .then(Response =>{
                this.status = ! this.status;

                console.log(response.data);
               })
               .catch(errors => {
                if(errors.response.status == 401){
                    window.location = '/login';
                }
               });
            }
        },

        computed: {
            buttonText(){
                return(this.status) ? 'Unfollow' : 'Follow' ;
            }
        }
    }
</script>

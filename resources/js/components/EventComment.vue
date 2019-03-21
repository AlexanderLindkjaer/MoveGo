<template>
    <div>
        <div class="container my-3">
            <div class="row">
                <div class="col-md-6">
                    <div class="like-box p-2">
                        <h2 class="text-center">Deltagere</h2>
                       <div v-for="signup in event.signups" class="attende">

                           <div class="attende-name">
                               <h4>{{signup.user.name}}</h4>
                           </div>

                       </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="like-box p-2">
                        <h2 class="text-center">Chat</h2>
                        <div class=" like-box-scroll">
                            <div v-for="chat in chats" class="chat-entry mb-3">
                                <div class="attende-name">
                                    <b>{{chat.user.name}}</b>
                                    <p class="mb-0">{{chat.message}}</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <textarea placeholder="Your message" class="w-100 chat-textarea" v-model="message"></textarea>
                            <br>
                            <div @click="sendMessage" class="btn bg-orange text-white text-center w-100">Send message</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['event_id'],
        data() {
            return {
                event: {},
                chats: {},
                message: '',
            }
        },
        mounted() {
            this.loadData();
        },
        computed: {
            defaultComputed: function (){
                return ''
            }
        },
        methods: {
            loadData(){
                var self = this

                axios.get('/event/raw/'+this.event_id)
                    .then(function (response) {
                        self.event = response.data[0]
                    })

                axios.get('/event/chat/'+this.event_id)
                    .then(function (response) {
                        self.chats = response.data
                    })
            },
            sendMessage(){

                if(this.message == '') return;

                axios.post('/event/chat', {event_id: this.event_id, message: this.message})
                    .then( (response) => {
                        location.reload();
                    })
                    .catch( (response) => {
                        toastr.warning('You need to be logged in and signed up to the event');
                    })

            }

        }
    }
</script>

<style>

    .attende-name{

    }

    .attende-comment{

    }

    .attende{
        background-color: #f2f2f2;
        -webkit-box-shadow: 5px solid black;
        box-shadow: 5px solid black;
        border-radius: 10px;
        margin: 15px;
        padding: 15px;
    }

    .chat-entry{
        background-color: #f2f2f2;
        -webkit-box-shadow: 5px solid black;
        box-shadow: 5px solid black;
        border-radius: 10px;

        margin: 5px;
        padding: 5px;
    }
    .chat-textarea{
        margin-top: 10px;
        -webkit-box-shadow: 5px solid black;
        box-shadow: 5px solid black;
        border-radius: 10px;

        margin: 5px;
        padding: 5px;
    }

    .like-box-scroll{
        max-height: 300px;
        overflow-y: scroll;
    }

</style>
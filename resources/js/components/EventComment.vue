<template>
    <div>
        <div class="container my-3">
            <div class="row">
                <div class="col-12">
                    <div class="like-box p-2">
                        <h2 class="text-center">Deltagere</h2>
                       <div v-for="signup in event.signups" class="attende">

                           <div class="attende-name">
                               <h4>{{signup.user.name}}</h4>
                           </div>

                           <!--<div class="attende-comment" v-if="signup.comment">-->
                               <!--&lt;!&ndash;<p class="mb-1">Kommentar:</p>&ndash;&gt;-->
                               <!--{{signup.comment}}-->
                           <!--</div>-->

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
            },

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

</style>
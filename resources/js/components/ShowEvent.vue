<template>
    <div>
        <div class="container-fluid p-0">
            <googlemaps-map :center.sync="center" :zoom.sync="zoom">


                <googlemaps-marker
                        :key="event.id"
                        :position="calcPos(event)"
                />

            </googlemaps-map>
        </div>
        <div class="container my-3">
            <div class="row">
                <div class="col-12">
                    <div class="like-box text-center pointer py-4">
                       <div v-if="user">
                           <h4>{{event.no_of_signups}} deltager i denne aktivitet</h4>
                           <div v-if="!signed_up" @click="attend" class="attend pt-2">
                               <i class="fa fa-5x fa-check-circle-o" aria-hidden="true"></i>
                               <p>Deltag</p>
                           </div>
                           <div v-else>
                               Du deltager i dette event
                           </div>
                       </div>
                        <div v-else>
                            <div>
                                <h4 mb-3>{{event.no_of_signups}} deltager i denne aktivitet</h4>
                                <h6>For at deltage i dette event skal du oprette dig <a href="/register">her</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 d-flex align-items-stretch ">
                    <div class="card w-100">
                        <div class="card-header">
                            Aktivitet
                        </div>
                        <div class="card-body">

                            <div class="form-group col-md-12 ">
                                <h2 class="text-center">{{event.headline}}</h2>
                            </div>

                            <div class="form-group col-md-12 ">
                                <p>{{event.description}}</p>
                            </div>

                            <div class="form-group col-12 mt-3">
                                <p class="">{{event.adress}}</p>
                            </div>

                            <div class="form-group col-12 ">
                                <p class="">{{event.start_of_event_date_pretty}} - {{event.start_of_event_clock}}</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        props: ['event_id', 'signed_up'],
        data() {
            return {
                event: {},
                user: false,
                center: { lat: 55.686723, lng: 12.5615783 },
                zoom: 11,
            }
        },
        mounted() {
            this.loadData();

            if (window.location.hash === '#event-attende') {
                toastr.success('Du deltager i begivenhed');
                history.pushState("", document.title, window.location.pathname);
            }
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
                        
                        console.log(response.data);
                        
                        self.event = response.data[0];

                        if(response.data[1]){
                            self.user = response.data[1];
                        }

                        self.center = self.calcPos(self.event)
                    })
            },
            calcPos(marker){
                return { lat: Number(marker.lat), lng: Number(marker.long) }
            },
            attend()
            {

                if(this.name == ''){
                    toastr.warning('Du skal udfylde et kaldenavn')
                    return
                }

                var data = new FormData();
                data.append('id', this.event.id);
                data.append('user_id', this.user.id)
                var self = this

                axios.post('/event/signup', data)
                    .then(function (response) {
                        window.location.href = '/event/'+self.event.id+'#event-attende'
                        location.reload()
                    })
                    .catch(function (response) {
                        toastr.error('Dette kaldenavn er allerede tilmeldt event')
                    });

            }
        }
    }
</script>

<style scoped>

    .vue-google-map{
        height: 300px;
    }

    .event-input{
        border: 1px solid lightgrey;
        border-radius: 5px;
    }


</style>
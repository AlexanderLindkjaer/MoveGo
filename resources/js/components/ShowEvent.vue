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
                    <div class="like-box text-center pointer py-2">
                        <h4>{{event.no_of_signups}} deltager i denne aktivitet</h4>
                        <div @click="attend" class="attend">
                            <i class="fa fa-5x fa-check-circle-o" aria-hidden="true"></i>
                            <p>Deltag</p>
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

                            <div class="form-group col-12 mt-5">
                                <p class="text-center">{{event.adress}}</p>
                            </div>

                            <div class="form-group col-12 ">
                                <p class="text-center">{{event.start_of_event_date_pretty}}</p>
                                <p class="text-center">{{event.start_of_event_clock}}</p>
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
        props: ['event_id'],
        data() {
            return {
                event: {},
                center: { lat: 55.686723, lng: 12.5615783 },
                zoom: 11,
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
                        self.event = response.data
                        self.center = self.calcPos(self.event)
                    })
            },
            calcPos(marker){
                return { lat: Number(marker.lat), lng: Number(marker.long) }
            },
            attend()
            {
                var data = new FormData();
                data.append('id', this.event.id);

                var self = this

                axios.post('/event/signup', data)
                    .then(function (response) {
                        toastr.success('Du deltager i '+response.data.headline)
                        self.event.no_of_signups = self.event.no_of_signups+1
                    })
                    .catch(function (response) {
                        toastr.error('Something went wrong')
                    });

            }
        }
    }
</script>

<style scoped>

    .vue-google-map{
        height: 300px;
    }


</style>
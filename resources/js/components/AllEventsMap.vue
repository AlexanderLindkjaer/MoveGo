<template>
    <div class="full-map-container">
        <googlemaps-map :center.sync="center" :zoom.sync="zoom">


            <googlemaps-marker
                    v-for="marker of events"
                    :key="marker.id"
                    :position="calcPos(marker)"
                    :icon=" marker === currentmarker ? selectedIcon : ''"
                    @click="selectMarker(marker)"
            />

        </googlemaps-map>
        <div v-if="currentmarker" class=" map-event-details ">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1>{{currentmarker.headline}}</h1>
                        <h3>{{currentmarker.no_of_signups}} personer deltager</h3>
                    </div>
                    <div class="col-md-6 text-center">
                        <p>{{currentmarker.description}}</p>
                    </div>
                    <div class="col-md-6 text-center">
                        <p>{{currentmarker.adress}}</p>
                        <p>{{currentmarker.start_of_event_date}}</p>
                        <p>{{currentmarker.start_of_event_clock}}</p>
                    </div>
                    <div class="col-12 text-center">
                            <a :href="'/event/'+currentmarker.id" class="btn bg-orange text-white text-center" ><h3>Gå til aktivitet</h3></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [],
        data() {
            return {
                center: { lat: 55.686723, lng: 12.5615783 },
                zoom: 11,
                mapOptions: {},
                events: {},
                currentmarker: null,
                selectedIcon: {
                    url : "/img/orange_marker4.png",
                    class : 'orange-marker'
                }

            }
        },
        mounted() {
            this.loadEvents()
        },
        computed: {
            defaultComputed: function () {
                return ''
            }
        },
        methods: {
            onIdle() {

            },
            onMapClick(){

            },
            loadEvents(){

                var self = this

                axios.get('/event/all/raw')
                    .then(function (response) {
                        self.events = response.data
                    })
            },
            calcPos(marker){
                return { lat: Number(marker.lat), lng: Number(marker.long) }
            },
            selectMarker(marker)
            {
                this.currentmarker = marker
            }

        }
    }
</script>

<style scoped>
    .vue-google-map{
        height: 500px;
    }

</style>
<template>
    <div class="row">

        <div class="col-12 col-lg-6  d-flex align-items-stretch mb-3 ">
            <div class="card w-100">
                <div class="card-header">
                    Detaljer
                </div>
                <div class="card-body">

                    <div class="form-group col-md-12 ">
                        <label >Overskrift</label>
                        <input name="Overskrift" type="text" v-validate="'required'" class="form-control" v-model="event.headline">
                    </div>

                    <div class="form-group col-md-12 ">
                        <label >Beskrivelse</label>
                        <textarea name="Beskrivelse" type="textarea" v-validate="'required'" class="form-control" v-model="event.description"></textarea>
                    </div>

                    <div class="form-group col-md-12 ">
                        <label >Start dato</label>
                        <input name="Start dato" type="date" class="form-control" v-validate="'required'" v-model="event.start_of_event_date">
                    </div>

                    <div class="form-group col-md-12 ">
                        <label >Start tidspunkt</label>
                        <input name="Start tidspunkt" type="text" class="form-control" v-validate="'required'" v-model="event.start_of_event_clock">
                    </div>

                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6  d-flex align-items-stretch  mb-3 ">
            <div class="card w-100">
                <div class="card-header">
                    Lokation
                </div>
                <div class="card-body">

                    <div class="my-3">

                        <!-- Map -->
                        <googlemaps-map
                                class="map"
                                :center.sync="center"
                                :options="mapOptions"
                                :zoom="12"
                                @click="onClick"
                        >
                            <!-- User Position -->
                            <googlemaps-user-position
                                    @update:position="setUserPosition" />

                            <googlemaps-marker
                                    v-if="searchLocation"
                                    title="Searched location"
                                    :position="searchLocation"
                                    ref="marker"

                            />


                        </googlemaps-map>


                        <googlemaps-geocoder
                                ref="results"
                                :request="geocoderRequest"
                                @results="geoResult"
                        >
                        </googlemaps-geocoder>

                    </div>

                    <div class="form-group col-md-12 ">
                        <label >Adresse</label>
                        <input name="Adresse" type="text" v-validate="'required'" class="form-control" v-model="event.adress">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-12  d-flex align-items-stretch  my-4">
            <div class="btn bg-orange w-100 text-white text-center" @click="validate"><h3>{{ state == 'create' ? 'Opret Aktivitet' : 'Rediger Aktivitet' }}</h3></div>
        </div>

    </div>
</template>

<script>
    import { MapElement } from 'vue-googlemaps'
    export default {
        props: ['state', 'event_id'],
        data() {
            return {
                event: {
                    headline: null,
                    description: null,
                    start_of_event_date: null,
                    start_of_event_clock: null,
                    long: null,
                    lat: null,
                    adress: null,
                },
                latLng:  { lat: 55.686723, lng: 12.5615783 },
                center: { lat: 55.686723, lng: 12.5615783 },
                searchLocation: null,
                userPosition: null,
                mapOptions : {
                    clickableIcons: false,
                },
                locationResults: {}
            }
        },
        mounted() {
            this.loadData()
        },
        computed: {
            geocoderRequest () {
                if (this.searchLocation) {
                    return {
                        location: this.searchLocation,
                    }
                }
            }
        },
        methods: {
            geoResult(result){
                this.event.adress = result[0].formatted_address;
            },
            onClick ({ latLng }) {
                this.event.lat = latLng.lat();
                this.event.long = latLng.lng();
                this.searchLocation = latLng
                this.$refs.results.$el.scrollTop = 0
            },
            setUserPosition (position) {
                this.userPosition = position
            },
            validate()
            {
                this.$validator.validate().then(result => {
                    if (result) {
                       this.CreateUpdate();
                    }else{
                        // this.errors.all().forEach(error => {
                        //    console.log(error);
                        // });
                        toastr.error('En eller flere af felterne er ikke udfyldt');
                    }
                });
            },
            CreateUpdate()
            {
                var data = this.getData();
                var self = this;

                this.$validator.validate()


                axios.post('/event/'+this.state, data)
                    .then(function (response) {
                        if(self.state == 'create')
                        {
                            window.location.href = '/event/edit/'+response.data.id+'#event-created'
                        }else{
                            window.location.href = '/event/edit/'+response.data.id+'#event-updated'
                            location.reload()
                        }


                    })
                    .catch(function (response) {
                        toastr.error('Something went wrong')
                    });

            },
            getData() {
                var data = new FormData();

                data.append('headline', this.event.headline);
                data.append('description', this.event.description);
                data.append('start_of_event_date', this.event.start_of_event_date);
                data.append('start_of_event_clock', this.event.start_of_event_clock);
                data.append('long', this.event.long);
                data.append('lat', this.event.lat);
                data.append('adress', this.event.adress);
                if(this.event_id)data.append('id', this.event_id);

                return data
            },
            loadData(){
                this.toastIt();

                if(this.state == 'edit'){

                var self = this;

                    axios.get('/event/raw/'+this.event_id)
                        .then(function (response) {
                            self.event = response.data
                            self.searchLocation = { lat: Number(self.event.lat), lng: Number(self.event.long) };
                        })

                }

            },
            toastIt(){
                if (window.location.hash === '#event-created') {
                    toastr.success('Aktivitet oprettet');
                    history.pushState("", document.title, window.location.pathname);
                }
                if (window.location.hash === '#event-updated') {
                    toastr.success('Aktivitet opdateret');
                    history.pushState("", document.title, window.location.pathname);
                }
            }
        }
    }
</script>

<style scoped>

    .vue-google-map{
        height: 300px;
    }
</style>
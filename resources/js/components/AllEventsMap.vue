<template>
    <div class="full-map-container">
        <googlemaps-map :center.sync="center" :zoom.sync="zoom">
        </googlemaps-map>
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
                events: {}

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
            }

        }
    }
</script>

<style scoped>
    .vue-google-map{
        height: 500px;
    }

</style>
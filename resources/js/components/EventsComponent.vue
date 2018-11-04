<template>
    <div class="row">
        <single-event v-for="event in events" :event="event" :key="event.id"></single-event>
    </div>
</template>

<script>
    export default {
        props: [],
        data() {
            return {
                events: []
            }
        },
        mounted() {
            this.loadEvents();
        },
        computed: {
        },
        methods: {
            loadEvents(){

                var self = this

                axios.get('/events/all/raw')
                    .then(function (response) {
                        self.events = response.data;
                    })
                    .catch(function (response) {
                        console.log(response)
                    });
            },
        }
    }
</script>

<style>
</style>
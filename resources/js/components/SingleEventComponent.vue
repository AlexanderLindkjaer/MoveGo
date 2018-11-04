<template>
    <div class=" col-md-4 col-sm-6 py-3 d-flex align-items-stretch">

        <div class="card w-100" style="">

            <div class="mx-auto">
                <img class="card-img-top image--cover" src="/img/sport_1.jpg"  alt="Card image cap">
            </div>
            <div class="card-body bg-white">
            </div>

        </div>

    </div>
</template>

<script>
    export default {
        props: ['event'],
        data() {
            return {
                default: ''
            }
        },
        mounted() {

        },
        computed: {
            defaultComputed: function (){
                return ''
            }
        },
        methods: {
            defaultMethod(){

            },
        }
    }
</script>

<style>
</style>
<script setup>
import Seat from './Seat.vue'

const props = defineProps({
    number: Number,
    row: Array
})
</script>

<template>
<div >
    {{props.number}}
    <Seat v-for="(seat, index) in props.row" :number="index" :avaiability="seat.avaiability" selected="false"/>
    {{props.number}}
</div>
</template>
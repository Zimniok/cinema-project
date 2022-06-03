<script setup>
import Seat from './Seat.vue'

const props = defineProps({
    number: Number,
    row: Array,
    selectSeat: Function
})
</script>

<template>
    <div class="row gy-2" style="margin-bottom: 5px;">
        <div class="col" align="center" style="position:relative"><p class="num">{{ props.number }}</p></div>
        <Seat v-for="(seat) in props.row" :number="seat.number" :avaiability="seat.avaiability"
            :selected="seat.selected" :row="this.props.number" :selectSeat="selectSeat" :id="seat.id" />
        <div class="col" align="center" style="position:relative"><p class="num">{{ props.number }}</p></div>
    </div>
</template>
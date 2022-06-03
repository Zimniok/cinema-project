<script setup>
import Row from './Row.vue'

const props = defineProps({
    rows: Array,
    selectSeat: Function
})
</script>

<template>
    <div class="container overflow-hidden" style="width: 920px; background-color: #eeeeee; padding-top:5px;">

        <Row v-for="(item) in props.rows" :number="item.number" :row="item.row" :selectSeat="this.props.selectSeat" />

    </div>
</template>
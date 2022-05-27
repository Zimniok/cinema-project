<script setup>
import Row from './Row.vue'

const props = defineProps({
    rows: Array
})
</script>

<template>
<div>
    <Row v-for="(item, index) in props.rows" :number="index" :row="item"/>
</div>
</template>
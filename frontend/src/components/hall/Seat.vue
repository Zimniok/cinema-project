<script setup>
const props = defineProps({
    number: Number,
    avaiability: Boolean,
    selected: Boolean
})
</script>

<template>
<div :class="[props.avaiability ? 'availabae' : 'not_availabae', props.selected ? 'selected' : '']">
    {{props.number}}
</div>
</template>

<style>
.selected {
    background-color: #d4914e !important;
}

.available {
    background-color: #42ba3d;
}

.not_available {
    background-color: #c7283a;
}

div {
    height: 50px;
    width: 50px;
}
</style>
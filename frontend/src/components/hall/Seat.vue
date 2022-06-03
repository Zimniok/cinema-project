<script setup>
import { ref, onMounted } from 'vue'

const props = defineProps({
    selectSeat: Function,
    number: Number,
    row: Number,
    avaiability: Boolean,
    selected: Boolean,
    id: Number
})

const count = ref(0)
const s = ref(props.selected)

function triggerSelect(){
    if(props.avaiability){
        s.value = !s.value
        props.selectSeat(props.id, s.value)
    }
    
}

</script>

<template>
    <div class="col" align="center">
        <div :class="[props.avaiability ? 'available' : 'not_available', s ? 'selected' : '', 'seat']" @click="triggerSelect">
            <p class="num">{{ props.number }}</p>
        </div>
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

.seat {
    height: 50px;
    width: 50px;
    position: relative;
}

.num {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
</style>
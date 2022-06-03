<script setup>
const props = defineProps({
    'type': String,
    'screenings': Array
})

const dsc = props.screenings.length > 0 ? props.screenings.splice(0,1): '';

</script>

<template>
    <div class="py-2">
        <h5>{{ this.props.type }}</h5>
        <div class="row row-cols-auto gx-1">
            <button @click="this.$router.push({name: 'reservation', params: {id: screening.id}})" type="button" class="btn btn-info col my-2" v-for="screening in this.props.screenings"><b>{{ screening.time
            }}</b></button>
            <!-- <div class="col border p-2 rounded-3 bg-secondary"><b>12:00</b></div>
                <div class="col border p-2 rounded-3"><b>13:00</b></div>
                <div class="col border p-2 rounded-3"><b>22:00</b></div> -->
        </div>
        <p class="mb-0"><small>{{ this.dsc[0] }}</small></p>
    </div>
</template>

<style>
.row>.col {
    margin-right: 0.5rem;
}

.row {
    margin-left: 1rem;
}
</style>
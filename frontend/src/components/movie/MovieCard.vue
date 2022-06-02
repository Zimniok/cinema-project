<script setup>
import MovieTypeScreenings from './MovieTypeScreenings.vue';

const props = defineProps({
    info: Object
})
const types = {};
for(let screening = 0; screening < props.info.screenings.length; screening ++){
    if(props.info.screenings[screening].type in types){
        let el = {
            id : props.info.screenings[screening].id,
            time: props.info.screenings[screening].time
        }
        types[props.info.screenings[screening].type].push(el);
    } else {
        let el = {
            id : props.info.screenings[screening].id,
            time: props.info.screenings[screening].time
        }
        types[props.info.screenings[screening].type] = [props.info.screenings[screening].description,el];
    }
}

</script>

<template>
    <div class="card">
        <div class="card-body position-relative">
            <img class="float-start position-relative me-4" src="https://m.media-amazon.com/images/M/MV5BMWEwNjhkYzYtNjgzYy00YTY2LThjYWYtYzViMGJkZTI4Y2MyXkEyXkFqcGdeQXVyNTM0OTY1OQ@@._V1_FMjpg_UX1000_.jpg"
                alt="Card image cap" width="140">
            <div class="position-relative container-fluid">
                <h3 class="card-title">{{ props.info.title }}</h3>
                <p class="card-subtitle mb-2 text-muted">{{ props.info.tag }} | {{
                        props.info.duration
                }} min</p>
                <p class="card-text">{{ props.info.short_description }}</p>
                <div class="movie-screenings-container border-top" v-for="type in Object.keys(this.types)">
                    <MovieTypeScreenings :type="type" :screenings="types[type]" />
                </div>
            </div>
        </div>
    </div>
</template>

<style>
.movie-screenings-container {
    margin-left: 154px;
}
</style>
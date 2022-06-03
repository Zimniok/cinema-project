<script setup>
import MovieTypeScreenings from './MovieTypeScreenings.vue';

import { useQuery, useMutation } from '@vue/apollo-composable'
import gql from 'graphql-tag'




const props = defineProps({
    info: Object,
    removeMovie: Function
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
                <button class="btn btn-outline-secondary edit-button" @click="this.$router.push({name: 'modify_movie', params: {type: 'modify', id: this.props.info.id}})">
                    <i class="fa-solid fa-pen"></i>
                </button>
                <button class="btn btn-outline-danger delete-button" @click="this.props.removeMovie(this.props.info.id)">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
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

.edit-button {
    position: absolute;
    top: 5px;
    right: 53px;
}

.delete-button {
    position: absolute;
    top: 5px;
    right: 5px;
}
</style>
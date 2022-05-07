<script setup>
import MovieCardData from '@/models/movieCardData.js'
import MovieTypeScreenings from './MovieTypeScreenings.vue';

const props = defineProps({
    'info': MovieCardData
})

</script>

<template>
    <div class="card">
        <div class="card-body position-relative">
            <img class="float-start position-relative me-4" src="https://m.media-amazon.com/images/M/MV5BMWEwNjhkYzYtNjgzYy00YTY2LThjYWYtYzViMGJkZTI4Y2MyXkEyXkFqcGdeQXVyNTM0OTY1OQ@@._V1_FMjpg_UX1000_.jpg"
                alt="Card image cap" width="140">
            <div class="position-relative container-fluid">
                <h3 class="card-title">{{ props.info.title }}</h3>
                <p class="card-subtitle mb-2 text-muted">{{ props.info.categories.join([separator = ', ']) }} | {{
                        props.info.duration
                }} min</p>
                <p class="card-text">{{ props.info.description }}</p>
                <div class="movie-screenings-container border-top" v-for="screening in this.props.info.screenings">
                    <MovieTypeScreenings :type="screening.type" :dsc="screening.dsc" :screenings="screening.hours" />
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
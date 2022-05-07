<script setup>
import MovieCard from '@/components/movie/MovieCard.vue'
import MovieCardData from '@/models/movieCardData.js'

let prop =
    [
        new MovieCardData('test title', ['fantasy', 'action'], 120, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse commodo elit eget accumsan facilisis. Maecenas tincidunt arcu eget est porttitor.',
            [
                {
                    'type': '2D',
                    'dsc': 'EN  ·  (  NAP  ·  PL  )',
                    'hours': ['11:00', '12:00']
                },
                {
                    'type': '3D',
                    'dsc': '(  DUB  ·  PL  )',
                    'hours': ['13:00', '20:30']
                }
            ]),
        new MovieCardData('test title 2', ['fantasy', 'action'], 120, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse commodo elit eget accumsan facilisis. Maecenas tincidunt arcu eget est porttitor.',
            [
                {
                    'type': '2D',
                    'dsc': 'EN  ·  (  NAP  ·  PL  )',
                    'hours': ['11:00', '12:00']
                },
                {
                    'type': '3D',
                    'dsc': '(  DUB  ·  PL  )',
                    'hours': ['13:00', '20:30']
                }
            ])
    ]
</script>

<template>
    <div class="container mt-1">
        <MovieCard v-for="movieData in this.prop" :info="movieData" />
    </div>
</template>
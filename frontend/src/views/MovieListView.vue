<script setup>
import MovieCard from '@/components/movie/MovieCard.vue'

import { useQuery } from '@vue/apollo-composable'
import gql from 'graphql-tag'

// const { result, loading, error } = useQuery(gql`
//         query getUsers {
//             movies {
//                 id
//                 title
//                 categories
//                 description
//                 duration
//                 screenings {
//                     dsc
//                     hours
//                     type
//                 }
//             }
//         }
//     `,
// )

const { result, loading, error } = useQuery(gql`
        query getUsers {
            movies {
                id
                title
                categories
                description
                duration
            }
        }
    `,
)

</script>

<template>
    <div v-if="this.loading" class="container mt-1">
        <h1>Ładowanie danych...</h1>
    </div>
    <div v-else-if="this.error" class="container mt-1">
        <h1>Error: {{ this.error.message }}</h1>
    </div>
    <div v-else-if="this.result" class="container mt-1">
        <button @click="console.log(this.result)">Print result</button>
        <!-- <MovieCard v-for="movieData in this.result.movies" :info="movieData" /> -->
    </div>
</template>
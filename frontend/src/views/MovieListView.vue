<script setup>
import { ref, onMounted } from 'vue'
import { reactive, computed } from 'vue'
import MovieCard from '@/components/movie/MovieCard.vue'

import { useQuery, useMutation } from '@vue/apollo-composable'
import gql from 'graphql-tag'

const movies = reactive({
    ar : []
})
const getMovies = computed(() => {
  return movies.ar.length > 0 ? movies.ar: []
})


const { mutate: deleteMovie, onDone: deleteMovieDone, onError: deleteMovieError } = useMutation(gql`
        mutation deleteMovie($id: ID!){
            removeMovie(id: $id){
                id
            }
        }
    `
)

const { result, loading, error, onResult } = useQuery(gql`
        query {
            movies {
                id
                title
                tag
                short_description
                duration
                screenings {
                    id
                    description
                    time
                    type
                    language
                }
            }
        }
    `,
)

onResult((result) => {
    for(let i =0; i < result.data.movies.length; i++){
        movies.ar.push(result.data.movies[i])
    }
})


function removeMovie(id){
    deleteMovie({id: id})
}

deleteMovieDone((result) => {
    for(let i =0; i < movies.ar.length; i++){
        if(movies.ar[i].id == result.data.removeMovie.id){
            movies.ar.splice(i,1)
        }
    }
})

// const { result, loading, error } = useQuery(gql`
//         query getUsers {
//             movies {
//                 id
//                 title
//                 categories
//                 description
//                 duration
//             }
//         }
//     `,
// )

</script>

<template>
    <div v-if="this.loading" class="container mt-1">
        <h1>Ładowanie danych...</h1>
    </div>
    <div v-else-if="this.error" class="container mt-1">
        <h1>Error: {{ this.error.message }}</h1>
    </div>
    <div v-else-if="this.result" class="container mt-1 mb-5">
        <MovieCard v-for="movieData in getMovies" :info="movieData" :removeMovie="removeMovie" />
        <button class="btn btn-primary mt-2" @click="this.$router.push({name: 'modify_movie', params: {type: 'add', id: -1}})">Dodaj film</button>
    </div>
</template>
<script setup>
import ModifyMovieForm from '../components/forms/ModifyMovieForm.vue';

import { useQuery } from '@vue/apollo-composable'
import gql from 'graphql-tag'

const props = defineProps({
    type: String,
    id: String
})

const { result, loading, error } = useQuery(gql`
        query getMovie($id: ID!) {
            movie(id: $id) {
                id
                title
                tag
                short_description
                long_description
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
    `, {
    id: props.id
}
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
        <h1 v-if="props.type == 'add'">Dodaj film</h1>
        <h1 v-if="props.type == 'modify'">Modyfikuj film</h1>
        <ModifyMovieForm :data="this.result.movie"/>
    </div>
</template>

<style>
h1 {
    margin: 50px 0;
}
</style>
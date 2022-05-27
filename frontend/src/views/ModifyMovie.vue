<script setup>
import ModifyMovieForm from '../components/forms/ModifyMovieForm.vue';

import { useQuery } from '@vue/apollo-composable'
import gql from 'graphql-tag'

const props = defineProps({
    type: String
})
</script>

<template>
    <div class="container mt-1">
        <h1 v-if="props.type == 'add'">Dodaj film</h1>
        <h1 v-if="props.type == 'modify'">Modyfikuj film</h1>
        <ModifyMovieForm/>
    </div>
</template>

<style>
h1 {
    margin: 50px 0;
}
</style>
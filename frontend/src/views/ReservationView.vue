<script setup>
import Hall from '@/components/hall/Hall.vue'

import { useQuery } from '@vue/apollo-composable'
import gql from 'graphql-tag'

const props = defineProps({
    id: String
})

const selectedSeats = []

const rows = []
for (let i = 0; i < 10; i++) {
    rows.push({ number: i + 1, row: [] })
    for (let j = 1; j < 11; j++) {
        rows[i].row.push({ number: j, avaiability: true, selected: false });
    }
}

const { result, loading, error, onResult } = useQuery(gql`
        query getScreening($id: ID!){
            screening(id: $id){
            id
            language
            type
            time
            tickets{
            seat{
                row
                number
            }
        }
        }
        }
    `, {
    id: props.id
}
)

onResult(queryResult => {
    console.log(queryResult.data.screening.tickets)
    for (let i = 0; i < queryResult.data.screening.tickets.length; i++) {
        let seat = queryResult.data.screening.tickets[i].seat
        rows[seat.row - 1].row[seat.number - 1].avaiability = false
    }
})

function selectSeat(id, selected) {
    if (selected) {
        selectedSeats.push(id)
    } else {
        for (let i = 0; i < selectedSeats.length; i++) {
            if (arr[i] === id) {
                selectedSeats.splice(i, 1);
            }
        }
    }
}
</script>

<template>
    <div v-if="this.loading" class="container mt-1">
        <h1>Ładowanie danych...</h1>
    </div>
    <div v-else-if="this.error" class="container mt-1">
        <h1>Error: {{ this.error.message }}</h1>
    </div>
    <div v-else-if="this.result" class="container mt-1">
        {{ this.props.id }}
        <Hall :rows="this.rows" :selectSeat="selectSeat" />
        {{ result.screening.tickets }}
    </div>

</template>
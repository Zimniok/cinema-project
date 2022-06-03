<script setup>
import Hall from '@/components/hall/Hall.vue'

import { useQuery, useMutation } from '@vue/apollo-composable'
import gql from 'graphql-tag'

const props = defineProps({
    id: String
})

const selectedSeats = []

const rows = []
let ids = 1
for (let i = 0; i < 10; i++) {
    rows.push({ number: i + 1, row: [] })
    for (let j = 1; j < 11; j++) {
        rows[i].row.push({ number: j, avaiability: true, selected: false, id: ids});
        ids++
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

const { mutate: createTicket, onDone: createTicketDone, onError: createTicketError } = useMutation(gql`
        mutation createTicket($screening_id: Int!, $seat_id: Int!, $user_id: Int!){
            createTicket(screening_id: $screening_id, seat_id: $seat_id, user_id: $user_id){
                user{
                    id
                }
            }
        }
    `
)

function selectSeat(id, selected) {
    
    if (selected) {
        selectedSeats.push(id)
    } else {
        for (let i = 0; i < selectedSeats.length; i++) {
            if ( selectedSeats && selectedSeats[i] == id) {
                selectedSeats.splice(i, 1);
            }
        }
    }
}

function book() {
    if(selectedSeats.length  != 1){
        alert('Można zarezerwować tylko 1 miejsce')
    } else {
        createTicket({
            screening_id: parseInt(props.id),
            seat_id: parseInt(selectedSeats[0]),
            user_id: parseInt(JSON.parse(localStorage.getItem('user')).id)
        })
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
    <div v-else-if="this.result" class="container mt-1 mb-5">
        <h1 class="mb-3">Rezerwacja miejsca</h1>
        <Hall :rows="this.rows" :selectSeat="selectSeat" />
        <button class="btn btn-primary mt-2" @click="book()">Rezerwuj</button>
    </div>

</template>
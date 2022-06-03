<script setup>
import { ref, onMounted } from 'vue'

import { useQuery, useMutation } from '@vue/apollo-composable'
import gql from 'graphql-tag'

const email = ref('')
const password = ref('')

const { mutate: login, onDone, error: loginError } = useMutation(gql`
        mutation login($email: String!, $password: String!) {
            login(input: {
                username: $email,
                password: $password
            }) {
                access_token
                refresh_token
                expires_in
                token_type
                user {
                id
                email

                }
            }
            }
    `
)


function formSumbit() {
    login({
        email: email.value,
        password: password.value
    })
}

onDone(result => {
    console.log(result.data)
    localStorage.setItem('token', result.data.login.access_token)
    window.dispatchEvent(new CustomEvent('token-localstorage-changed', {
        detail: {
            loggedIn: true,
            user: JSON.stringify(result.data.login.user)
        }
    }));
    localStorage.setItem('user', JSON.stringify(result.data.login.user))    
})

</script>

<template>
    <div class="container mt-1">
        <h1>Zaloguj się</h1>
        <form @submit.prevent="formSumbit()">
            <div class="form-group">
                <label for="exampleInputEmail1">Adres email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Wprowadź adres email" v-model="email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Hasło</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Wprowadź hasło"
                    v-model="password">
            </div>
            <button type="submit" class="btn btn-primary">Zaloguj</button>
        </form>
        {{ loginError }}
    </div>
</template>

<style>
input {
    margin-bottom: 10px;
}

h1 {
    margin: 50px 0;
}
</style>
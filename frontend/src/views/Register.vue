<script setup>

import { ref, onMounted } from 'vue'

import { useQuery, useMutation } from '@vue/apollo-composable'
import gql from 'graphql-tag'

const { mutate: register, onDone, error: registreError } = useMutation(gql`
        mutation register($first_name: String!, $last_name: String!, $email: String!, $password: String!, $group: String!) {
            register(input: {
                first_name: $first_name
                last_name: $last_name
                email: $email
                password: $password
                group: $group
            }) {
                status
            }
            }

    `
)

const email = ref('')
const password = ref('')
const password2 = ref('')
const firstName = ref('')
const lastName = ref('')
const group = ref('user')

function formSumbit() {
    if (password.value == password2.value) {
        register({
            first_name: firstName.value,
            last_name: lastName.value,
            email: email.value,
            password: password.value,
            group: group.value
        })
    } else {
        alert('Wprowadzone hasła różnią się od siebie')
    }
}

onDone(result => {
    console.log(result.data)
    if(result.data.register.status == "SUCCESS"){
        alert('Udało się zarejestrować')
    }
    // localStorage.setItem('token', result.data.login.access_token)
    // window.dispatchEvent(new CustomEvent('token-localstorage-changed', {
    //     detail: {
    //         loggedIn: true,
    //         user: JSON.stringify(result.data.login.user)
    //     }
    // }));
    // localStorage.setItem('user', JSON.stringify(result.data.login.user))    
})
</script>

<template>
    <div class="container mt-1">
        <h1>Rejestracja</h1>
        <form @submit.prevent="formSumbit">
            <div class="form-group">
                <label for="firstNameInput">Imię</label>
                <input type="text" class="form-control" id="firstNameInput" placeholder="Wprowadź imię" required
                    v-model="firstName">
            </div>
            <div class="form-group">
                <label for="lastNameInput">Nazwisko</label>
                <input type="text" class="form-control" id="lastNameInput" placeholder="Wprowadź nazwisko" required
                    v-model="lastName">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Adres email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Wprowadź adres email" required v-model="email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Hasło</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Wprowadź hasło"
                    required v-model="password">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword2">Powtórz hasło</label>
                <input type="password" class="form-control" id="exampleInputPassword2"
                    placeholder="Wprowadź hasło ponownie" required v-model="password2">
            </div>
            <button type="submit" class="btn btn-primary">Zarejestruj</button>
        </form>
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
<script setup>
import { ref, onMounted } from 'vue'
import { reactive, computed } from 'vue'
import { RouterLink } from 'vue-router'

const data = reactive({
    loggedIn: localStorage.getItem('token') != null,
    user: {}
})

const isLoggedIn = computed(() => {
  return data.loggedIn === true
})

const username = computed(() => {
    return data.user == {} ? '' : data.user.email
})

onMounted(() => {
    window.addEventListener('token-localstorage-changed', (event) => {
    Object.assign(data, {
        loggedIn: event.detail.loggedIn,
        user: JSON.parse(event.detail.user)
        })
  });
})

function logout(){
    localStorage.removeItem('token');
    window.dispatchEvent(new CustomEvent('token-localstorage-changed', {
        detail: {
            loggedIn: false,
            user: '{}'
        }
    }));
    localStorage.removeItem('user');
}
</script>

<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <RouterLink class="nav-link" to="/">Home</RouterLink>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item active">
                        <RouterLink class="nav-link" to="/movie-list">Movie list</RouterLink>
                    </li>
                    <li class="nav-item">
                        <RouterLink class="nav-link" to="/add-movie">Dodaj film</RouterLink>
                    </li>
                    <li class="nav-item">
                        <RouterLink class="nav-link" to="/modify-movie">Modyfikuj film</RouterLink>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link disabled" href="#">{{isLoggedIn}}</a>
                    </li> -->
                </ul>
                <ul class="navbar-nav" v-if="!isLoggedIn">
                    <li class="nav-item">
                        <RouterLink class="nav-link" to="/login">Logowanie</RouterLink>
                    </li>
                    <li class="nav-item">
                        <RouterLink class="nav-link" to="/register">Rejestracja</RouterLink>
                    </li>
                </ul>
                <ul class="navbar-nav" v-else>
                    <li class="nav-item">
                        <a class="nav-link">{{username}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" @click="logout()">Wyloguj się</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<style>
</style>
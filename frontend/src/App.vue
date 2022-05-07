<script setup>
import { RouterLink, RouterView } from 'vue-router'
import HeaderNav from './components/header/HeaderNav.vue';
</script>

<template>
  <header>
    <HeaderNav />
    <!-- <img alt="Vue logo" class="logo" src="@/assets/logo.svg" width="125" height="125" />

    <div class="wrapper">
      <nav>
        
        <RouterLink to="/about">About</RouterLink>
      </nav>
    </div> -->
  </header>

  <RouterView />
</template>

<style>
</style>

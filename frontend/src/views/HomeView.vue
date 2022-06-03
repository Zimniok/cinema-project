<script setup>
import Test from '@/components/Test.vue'
FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
});
</script>

<template>
  <main>
    <Test />
    <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
    </fb:login-button>
  </main>
</template>

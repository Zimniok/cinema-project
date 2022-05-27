<script setup>
</script>

<template>
    <div class="container mt-1">
        <h1>Zaloguj się</h1>
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Adres email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Wprowadź adres email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Hasło</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Wprowadź hasło">
            </div>
            <button type="submit" class="btn btn-primary">Zaloguj</button>
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
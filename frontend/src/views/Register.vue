<script setup>
</script>

<template>
<div class="container mt-1">
        <h1>Rejestracja</h1>
        <form>
            <div class="form-group">
                <label for="firstNameInput">Imię</label>
                <input type="text" class="form-control" id="firstNameInput"
                    placeholder="Wprowadź imię" required>
            </div>
            <div class="form-group">
                <label for="lastNameInput">Nazwisko</label>
                <input type="text" class="form-control" id="lastNameInput"
                    placeholder="Wprowadź nazwisko" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Adres email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Wprowadź adres email" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Hasło</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Wprowadź hasło" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Powtórz hasło</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Wprowadź hasło ponownie" required>
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
<script setup>

</script>

<template>
    <form>
        <div>
            <label for="movieTitleInput" class="form-label">Tytuł filmu</label>
            <input type="text" class="form-control" id="movieTitleInput">
        </div>
        <div>
            <label for="movieTagsInput" class="form-label">Tagi filmu</label>
            <input type="text" class="form-control" id="movieTagsInput">
        </div>
        <div>
            <label for="movieLengthInput" class="form-label">Czas trwania filmu</label>
            <input type="text" class="form-control" id="movieLengthInput">
        </div>
        <div>
            <label for="movieShortDescriptionInput" class="form-label" rows="2">Krótki opis filmu</label>
            <textarea class="form-control" id="movieShortDescriptionInput"></textarea>
        </div>
        <div>
            <label for="movieLongDescriptionInput" class="form-label" rows="5">Długi opis filmu</label>
            <textarea class="form-control" id="movieLongDescriptionInput"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Zapisz</button>
    </form>
</template>

<style>
input {
    margin-bottom: 10px;
}
textarea {
    margin-bottom: 10px;
}
</style>
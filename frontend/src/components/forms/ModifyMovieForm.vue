<script setup>
import { ref, onMounted } from 'vue'

const props = defineProps({
    data: Object
})

const movieTitle = ref(props.data.title);
const movieTags = ref(props.data.tag);
const movieLength = ref(props.data.duration);
const movieDscShort = ref(props.data.short_description);
const movieDscLong = ref(props.data.long_description);

const screeningId = ref('')
const screeningDsc = ref('')
const screeningDate = ref('')
const screeningType = ref('')
const screeningLanguage = ref('')

function modifyScreening(index) {
    let screening = props.data.screenings[index]
    screeningId.value = screening.id
    screeningDsc.value = screening.description
    screeningDate.value = screening.time
    screeningType.value = screening.type
    screeningLanguage.value = screening.language
}

</script>

<template>
    <form>
        <div>
            <label for="movieTitleInput" class="form-label">Tytuł filmu</label>
            <input type="text" class="form-control" id="movieTitleInput" v-model="movieTitle" required>
        </div>
        <div>
            <label for="movieTagsInput" class="form-label">Tagi filmu</label>
            <input type="text" class="form-control" id="movieTagsInput" v-model="movieTags" required>
        </div>
        <div>
            <label for="movieLengthInput" class="form-label">Czas trwania filmu</label>
            <input type="text" class="form-control" id="movieLengthInput" v-model="movieLength" required>
        </div>
        <div>
            <label for="movieShortDescriptionInput" class="form-label" rows="2">Krótki opis filmu</label>
            <textarea class="form-control" id="movieShortDescriptionInput" v-model="movieDscShort" required></textarea>
        </div>
        <div>
            <label for="movieLongDescriptionInput" class="form-label" rows="5">Długi opis filmu</label>
            <textarea class="form-control" id="movieLongDescriptionInput" v-model="movieDscLong" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-1">Zapisz</button>


    </form>
    <h2 class="mt-5">Seanse</h2>
    <table class="table mt-2">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Opis</th>
                <th scope="col">Data seansu</th>
                <th scope="col">Typ</th>
                <th scope="col">Język</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(screening, idx) in this.props.data.screenings">
                <td>{{ screening.id }}</td>
                <td>{{ screening.description }}</td>
                <td>{{ screening.time }}</td>
                <td>{{ screening.type }}</td>
                <td>{{ screening.language }}</td>
                <td><button class="btn btn-outline-secondary" @click="modifyScreening(idx)"><i
                            class="fa-solid fa-pen"></i></button></td>
                <td><button class="btn btn-outline-danger"><i class="fa-solid fa-trash-can"></i></button></td>
            </tr>
        </tbody>
    </table>

    <h2 class="mt-5">Dodaj lub modyfikuj seans</h2>

    <form class="mt-2 mb-5">
        <div>
            <label for="screeningId" class="form-label">Id seansu</label>
            <input type="text" class="form-control" id="screeningId" v-model="screeningId" disabled>
        </div>
        <div>
            <label for="screeningDsc" class="form-label">Opis seansu</label>
            <input type="text" class="form-control" id="screeningDsc" v-model="screeningDsc" required>
        </div>
        <div>
            <label for="screeningDate" class="form-label">Data seansu</label>
            <input type="text" class="form-control" id="screeningDate" v-model="screeningDate" required>
        </div>
        <div>
            <label for="screeningType" class="form-label" rows="2">Typ seansu</label><br/>
            <input type="radio" id="2d" value="2D" v-model="screeningType" />
            <label for="2d">2D</label>

            <input class="ms-2" type="radio" id="3d" value="3D" v-model="screeningType" />
            <label for="3d">3D</label>
        </div>
        <div>
            <label for="screeningLanguage" class="form-label" rows="5">Język seansu </label> 
            <input type="text" class="form-control" id="screeningLanguage" v-model="screeningLanguage" required>
        </div>
        <button type="submit" class="btn btn-primary mt-1">Zapisz</button>
        <button type="reset" class="btn btn-primary mt-1 ms-2">Wyczyść</button>


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
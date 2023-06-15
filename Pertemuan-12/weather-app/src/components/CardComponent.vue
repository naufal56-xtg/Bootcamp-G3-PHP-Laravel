<template>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">{{ data.nama }}</h5>
            <div class="d-flex justify-content-center mt-2">
                <img :src="image" alt="" class="img-1">
            </div>
            <h1 class="text-center pt-1">{{ data.celcius }}</h1>
        </div>
    </div>
</template>

<script>

export default {
    name: 'CardComponent',
    props: {
        data: Array,
    },
    data() {
        return {
            image: require('../assets/img/' + this.data.gambar)
        }
    }
}
</script>

<style scoped>
.card {
    /* margin-top: 20% !important; */
    width: 35% !important;
    height: 40vh !important;
}


h1 {
    margin-top: 10% !important;
}

.img-1 {
    width: 120px;
}
</style>
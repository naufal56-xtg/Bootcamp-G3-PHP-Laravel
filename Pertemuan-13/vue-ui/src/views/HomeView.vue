<template>
  <div>
    <h1>Home Pages</h1>
    <hr>
    <div class="d-flex gap-4">
      <div class="card" v-for="data in datas" :key="data.id" style="width: 18rem;">
        <div class="cover-image">
          <img :src="'http://localhost:8000/images/' + data.foto" class="card-img-top" :alt="data.nama" />
        </div>
        <div class="card-body">
          <h5 class="card-title">{{ data.nama }}</h5>
          <p class="card-text">
            {{ data.desc }}
          </p>
          <h5>Qty : {{ data.qty }}</h5>
          <h5>Rp. {{ data.harga }}</h5>
          <a href="#" class="btn btn-primary">Detail</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  name: 'HomeView',
  data() {
    return {
      datas: [],
    }
  },
  mounted() {
    axios.get('http://localhost:8000/api/products').then(response => {
      this.datas = response.data.data;
    });
  },
}
</script>

<style scoped>
.cover-image {
  width: 100%;
  height: 150px;
  display: flex;
  justify-content: center;
  align-items: center;
  overflow: hidden;
}
</style>

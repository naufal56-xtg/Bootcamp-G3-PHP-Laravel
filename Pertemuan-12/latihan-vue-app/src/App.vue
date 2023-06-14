<template>
  <NavbarComponent v-bind:nama="nama" item1="About" />
  <h1>Hallo {{ nama }}</h1>
  <img alt="Vue logo" src="./assets/logo.png">
  <HelloWorld msg="Welcome to Your Vue.js App" class="hello" :mhs="mahasiswa" />
  <input type="text" v-model="nama" class="mb-3">
  <div class="d-flex justify-content-center">
    <button @click="alert()" class="d-block">Alert</button>
  </div>
</template>

<script>
import HelloWorld from './components/HelloWorld.vue'
import NavbarComponent from "./components/NavbarComponent.vue";

export default {
  name: 'App',
  components: {
    HelloWorld,
    NavbarComponent,
  },
  data() {
    return {
      nama: 'Naufal Hadi',
      mahasiswa: [
        {
          nama: 'Bambang Susanto',
          usia: 18,
          jk: 'Laki - Laki'
        },
        {
          nama: 'Santi Susanti',
          usia: 19,
          jk: 'Perempuan'
        },
        {
          nama: 'Asep Nurohman',
          usia: 20,
          jk: 'Laki - Laki'
        },
        {
          nama: 'Rizki Muhammad',
          usia: 18,
          jk: 'Laki - Laki'
        },
      ]
    }
  },
  methods: {
    alert() {
      alert('Hallo ' + this.nama)
    }
  }
}
</script>

<style>
h1 {
  color: aqua;
}

.hello {
  margin-bottom: 20px;
}

#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;

}
</style>

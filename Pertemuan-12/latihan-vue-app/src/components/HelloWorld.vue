<template>
  <div class="hello">
    <h1>{{ msg }}</h1>
    <h3>Latihan Vue JS</h3>
  </div>

  <div class="d-flex justify-content-center">
    <div class="col-md-4">
      <table class="table table-bordered">
      <thead>
        <tr>
          <td>No</td>
          <td>Nama</td>
          <td>Umur</td>
          <td>Jenis Kelamin</td>
        </tr>
      </thead>
      <tbody v-for="(data, index) in mhs" :key="index">
        <tr>
          <td>{{ index + 1 }}</td>
          <td>{{ data.nama }}</td>
          <td>{{ data.usia }}</td>
          <td>{{ data.jk }}</td>
        </tr>
      </tbody>
    </table>
    </div>
  </div>
</template>

<script>
export default {
  name: 'HelloWorld',
  props: {
    msg: String,
    mhs: Array
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h1 {
  color: aqua;
}
h3 {
  margin: 40px 0 0;
  color: aqua;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>

<template>
  <div class="container">
    <h1>Admin Page</h1>
    <hr>
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <div v-if="editId > 0">
              <form @submit.prevent="updateProduct(editId, foto)">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group mb-3">
                      <label for="nama" class="mb-2">Nama Produk</label>
                      <input type="text" name="" class="form-control" placeholder="Input Nama Produk" v-model="nama">
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="harga" class="mb-2">Harga Produk</label>
                      <input type="number" name="" class="form-control" placeholder="Input Harga Produk" v-model="harga">
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="qty" class="mb-2">Qty Produk</label>
                      <input type="number" name="" class="form-control" placeholder="Input Qty" v-model="qty">
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group mb-3">
                      <label for="gambar" class="mb-2">Gambar Produk</label>
                      <input type="file" class="form-control" placeholder="Input Gambar Produk" @change="upload">
                      <div v-if="foto">
                        <img :src="'http://localhost:8000/images/' + foto" class="previewImage mt-3">
                      </div>
                      <img v-else :src="previewImage" class="previewImage mt-3">
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group mb-3">
                      <label for="desc" class="mb-2">Deskripsi Produk</label>
                      <textarea class="form-control" cols="30" rows="10" v-model="desc"></textarea>
                    </div>
                  </div>


                </div>
                <button type="submit" class="btn btn-warning">Update</button>
              </form>

            </div>
            <div v-else>
              <form @submit.prevent="addProduct()">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group mb-3">
                      <label for="nama" class="mb-2">Nama Produk</label>
                      <input type="text" class="form-control" placeholder="Input Nama Produk" v-model="nama">
                    </div>


                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="harga" class="mb-2">Harga Produk</label>
                      <input type="number" class="form-control" placeholder="Input Harga Produk" v-model="harga">
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="qty" class="mb-2">Qty Produk</label>
                      <input type="number" class="form-control" placeholder="Input Qty" v-model="qty">
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group mb-3">
                      <label for="gambar" class="mb-2">Gambar Produk</label>
                      <input type="file" class="form-control" placeholder="Input Gambar Produk" @change="upload">
                      <div v-if="foto">
                        <img :src="previewImage" class="previewImage mt-3">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group mb-3">
                      <label for="desc" class="mb-2">Deskripsi Produk</label>
                      <textarea name="" class="form-control" cols="30" rows="10" v-model="desc"></textarea>
                    </div>
                  </div>


                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <table class="table table-bordered text-center">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Produk</th>
                  <th>Harga</th>
                  <th>Qty</th>
                  <th>Gambar</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="( data, index ) in  datas " :key="data.id">
                  <td class="pt-4">{{ index + 1 }}</td>
                  <td class="pt-4">{{ data.nama }}</td>
                  <td class="pt-4">{{ data.harga }}</td>
                  <td class="pt-4">{{ data.qty }}</td>
                  <td>
                    <img :src="'http://localhost:8000/images/' + data.foto" class="img-foto" :alt="data.nama" />
                  </td>
                  <td class="pt-4">
                    <a href="" @click.prevent="editProduct(data.id)"><i class="fa fa-edit edit"></i></a>
                    <a href="" @click.prevent="deleteProduct(data.id)"><i class="fa fa-trash text-danger"></i></a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import { useToast } from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

export default {
  name: 'HomeView',
  data() {
    return {
      datas: [],
      editId: null,
      nama: '',
      harga: 0,
      qty: 0,
      desc: '',
      foto: null,
      previewImage: null,
    }
  },
  mounted() {
    axios.get('http://localhost:8000/api/products').then(response => {
      this.datas = response.data.data;
    });
  },
  methods: {
    getProduct() {
      axios.get('http://localhost:8000/api/products').then(response => {
        this.datas = response.data.data;
      });
    },

    upload(e) {
      this.foto = e.target.files[0];
      this.previewImage = URL.createObjectURL(this.foto);
    },

    addProduct() {
      const $toast = useToast();

      let formData = new FormData();
      formData.append('nama', this.nama);
      formData.append('harga', this.harga);
      formData.append('qty', this.qty);
      formData.append('desc', this.desc);
      formData.append('foto', this.foto);


      axios.post('http://localhost:8000/api/products/store', formData, {
        Headers: {
          'Content-Type': 'multipart/form-data'
        }
      }).then((response) => {
        this.getProduct();
        this.nama = '';
        this.desc = '';
        this.harga = 0;
        this.qty = 0;
        this.foto = '';
        $toast.success(response.data.msg, {
          position: 'top-right',
          duration: 3000,
        });
      }).catch((error) => {
        console.log(error);
      });
    },

    deleteProduct(id) {
      const $toast = useToast();
      axios.delete('http://localhost:8000/api/products/delete/' + id).then((response) => {
        this.getProduct();
        $toast.success(response.data.msg, {
          position: 'top-right',
          duration: 3000,
        });
      }).catch((error) => {
        console.log(error);
      });
    },

    editProduct(id) {
      axios.get('http://localhost:8000/api/products/detail/' + id).then(response => {
        this.editId = id;
        this.nama = response.data.data.nama
        this.harga = response.data.data.harga
        this.qty = response.data.data.qty
        this.desc = response.data.data.desc
        this.foto = response.data.data.foto
      }).catch((error) => {
        console.log(error);
      });
    },

    updateProduct(id, foto) {
      const $toast = useToast();
      let formData = new FormData();
      formData.append('nama', this.nama);
      formData.append('harga', this.harga);
      formData.append('qty', this.qty);
      formData.append('desc', this.desc);
      formData.append('foto', foto);

      axios.post('http://localhost:8000/api/products/update/' + id, formData, {
        Headers: {
          'Content-Type': 'multipart/form-data'
        }
      }).then((response) => {
        this.getProduct();
        this.nama = '';
        this.desc = '';
        this.harga = 0;
        this.qty = 0;
        this.editId = 0;
        this.foto = null;
        $toast.success(response.data.msg, {
          position: 'top-right',
          duration: 3000,
        });
      }).catch((error) => {
        console.log(error);
      });
    }
  }
}
</script>

<style scoped>
.img-foto {
  width: 100px;
}

.previewImage {
  width: 320px;
  height: 200px;
}

.edit {
  margin-right: 10px !important;
}
</style>

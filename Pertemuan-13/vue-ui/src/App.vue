<template>
  <NavbarComponent></NavbarComponent>
  <router-view class="mt-4 container" />
</template>

<script>
import NavbarComponent from '@/components/NavbarComponent.vue';
export default {
  name: 'App',
  components: {
    NavbarComponent,
  }
}
</script>

<style></style>

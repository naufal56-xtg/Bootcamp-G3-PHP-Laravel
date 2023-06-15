<template>
  <div class="weather-app">
    <div class="row">
      <div class="col">
        <div class="container-text">
          <h1 class="fs-1 text-white">Jakarta</h1>
          <div class="container-celcius">
            <svg width="100" height="100" class="svg-awan" viewBox="0 0 136 136" fill="none"
              xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <g filter="url(#filter0_d_301_8)">
                <rect x="4" y="4" width="122" height="122" fill="url(#pattern0)" shape-rendering="crispEdges" />
              </g>
              <defs>
                <filter id="filter0_d_301_8" x="0" y="0" width="136" height="136" filterUnits="userSpaceOnUse"
                  color-interpolation-filters="sRGB">
                  <feFlood flood-opacity="0" result="BackgroundImageFix" />
                  <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                    result="hardAlpha" />
                  <feOffset dx="3" dy="3" />
                  <feGaussianBlur stdDeviation="3.5" />
                  <feComposite in2="hardAlpha" operator="out" />
                  <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                  <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_301_8" />
                  <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_301_8" result="shape" />
                </filter>
                <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                  <use xlink:href="#image0_301_8" transform="scale(0.00833333)" />
                </pattern>
                <image id="image0_301_8" width="120" height="120"
                  xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAB4CAMAAAAOusbgAAAANlBMVEUAAADs7Ozq6uqysrLZ2dnk5OTo6OjLy8vf39/FxcXU1NTPz8+3t7fAwMC8vLzIyMi5ubnExMSvhpJYAAAAA3RSTlMAiMyb/lgGAAABiElEQVRo3u3Wa27sIAyGYWc+A4EkJN3/Zs9R1fZHL1N8GUaV/GzglSMwoRBCCCH8cbfEb9ZE09z4k5VmyPwdejh+N3fqxD9b6HH4rkwKiu68z82/SvQIK//uRv4SjyB/PGZCd87RXniU+8DzR84ri3heovnhxHLr8h/ZsEGydG3WuV37Bl3ZLutXxvwyf9G2VyyyGH8lW+340M/Gw0wDlx2f9MKDkj584jv7aFp7tNqFH/TGI7JuVxbcUXjAqgofgLmsCR+AomwPH4CibA8XDNj8ww1DfMMLM18Y0l3DxHxi0OYcxqjueY/pVjDspWyO79MOkev0ep4g9mJd1ZlLrQcUimHgVGFQtd3lgM2hO1kMs1PT3eCgyb9zg4dLfJ4zfBTpvtrh4yIZhhflirRrJJHgppJEgR+S6M8KI8J/MLzPDuuuU4WblSQa3JAMvFSSOeBkIZkMH5WkKjzsJLfDwULPKSeiZ5T3TEoVFpX0UofWkckkb11TbeRhEaIQQgghhBBCCCGEu/4BEhE960SMYoYAAAAASUVORK5CYII=" />
              </defs>
            </svg>

            <p class="text-berawan text-white">
              Berawan, 31 C
            </p>
          </div>
          <div class="devider"></div>

          <h2 class="text-keep text-white">
            Keep Save
          </h2>
        </div>
      </div>
      <div class="col">
        <div class="tanggal">
          <p class="text-tgl text-white">Kamis, 8 November 2021</p>
          <div class="line"></div>
        </div>
        <CardComponent v-for="(data, index) in cuaca" :key="index" :data="data" class="d-inline-block me-5" />

      </div>

      <div class="clock">
        <div class="card-clock">
          <p class="card-title-clock text-center text-white">12</p>
        </div>
        <div class="clock-circle-1"></div>
        <div class="clock-circle-2"></div>
        <div class="card-clock">
          <p class="card-title-clock text-center text-white">00</p>
        </div>
      </div>

    </div>
  </div>
</template>

<script>

import CardComponent from './components/CardComponent.vue';
export default {
  name: 'App',
  components: {
    CardComponent,
  },
  data() {
    return {
      cuaca: [
        {
          nama: 'Yogyakarta',
          gambar: 'yogya.png',
          celcius: '32 C',
        },
        {
          nama: 'Bekasi',
          gambar: 'bekasi.png',
          celcius: '28 C',
        },
      ]
    }
  }
}
</script>

<style>
#app {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Roboto', sans-serif;
}

.weather-app {
  height: 120vh;
  background: linear-gradient(to bottom right, #27A5F9, #EEEEEE);
}

.container-text {
  padding-top: 30% !important;
  margin-left: 20% !important;
}

.container-celcius {
  position: relative;
  width: 60%;
  height: 10vh;
  background: rgba(238, 238, 238, 0.5);
  border-radius: 10px;
}

.svg-awan {
  position: absolute;
  top: -2.5vh;
  left: -7vh;
}

.text-berawan {
  margin-left: 48px;
  font-size: 40px;
  font-weight: 300;
}

.devider {
  margin-top: 5%;
  width: 80%;
  height: 1vh;
  background: #EEEEEE;
}

.text-keep {
  margin-top: 1%;
  font-size: 36px;
  font-weight: 400;
}


.tanggal {
  margin-top: 20% !important;
  position: relative;
}

.text-tgl {
  margin-top: 20%;
  font-size: 20px;
}


.line {
  position: absolute;
  top: 2vh;
  left: 40vh;
  width: 50%;
  height: 1vh;
  background-color: #EEEEEE;
}

.fs-1 {
  font-size: 80px !important;
}

.clock {
  position: relative;
  margin-top: 5%;
  margin-left: 71%;
}

.card-clock {
  display: inline-block;
  background-color: transparent !important;
  width: 6% !important;
  height: 15vh !important;
  border: 2px solid white;
  border-radius: 5px;
  margin-right: 2%;
}

.card-title-clock {
  font-size: 40px;
  font-weight: bold;
  padding-top: 20%;
}

.clock-circle-1 {
  position: absolute;
  bottom: 9vh;
  left: 19.4vh;
  display: inline-block;
  width: 10px;
  height: 10px;
  border-radius: 10px;
  background-color: white;
}

.clock-circle-2 {
  display: inline-block;
  width: 10px;
  height: 10px;
  border-radius: 10px;
  background-color: white;
  margin-right: 2%;
}
</style>

<template>
  <div>
    <div class="form-group">
      <select
        class="form-control"
        name="country_id"
        v-model="country"
        @change="getStates()"
      >
        <option value="" selected>Choose Country</option>
        <option
          v-for="country in countries"
          :value="country.id"
          :key="country.id"
        >
          {{ country.name }}
        </option>
      </select>
    </div>

    <div class="form-group">
      <select
        class="form-control"
        name="state_id"
        v-model="state"
        @change="getCities()"
      >
        <option value="" selected>Choose State</option>
        <option
          v-for="state in states"
          :value="state.id"
          :key="state.id"
        >
          {{ state.name }}
        </option>
      </select>
    </div>

    <div class="form-group">
      <select 
        class="form-control" 
        name="city_id" 
        v-model="city"
        >
        <option value="" selected>Choose City</option>
        <option
          v-for="city in cities"
          :value="city.id"
          :key="city.id"
        >
          {{ city.name }}
        </option>
      </select>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      country: "",
      countries: [],
      state: "",
      states: [],
      city: "",
      cities: [],
    };
  },
  mounted() {
    this.getCountries();
  },
  methods: {
    getCountries() {
      axios.get("/api/country").then((response) => {
        this.countries = response.data;
      });
    },
    getStates() {
      axios
        .get("/api/state", {
          params: { country_id: this.country },
        })
        .then((response) => {
          this.states = response.data;
        });
    },
    getCities() {
      axios
        .get("/api/city", {
          params: { state_id: this.state },
        })
        .then((response) => {
          this.cities = response.data;
        });
    },
  },
};
</script>

<style></style>

<template>
  <v-card class="mx-auto" max-width="300">
      <v-list-item v-for="item in items" :key="item.id">
        <v-list-item-title>
         ({{ item.name }})
          <v-list-item-subtitle>{{ item.description }}</v-list-item-subtitle>
          <v-btn :to="`/contrats/${item.id}`" color="primary">View Details</v-btn>
        </v-list-item-title>
      </v-list-item>
  </v-card>
</template>
<script setup>
import { contractApi } from '../../services/api'
import { ref, onMounted } from 'vue'
import { useRoute } from 'vue-router'

const route = useRoute()
const id = route.params.id

const items = ref({})

async function fetchContrat() {
  try {
    const response = await contractApi.getOne(id)
    items.value = response.data.data
  } catch (err) {
    console.error('Error fetching contrats:', err)
  }
}

onMounted(() => {
  fetchContrat()
})

</script>

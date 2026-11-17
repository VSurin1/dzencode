<script setup>
import { onMounted, ref } from 'vue'

const status = ref('Проверяем подключение…')
const loading = ref(false)

async function checkApi() {
  loading.value = true
  try {
    const response = await fetch('/api/health', {
      headers: { Accept: 'application/json' },
    })
    if (!response.ok) throw new Error(`HTTP ${response.status}`)
    const data = await response.json()
    status.value = `${data.service} ${data.version}: ${data.status}`
  } catch {
    status.value = 'API недоступен. Попробуйте ещё раз.'
  } finally {
    loading.value = false
  }
}

onMounted(checkApi)
</script>

<template>
  <main>
    <span class="badge">DZENCODE</span>
    <h1>Vue SPA + Laravel API</h1>
    <p>Отдельные приложения. Один домен.</p>
    <section aria-live="polite" :aria-busy="loading">
      <span class="label">Подключение к API</span>
      <p>{{ status }}</p>
    </section>
    <button :disabled="loading" @click="checkApi">
      {{ loading ? 'Проверяем…' : 'Проверить подключение' }}
    </button>
  </main>
</template>

<template>
  <section class="mt-12 grid grid-cols-1 md:grid-cols-4 gap-6">
    <div 
      v-for="feature in features" 
      :key="feature.title"
      class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm flex items-center gap-5 hover:border-vert-sauge transition-colors"
    >
      <span class="material-symbols-outlined text-4xl text-vert-sauge">{{ feature.icon }}</span>
      <div>
        <h4 class="font-bold text-sm text-gris-ardoise">{{ feature.title }}</h4>
        <p class="text-[11px] text-gray-500">{{ feature.description }}</p>
      </div>
    </div>
  </section>
</template>

<script setup>
const features = [
  {
    icon: 'public',
    title: 'Sourcing Mondial',
    description: 'Tarifs directs usine pour l\'Afrique'
  },
  {
    icon: 'verified_user',
    title: 'Assurance Commerciale',
    description: 'Paiements locaux sécurisés en dépôt'
  },
  {
    icon: 'local_shipping',
    title: 'Logistique Régionale',
    description: 'Distribution Cotonou & N\'Djamena'
  },
  {
    icon: 'support_agent',
    title: 'Support Local 24h/24',
    description: 'Agents parlant français et arabe'
  }
]
</script>

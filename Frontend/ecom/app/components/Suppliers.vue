<template>
  <section class="mt-12">
    <div class="flex items-center justify-between mb-6">
      <h3 class="text-2xl font-extrabold text-gris-ardoise tracking-tight">Nos Meilleurs Fournisseurs du Hub</h3>
      <button class="text-sm font-bold text-bleu-acier flex items-center gap-1 hover:underline">
        Voir Tous les Partenaires <span class="material-symbols-outlined text-base">arrow_right_alt</span>
      </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div 
        v-for="supplier in suppliers" 
        :key="supplier.name"
        class="bg-white p-5 rounded-lg border border-gray-200 flex gap-5 hover:border-jaune-moutarde transition-all shadow-sm"
      >
        <div class="size-20 bg-blanc-casse rounded-lg flex items-center justify-center shrink-0 border border-gray-100">
          <span class="material-symbols-outlined text-gris-ardoise/30 text-4xl">{{ supplier.icon }}</span>
        </div>
        <div class="flex-1">
          <div class="flex items-center gap-2 mb-2">
            <h4 class="font-bold text-base">{{ supplier.name }}</h4>
            <span 
              class="text-[9px] font-black px-2 py-0.5 rounded"
              :class="supplier.badgeClass"
            >
              {{ supplier.badge }}
            </span>
          </div>
          <p class="text-[11px] text-gray-600 mb-3 leading-relaxed">{{ supplier.description }}</p>
          <div class="flex items-center gap-1">
            <span class="material-symbols-outlined text-jaune-moutarde text-xs">star</span>
            <span class="text-[11px] font-bold text-gris-ardoise">{{ supplier.rating }}</span>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
const suppliers = [
  {
    name: 'Hub Technologique de Shenzen',
    icon: 'factory',
    badge: 'VÉRIFIÉ',
    badgeClass: 'bg-vert-sauge/10 text-vert-sauge',
    description: 'Spécialistes en électronique haut de gamme et accessoires mobiles.',
    rating: '4.9 (1 200+ Avis)'
  },
  {
    name: 'Export Automobile Africain',
    icon: 'local_shipping',
    badge: 'PLATINE',
    badgeClass: 'bg-bleu-acier/10 text-bleu-acier',
    description: 'Spécialistes de l\'importation d\'équipements et pièces détachées pour Cotonou.',
    rating: '4.8 (850+ Avis)'
  },
  {
    name: 'Tissus Mondiaux S.A.R.L.',
    icon: 'inventory_2',
    badge: 'VÉRIFIÉ',
    badgeClass: 'bg-vert-sauge/10 text-vert-sauge',
    description: 'Fabrication textile, vêtements et tissus en gros.',
    rating: '5.0 (2 100+ Avis)'
  }
]
</script>

<template>
  <aside class="w-72 flex-shrink-0 bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden hidden lg:block">
    <div class="bg-gris-ardoise text-white px-5 py-4 flex items-center gap-3 font-bold text-sm tracking-wide">
      <span class="material-symbols-outlined text-xl">grid_view</span> MES CATÉGORIES
    </div>
    <nav class="flex flex-col text-sm py-2">
      <NuxtLink 
        v-for="category in categories" 
        :key="category.name"
        :to="category.link"
        class="px-5 py-3 border-b border-gray-50 category-hover flex justify-between items-center transition-colors"
      >
        {{ category.name }} 
        <span class="material-symbols-outlined text-xs opacity-40">chevron_right</span>
      </NuxtLink>
      <NuxtLink 
        to="#" 
        class="px-5 py-4 font-bold text-bleu-acier hover:text-vert-sauge transition-colors flex items-center gap-2"
      >
        <span class="material-symbols-outlined text-sm">apps</span> Voir Toutes les Catégories
      </NuxtLink>
    </nav>
  </aside>
</template>

<script setup>
const categories = [
  { name: 'Voitures & Transport', link: '#' },
  { name: 'Électronique & High-Tech', link: '#' },
  { name: 'Bébés & Enfants', link: '#' },
  { name: 'Maison & Décoration', link: '#' },
  { name: 'Machines Industrielles', link: '#' },
  { name: 'Santé & Beauté', link: '#' },
  { name: 'Vêtements & Mode', link: '#' },
  { name: 'Agriculture', link: '#' },
  { name: 'Construction', link: '#' }
]
</script>

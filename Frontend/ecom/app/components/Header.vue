<template>
  <header class="bg-gris-ardoise text-white sticky top-0 z-50 shadow-md">
    <div class="max-w-[1400px] mx-auto px-4 py-5 flex items-center gap-10">
      <div class="flex items-center gap-3 flex-shrink-0">
        <div class="size-11 bg-vert-sauge rounded-lg flex items-center justify-center text-white shadow-inner">
          <span class="material-symbols-outlined text-3xl">hub</span>
        </div>
        <div class="leading-none">
          <h1 class="text-white text-2xl font-extrabold tracking-tight">
            GLOBAL<span class="text-jaune-moutarde">HUB</span>
          </h1>
          <p class="text-[10px] uppercase font-bold text-white/50 tracking-[0.2em]">Passerelle du Commerce Africain</p>
        </div>
      </div>

      <div class="flex-1 flex">
        <div class="relative flex-1 group">
          <input 
            v-model="searchQuery"
            class="w-full h-12 px-5 rounded-l-md border-none focus:outline-none focus:ring-2 focus:ring-vert-sauge text-gris-fonce text-sm" 
            placeholder="Rechercher des produits, fournisseurs ou catégories..." 
            type="text"
          />
          <button 
            @click="handleSearch"
            class="absolute right-0 top-0 h-12 bg-vert-sauge text-white px-8 rounded-r-md font-bold hover:brightness-110 transition-all flex items-center gap-2"
          >
            <span class="material-symbols-outlined">search</span> Rechercher
          </button>
        </div>
      </div>

      <div class="flex items-center gap-8 text-white/90">
        <div class="flex flex-col items-center cursor-pointer hover:text-jaune-moutarde transition-colors">
          <span class="material-symbols-outlined">person</span>
          <span class="text-[10px] font-bold mt-1 uppercase">Mon Compte</span>
        </div>
        <div class="flex flex-col items-center cursor-pointer hover:text-jaune-moutarde transition-colors relative">
          <span class="material-symbols-outlined">shopping_cart</span>
          <span class="text-[10px] font-bold mt-1 uppercase">Panier</span>
          <span class="absolute -top-1 -right-1 bg-jaune-moutarde text-gris-ardoise text-[9px] rounded-full size-4 flex items-center justify-center font-black shadow-sm">
            {{ cartCount }}
          </span>
        </div>
      </div>
    </div>
  </header>
</template>

<script setup>
const searchQuery = ref('')
const cartCount = ref(3)

const handleSearch = () => {
  console.log('Searching for:', searchQuery.value)
  // Implémenter la logique de recherche ici
}
</script>

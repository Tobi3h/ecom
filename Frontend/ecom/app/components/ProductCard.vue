<template>
  <div class="bg-white border border-gray-200 p-3 rounded-lg hover:shadow-xl transition-all cursor-pointer relative group">
    <div class="aspect-square mb-3 bg-blanc-casse rounded-md overflow-hidden p-2">
      <img 
        v-if="product.image"
        :alt="product.name" 
        class="w-full h-full object-contain mix-blend-multiply group-hover:scale-105 transition-transform" 
        :src="product.image"
      />
      <div v-else class="w-full h-full flex items-center justify-center">
        <span class="material-symbols-outlined text-4xl text-gray-300">image</span>
      </div>
    </div>
    
    <p class="text-[9px] font-black text-bleu-acier mb-1">{{ product.category }}</p>
    <h4 class="text-xs font-bold text-gris-fonce h-8 line-clamp-2 leading-tight">{{ product.name }}</h4>
    
    <div class="mt-3">
      <p class="text-base font-black text-vert-sauge">{{ product.price }}</p>
      <p class="text-[9px] text-gray-500 font-medium">{{ product.minOrder }}</p>
    </div>
    
    <div 
      v-if="product.badge" 
      class="absolute top-3 right-3 text-[9px] font-black px-1.5 py-0.5 rounded"
      :class="product.badgeClass"
    >
      {{ product.badge }}
    </div>
  </div>
</template>

<script setup>
defineProps({
  product: {
    type: Object,
    required: true
  }
})
</script>

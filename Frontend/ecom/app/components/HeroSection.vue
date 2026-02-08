<template>
  <div class="grid grid-cols-12 gap-4 h-[440px]">
    <div 
      class="col-span-8 bg-cover bg-center rounded-lg relative group overflow-hidden shadow-sm" 
      style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAYx49KpmMnQRsqpvgk6w5kZMn__3PeqaZwV8ezWGyKOHakQQl3jEPlV1zAH-1q-6FWrExewRsvLWC-BeXR2aU1hXqwORzrwEs6NuMis4ZBvT2uaQWPXdf85rQ4gZpCHGVBxzNrzPMlZOCYCpqe8TYkMVb9BYtQ2q-L0YBBiAqdNXMf9zKIJ2slAr83R9vegBU1pQ7fKnCDdbWlOFx6VZT3V0BOCVtHa4YhSY_ASB7lOSedqadwDBz-vIQVqdG-ZnT_wgTSYchwf3A');"
    >
      <div class="absolute inset-0 bg-gradient-to-r from-gris-ardoise/80 to-transparent p-12 flex flex-col justify-center">
        <span class="bg-jaune-moutarde text-gris-ardoise px-3 py-1 text-[10px] font-black w-fit mb-4 rounded shadow-sm">
          SUPER OFFRE : ACHAT EN GROS
        </span>
        <h2 class="text-5xl font-extrabold text-white leading-tight mb-6 tracking-tight">
          DIRECT IMPORT TO <br /> COTONOU & N'DJAMENA
        </h2>
        <p class="text-white/90 max-w-sm text-base mb-8 font-medium leading-relaxed">
          Connectez-vous avec 50 000+ fournisseurs globaux vérifiés. Obtenez des tarifs de gros exclusifs sur les appareils technologiques et les machines industrielles.
        </p>
        <button class="bg-vert-sauge text-white px-10 py-4 font-bold rounded-md hover:brightness-110 shadow-lg transition-all w-fit">
          Demander un Devis
        </button>
      </div>
    </div>

    <div class="col-span-4 flex flex-col gap-4">
      <div class="h-1/2 bg-bleu-acier rounded-lg p-8 flex flex-col justify-center text-white relative overflow-hidden shadow-sm">
        <div class="absolute -right-4 -bottom-4 opacity-10">
          <span class="material-symbols-outlined text-[140px]">local_shipping</span>
        </div>
        <h3 class="font-bold text-2xl leading-tight">Livraison Rapide au Bénin</h3>
        <p class="text-sm text-white/80 mt-2">Livraison garantie en 15 jours via le port de Cotonou.</p>
        <NuxtLink to="#" class="text-jaune-moutarde text-sm font-bold mt-6 flex items-center group">
          Voir les Tarifs de Livraison 
          <span class="material-symbols-outlined text-sm ml-2 group-hover:translate-x-1 transition-transform">arrow_forward</span>
        </NuxtLink>
      </div>

      <div class="h-1/2 bg-beige-chaud rounded-lg p-8 flex flex-col justify-center text-gris-ardoise shadow-sm">
        <h3 class="font-bold text-2xl leading-tight">Paiement à la Livraison</h3>
        <p class="text-sm text-gris-ardoise/70 mt-2">Vérifiez la qualité dans nos centres locaux avant paiement final.</p>
        <button class="mt-6 bg-gris-ardoise text-white text-[11px] font-bold py-3 px-6 rounded-md hover:opacity-90 w-fit">
          EN SAVOIR PLUS
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
</script>

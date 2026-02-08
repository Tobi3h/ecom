<template>
  <div>
    <div class="bg-white p-5 border border-gray-200 rounded-lg shadow-sm flex items-center justify-between mb-6">
      <div class="flex items-center gap-6">
        <h3 class="text-xl font-extrabold text-gris-ardoise uppercase tracking-tight flex items-center gap-2">
          <span class="material-symbols-outlined text-jaune-moutarde">trending_up</span> Tendances du Moment
        </h3>
        <div class="flex gap-3">
          <span class="bg-jaune-moutarde/20 text-gris-fonce text-[10px] font-black px-3 py-1 rounded-full uppercase tracking-wider">
            Enchères en Direct
          </span>
          <span class="bg-bleu-acier/20 text-bleu-acier text-[10px] font-black px-3 py-1 rounded-full uppercase tracking-wider">
            Nouveautés
          </span>
        </div>
      </div>
      <NuxtLink to="#" class="text-sm font-bold text-bleu-acier hover:underline">Voir Plus d'Annonces</NuxtLink>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
      <ProductCard 
        v-for="product in products" 
        :key="product.id"
        :product="product"
      />
    </div>
  </div>
</template>

<script setup>
const products = [
  {
    id: 1,
    name: 'Écouteurs Bluetooth Haut de Gamme Lot Gros',
    category: 'AUDIO PREMIUM',
    price: '22.500 CFA',
    minOrder: 'Commande Min : 5 Unités',
    image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuDrMcedIIPt2V8yZsNTFBKAcu5omkHns2RJjSYkXlodjdqtqiDbkZ517X_UfzTm9QQxHvSPUXhhA93i_4wc0FIXQl3p9E0wFGX6ra2jTWBPadmKL56A60gY4xA02skxNTBR2q0Xbum43xm6tGpoqoR8O5gGcYNTET3h-EYHq9rfUwT29wFmZi8O1VxJOPKk8dob-UsLhLlgdjLSUe9qpk8ZvMB_Z0TV-BTEiPLOrs8NImLE_1FJ_NhdUjBwrqRSbwYNyj34-eNQTi8',
    badge: '-15%',
    badgeClass: 'bg-jaune-moutarde text-gris-ardoise'
  },
  {
    id: 2,
    name: 'Baskets de Course Sportive Lot Gros',
    category: 'CHAUSSURES',
    price: '14.000 CFA',
    minOrder: 'Commande Min : 10 Paires',
    image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuDKReKA5NK_5xxk_9HoLYmpAoXNMz6R8UxCnts66Zgzv05Y2bb-trVRpjtEYV8bCJWaJzEd7hl8HT8jRBHejLcj2th5DuaytmLoEaoFE4Cnh4--51ktdEzV54z5Lef8O7dF4FgajSv55OC3PIGGnMi7HFN1OQXp_rnbUsgPnjv__JD49iGCN-HawYCjbifiNIPnY12Xw9lpbvCZE33S7e2MeUfBSqBYNGxUTp9AKrb21bbKnyiJr9YOpcIVWbCLK_W9-akG0hoX6x0',
    badge: 'HOT',
    badgeClass: 'bg-jaune-moutarde text-gris-ardoise'
  },
  {
    id: 3,
    name: 'Montre Connectée Série V - Stock Gros',
    category: 'ACCESSOIRES PORTABLES',
    price: '9.500 CFA',
    minOrder: 'Commande Min : 2 Unités',
    image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuBw5536TLoQL0-_qpbOfc29e2I2UCCQxxLmfXSIUYg0_FEW0qS3Es0SSgZCwh75uOfWcieiCu2GJfTr1FFPXSHADx09Vb4Ra6cv3NLyK7k2D3L5NbedKG0YwGI8haRcOFjiq57odtG8Rz27tfnhOv9o9JjMVhC9wuBdIZn37yH9fDMwxqbMIdKYhANx0A7TVe24rEVTPr3I4bCE4P4iOZ8GnxkzWZpMl1Pe431ubIyeoBN9LXaBOWC8RVf55N0LOgxF0_56cb9-xYE',
    badge: '-20%',
    badgeClass: 'bg-jaune-moutarde text-gris-ardoise'
  },
  {
    id: 4,
    name: 'Reflex Professionnel 4K Boîtier Seul',
    category: 'OPTIQUE',
    price: '320.000 CFA',
    minOrder: 'Commande Min : 1 Unité',
    image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuD4jt2WOSwmiBPjf5OWQXtc5fvEQAX6jbHtGtKC1OM3ecMJOEUAw3jmOIkXLAQMhdtMNO1VRoNAUGM0HjKZERm-oMxncIWH85AfN5IEl3YcDTdDRVsNtWhy7ukFCRpFfEjb0V4m-tQNKp6T4xZwJYFEuiUmiPgmxQgHHo50Ezq4kM4cTj_ICFa7mogAuWLIMRwTzO0pLz-vKdbOAjBV6C8AL8GrglPzMnuR4eNfpJzruPZH9rKRy0T23rohHUBeOoBxSJZbo7TXX88'
  },
  {
    id: 5,
    name: 'Camionnette Utilitaire Robuste (Importation)',
    category: 'VÉHICULES',
    price: 'Nous Contacter',
    minOrder: 'Fournisseur Noté 5.0',
    image: null
  },
  {
    id: 6,
    name: 'Lot de Produits Bébé Gros',
    category: 'ENFANTS',
    price: '5.000 CFA',
    minOrder: 'Commande Min : 100 Pièces',
    image: null,
    badge: 'DEAL',
    badgeClass: 'bg-bleu-acier text-white'
  }
]
</script>

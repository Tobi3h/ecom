<template>
  <footer class="bg-gris-ardoise text-white pt-16 pb-8 mt-20">
    <div class="max-w-[1400px] mx-auto px-4 grid grid-cols-1 md:grid-cols-4 lg:grid-cols-5 gap-12 border-b border-white/10 pb-16">
      <div class="lg:col-span-2">
        <h2 class="text-3xl font-black mb-6 tracking-tight">
          GLOBAL<span class="text-jaune-moutarde">HUB</span>
        </h2>
        <p class="text-sm text-white/60 max-w-sm mb-8 leading-relaxed font-medium">
          La plateforme B2B de sourcing de premier plan pour les marchés d'Afrique de l'Ouest et du Centre. Reliant le Bénin et le Tchad aux plus grands fabricants du monde par la confiance et l'excellence locale.
        </p>
        <div class="flex gap-5">
          <NuxtLink 
            v-for="social in socials" 
            :key="social.icon"
            to="#" 
            class="size-9 rounded-full bg-white/5 flex items-center justify-center hover:bg-vert-sauge transition-colors"
          >
            <span class="material-symbols-outlined text-lg">{{ social.icon }}</span>
          </NuxtLink>
        </div>
      </div>

      <div v-for="column in footerColumns" :key="column.title">
        <h4 class="font-bold text-xs mb-8 uppercase tracking-widest text-jaune-moutarde">{{ column.title }}</h4>
        <ul class="text-sm space-y-4 text-white/50">
          <li v-for="link in column.links" :key="link.text">
            <NuxtLink to="#" class="hover:text-white transition-colors">{{ link.text }}</NuxtLink>
          </li>
        </ul>
      </div>

      <div>
        <h4 class="font-bold text-xs mb-8 uppercase tracking-widest text-jaune-moutarde">Alertes Commerciales</h4>
        <p class="text-[11px] text-white/50 mb-5 leading-relaxed">
          Abonnez-vous pour des mises à jour d'inventaire local et de nouvelles offres en gros.
        </p>
        <div class="flex flex-col gap-3">
          <input 
            v-model="email"
            class="bg-white/5 border border-white/10 text-sm px-4 h-11 rounded-md focus:ring-1 focus:ring-vert-sauge w-full placeholder:text-white/20" 
            placeholder="Votre adresse e-mail" 
            type="email"
          />
          <button 
            @click="handleSubscribe"
            class="bg-vert-sauge text-white px-5 text-sm font-bold rounded-md h-11 hover:brightness-110 transition-all"
          >
            Rejoindre la Plateforme
          </button>
        </div>
      </div>
    </div>

    <div class="max-w-[1400px] mx-auto px-4 mt-8 flex flex-col md:flex-row justify-between items-center text-[11px] text-white/30 font-medium tracking-wide">
      <p>© 2024 Plateforme Mondiale de Commerce. Logistique Commerciale Spécialisée pour le Bénin et le Tchad.</p>
      <div class="flex gap-8 mt-4 md:mt-0">
        <NuxtLink to="#" class="hover:text-white transition-colors">Politique de Confidentialité</NuxtLink>
        <NuxtLink to="#" class="hover:text-white transition-colors">Conditions d'Utilisation</NuxtLink>
        <NuxtLink to="#" class="hover:text-white transition-colors">Directives Fournisseur</NuxtLink>
      </div>
    </div>
  </footer>
</template>

<script setup>
const email = ref('')

const socials = [
  { icon: 'public' },
  { icon: 'chat' },
  { icon: 'campaign' }
]

const footerColumns = [
  {
    title: 'Centre d\'Aide',
    links: [
      { text: 'Tarifs de Livraison' },
      { text: 'Politique de Remboursement' },
      { text: 'Protection Commerciale' },
      { text: 'Guide du Port de Cotonou' }
    ]
  },
  {
    title: 'Partenariats',
    links: [
      { text: 'Devenir Fournisseur' },
      { text: 'Adhésion Fournisseur' },
      { text: 'Partenaires Logistiques' },
      { text: 'Agents Régionaux' }
    ]
  }
]

const handleSubscribe = () => {
  console.log('Subscribe email:', email.value)
  // Implémenter la logique d'inscription ici
}
</script>

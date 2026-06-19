<?php
require "layouts/header.html";
?>
<body class="bg-[#f8fafc] text-slate-800 antialiased">

    <div class="flex h-screen overflow-hidden">
        
        <div class="w-68 bg-[#0f172a] text-slate-400 flex flex-col justify-between hidden lg:flex border-r border-slate-800">
            <div>
                <div class="h-20 flex items-center px-6 bg-[#020617] gap-3 border-b border-slate-800/50">
                    <div class="w-9 h-9 rounded-xl bg-indigo-600 flex items-center justify-center text-white shadow-lg shadow-indigo-600/30">
                        <i class="fa-solid fa-cube text-sm"></i>
                    </div>
                    <div>
                        <span class="text-white font-bold tracking-tight text-base block">NEXUS<span class="text-indigo-500">STOCK</span></span>
                        <span class="text-[10px] text-slate-500 font-medium block uppercase tracking-wider">Management System</span>
                    </div>
                </div>
                <nav class="mt-8 px-4 space-y-1.5">
                <span class="px-4 text-[10px] font-bold uppercase text-slate-500 tracking-widest block mb-3">Tableau de bord</span>   
                <a href="#" class="flex items-center gap-3.5 px-4 py-3 bg-indigo-600/10 text-indigo-400 rounded-xl font-medium transition-all group border border-indigo-500/10">
                    <i class="fa-solid fa-chart-pie text-sm text-indigo-500"></i>
                    <span>Tableau de Bord</span>
                </a>
                
                <a href="#" class="flex items-center gap-3.5 px-4 py-3 text-slate-400 hover:bg-slate-800/50 hover:text-white rounded-xl font-medium transition-all group">
                    <i class="fa-solid fa-boxes-stacked text-sm text-slate-500 group-hover:text-slate-300"></i>
                    <span>Entrée de Lot</span>
                </a>
                
                <a href="#" class="flex items-center gap-3.5 px-4 py-3 text-slate-400 hover:bg-slate-800/50 hover:text-white rounded-xl font-medium transition-all group">
                    <i class="fa-solid fa-arrow-up-from-bracket text-sm text-slate-500 group-hover:text-slate-300"></i>
                    <span>Sortie</span>
                </a>

            
                <?php if($userInfo["role"] == "admin") { ?>
                    <span class="px-4 text-[10px] font-bold uppercase text-slate-500 tracking-widest block mt-6 mb-3">Administration</span>
                    
                    <a href="#" class="flex items-center gap-3.5 px-4 py-3 text-slate-400 hover:bg-slate-800/50 hover:text-white rounded-xl font-medium transition-all group">
                        <i class="fa-solid fa-users text-sm text-slate-500 group-hover:text-slate-300"></i>
                        <span>Gestion des employés</span>
                    </a>
                    
                    <a href="#" class="flex items-center gap-3.5 px-4 py-3 text-slate-400 hover:bg-slate-800/50 hover:text-white rounded-xl font-medium transition-all group">
                        <i class="fa-solid fa-file-invoice-dollar text-sm text-slate-500 group-hover:text-slate-300"></i>
                        <span>Rapport Financier</span>
                    </a>
                <?php } ?>
            </nav>
            </div>
            
            <div class="p-4 bg-[#020617]/50 border-t border-slate-800/60 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-slate-800 border border-slate-700 flex items-center justify-center text-white font-bold text-sm shadow-sm">
                       <?= $userInfo["nom"][0]." ".$userInfo["prenom"][0]?>
                    </div>
                    <div>
                        <span class="text-sm font-semibold text-white block"><?=$userInfo["nom"]." ".$userInfo["prenom"]?></span>
                        <span class="text-xs text-slate-500 block"><?=$userInfo["email"]?></span>
                    </div>
                </div>
                <a href="#" class="w-8 h-8 rounded-lg hover:bg-slate-800 flex items-center justify-center text-slate-500 hover:text-rose-400 transition-colors">
                    <i class="fa-solid fa-right-from-bracket text-sm"></i>
                </a>
            </div>
        </div>

        <div class="flex-1 flex flex-col overflow-y-auto">
            
            <header class="h-20 bg-white/80 backdrop-blur-md border-b border-slate-100 flex items-center justify-between px-8 sticky top-0 z-20">
                <div>
                    <h1 class="text-xl font-bold text-slate-900 tracking-tight">Gestion des Stocks</h1>
                    <p class="text-xs text-slate-400 mt-0.5">Suivi en temps réel des lots de produits</p>
                </div>
                <button onclick="fetchAndRenderProducts()" class="bg-slate-900 hover:bg-slate-800 text-white px-4 py-2.5 rounded-xl text-xs font-semibold tracking-tight transition-all shadow-sm shadow-slate-900/10 active:scale-95 flex items-center gap-2">
                    <i class="fa-solid fa-arrows-rotate text-[11px]"></i> Actualiser les données
                </button>
            </header>

            <main class="p-8 space-y-8 max-w-7xl w-full mx-auto">
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-[0_2px_12px_-3px_rgba(0,0,0,0.02)] flex items-center justify-between">
                        <div class="space-y-1">
                            <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Total Produits</p>
                            <p class="text-3xl font-extrabold text-slate-900" id="stat-total-products">--</p>
                        </div>
                        <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-xl flex items-center justify-center shadow-inner">
                            <i class="fa-solid fa-box-open text-lg"></i>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-[0_2px_12px_-3px_rgba(0,0,0,0.02)] flex items-center justify-between">
                        <div class="space-y-1">
                            <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Quantité Totale</p>
                            <p class="text-3xl font-extrabold text-slate-900" id="stat-total-qty">--</p>
                        </div>
                        <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center shadow-inner">
                            <i class="fa-solid fa-cubes-stacked text-lg"></i>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-[0_2px_12px_-3px_rgba(0,0,0,0.02)] flex items-center justify-between">
                        <div class="space-y-1">
                            <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Lots Périmés</p>
                            <p class="text-3xl font-extrabold text-rose-600">0</p>
                        </div>
                        <div class="w-12 h-12 bg-rose-50 text-rose-600 rounded-xl flex items-center justify-center shadow-inner">
                            <i class="fa-solid fa-circle-exclamation text-lg"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-slate-100 shadow-[0_4px_20px_-4px_rgba(0,0,0,0.03)] overflow-hidden">
                    <div class="px-6 py-5 border-b border-slate-100 bg-white flex items-center justify-between">
                        <div>
                            <h2 class="font-bold text-slate-900 tracking-tight">Liste des lots en stock</h2>
                            <p class="text-xs text-slate-400 mt-0.5">Détails des stocks physiques disponibles</p>
                        </div>
                        <div class="relative">
                            <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                            <input type="text" placeholder="Rechercher un lot..." class="pl-9 pr-4 py-2 text-xs bg-slate-50 border border-slate-200/80 rounded-xl w-60 focus:outline-none focus:border-indigo-500 focus:bg-white transition-all placeholder:text-slate-400" />
                        </div>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50/70 border-b border-slate-100 text-slate-500 text-[11px] font-bold uppercase tracking-wider">
                                    <th class="px-6 py-4">Nom du Produit</th>
                                    <th class="px-6 py-4">Référence</th>
                                    <th class="px-6 py-4">Code Lot</th>
                                    <th class="px-6 py-4 text-center">Quantité</th>
                                    <th class="px-6 py-4">Prix Unitaire</th>
                                    <th class="px-6 py-4 text-center">Statut</th>
                                </tr>
                            </thead>
                            <tbody id="products-table-body" class="divide-y divide-slate-100 text-slate-600 text-xs font-medium">
                                <tr>
                                    <td colspan="6" class="px-6 py-16 text-center text-slate-400">
                                        <div class="flex items-center justify-center gap-2">
                                            <svg class="animate-spin h-5 w-5 text-indigo-600" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                            </svg>
                                            <span class="tracking-tight text-slate-500 font-medium">Chargement dynamique de l'inventaire...</span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </main>
        </div>
    </div>
</body>
</html>
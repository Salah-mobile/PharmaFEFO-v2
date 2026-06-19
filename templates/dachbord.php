<?php
$userInfo=$_SESSION["user"];
require "layouts/header.html";
?>
<body class="bg-[#f8fafc] text-slate-800 antialiased">
    <div class="flex h-screen overflow-hidden">
        <?php
         require "layouts/navbar.php";
        ?>
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
                            <p class="text-3xl font-extrabold text-rose-600" id='count-pirimis-product'>0</p>
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
                                
                            </tbody>
                        </table>
                    </div>
                </div>

            </main>
        </div>
    </div>
    <script type="module" src="../public/js/dachbord.js"></script>
</body>
</html>
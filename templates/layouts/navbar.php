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
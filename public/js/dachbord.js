async function getDashboardData() {
  try {
    const response = await fetch("http://localhost/PharmaFEFO-v2/public/index.php?action=daschbordData");
    const data = await response.json();
    return data;
  } catch (error) {
    console.error("API error:", error);
  }
}
let res=await getDashboardData();
let products=[]
products=res.products
let expired=res.expired
document.getElementById("stat-total-products").innerText=products.length;
let qnatiteTo=0;
    products.forEach(element => {
     qnatiteTo+=parseInt(element.quantite);
    });
    document.getElementById("stat-total-qty").innerText=qnatiteTo;
    document.getElementById("count-pirimis-product").innerText=expired.length;
function renderDachbord(par){
    let tr = document.createElement("tr");
      tr.className = "hover:bg-slate-50 transition";

      let nomP = document.createElement("td");
      nomP.innerText = element.nom;
      nomP.className = "px-6 py-4 text-slate-700";

      let refP = document.createElement("td");
      refP.innerText = element.reference;
      refP.className = "px-6 py-4 text-slate-500";

      let lotC = document.createElement("td");
      lotC.innerText = element.numero_lot;
      lotC.className = "px-6 py-4 text-slate-500";

      let qunt = document.createElement("td");
      qunt.innerText = element.quantite;
      qunt.className = "px-6 py-4 text-center font-semibold text-slate-700";

      let prixU = document.createElement("td");
      prixU.innerText = element.prix;
      prixU.className = "px-6 py-4 text-slate-600";

      let status = document.createElement("td");
      status.innerText = element.statut;
      status.className = "px-6 py-4 text-center";
      tr.appendChild(nomP)
      tr.appendChild(refP)
      tr.appendChild(lotC)
      tr.appendChild(qunt)
      tr.appendChild(prixU)
      tr.appendChild(status)
      console.log(tr);
      document.getElementById("products-table-body").appendChild(tr)
}
renderDachbord();
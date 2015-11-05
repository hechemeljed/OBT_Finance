function validateISIN(){
		if((document.f1.isin.value.length)!=12)
			{
			alert("code ISIN non valide");
			document.f1.isin.value="TN000";
			}
			}
function validateNominal(){
		if(isNaN(document.f1.nominal.value))
			{
			alert("valeur nominal non valide");
			document.f1.nominal.value="";
			}
			}

function validateNombre(){
		if(isNaN(document.f1.nombre.value))
			{
			alert(" nombre obligatoire non valide");
			document.f1.nombre.value="";
			}
			}
			
function validateMontant()
{
		if(document.f1.nombre.value){ 
		if(document.f1.nominal.value){
			{
			document.f1.montant.value=parseFloat();
			}
			}}}
			
function validateDateDE(){
		if(document.f1.dateDE.value < document.f1.datePE.value)
			{
			alert(" DE non valide");
			document.f1.dateDE.value="";
			}
			}
			
function validateTaux(){


		if(document.getElementById("tmm").options[1].selected == true)
			{
			document.f1.taux.value="TMM+"+document.f1.taux.value;
			}
		else
		{
		while((document.f1.taux.value.charAt(0)!="")&&(isNaN(document.f1.taux.value.charAt(0))))
		document.f1.taux.value=document.f1.taux.value.substring(1,document.f1.taux.value.length);
		}
			}

function ecrire(){
var taux;
var date;
if(document.f1.taux.value==""){taux=0;}
else{taux=document.f1.taux.value;}
if(document.f1.dateDE.value==""){date="";}
else{date=document.f1.dateDE.value;
date=date.substring(5,7)+date.substring(2,4);
}
document.f1.libelleEmp.value=document.f1.emetteur.value+" "+date+" "+taux+"% "+document.f1.mode.value+document.f1.duree.value;
}


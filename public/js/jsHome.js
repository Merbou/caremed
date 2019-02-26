

//validation des champs obligatoires
//////////////////////////////////////////////////////////
function validateForm() {
  var x = document.forms["myForm"]["mail"].value;
  var y = document.forms["myForm"]["password"].value;
  var regEx = new RegExp(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/); 
 // var re=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  //var re= /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
//validation si c'est vide 
  if (x == "") {
    document.getElementById("demo").innerHTML = " Ce champ est obligatoire *";
      
  }
  if (y == "") {
          document.getElementById("demo2").innerHTML = "   Ce champ    est obligatoire *";
             }
//validation de l'email dans le form home
  if((x !="") && (!regEx.test(x)))
  {
      document.getElementById("demoEmail").innerHTML = " email n'est pas valide";
  }           
 if ((y=="")||(x=="")||(!regEx.test(x) ))
 {
  return false;
 }            

}


// supprimer le message d'alert du champ l'email
//////////////////////////////////////////////////////////


function deleteOnWriteEmail()
{
 var x = document.forms["myForm"]["mail"].value;
 if (x != "") {
   document.getElementById("demo").innerHTML = " ";
 }  
}

// supprimer le message d'alert du champ mot de passe
///////////////////////////////////////////////////////////

function deleteOnWritePassword()
{
 var y = document.forms["myForm"]["password"].value;
 if (y != "") {
   document.getElementById("demo2").innerHTML = " ";
 }  
   
}

//supprimer le message d'alert du champ du mail dans le cas d'un mail faux
function deleteOnWriteEmailToValidate()
{
 
   document.getElementById("demoEmail").innerHTML = " ";
 
   
}




//Validation de email dans les formulaire d'inscription
////////////////////////////////////////////////////////////

function validateEmail(email)
{
   var regEx = new RegExp(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/); 
   if(regEx.test(email))
   {
return true;
   }
   else
return false;

}




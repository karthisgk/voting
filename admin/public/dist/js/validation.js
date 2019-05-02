  /*
 * ***************************************comman validation Script Guid***********************************
Step 1:
 (nameField,numberField,mobileField,phoneField,emptyField,emailField)
    *Field id is (ex:e_name)
    *Error Span id is (ex:err_e_name) 
 (radioField)
    *Field id is (ex:e_gender_male and e_gender_female)
    *Error Span id is (ex:err_gender) (comman for both)
  (checkboxField)
    *Field name is (ex:color[]) in checkbox using a name not a id
    *Span id Commonly (err_checkbox)
Step 2:
    Function Calling:
 *nameField('e_name');  Field id
 *numberField('e_id');  Field id
 *radioField('e_gender_male','e_gender_female');    Field id of both
 *radioField('e_mrg_single','e_mrg_married');       Feild id of Both
 *mobileField('e_mobile');          Feild id
 *phoneField('e_phone',8);          Field id,length
 *emptyField('e_branch');           Field id
 *emptyField('e_type');     Field id             
 *emptyField('e_address');  Field id
 *emailField('e_email');    Field id
 *checkboxField('color[]',2);   Field Name as Array,Select length
*/
//********************Text Box Validation(Only Char)**************************************************//
function nameField(name)
{ 
  var x=document.getElementById(name);
  var errField=x.name;
  var err=document.getElementById('err_'+name);
  if(x.value=='null' || x.value=="" || x.value.trim()=="")
  {
      err.innerHTML="* Please Fill the "+errField+" Field";
      err.style.color="red";
      x.style.border="1px solid red";
      return 0;
  }
  else if(!isNaN(x.value))
  {
      err.innerHTML="* "+errField+" field should be in characters";
      err.style.color="red";
      x.style.border="red thin solid";
      return 0;
  }
  else
  {
      err.innerHTML="";
      x.style.border="";
  }
}
//*****************Text Box Validation(Only Numeric)***************************************************//
function numberField(name)
{
   var x=document.getElementById(name);
   var errField=x.name;
   var err=document.getElementById('err_'+name);
   if(x.value=="null" || x.value=="" || x.value.trim()=="")
   {
       err.innerHTML="* Please Fiil the "+errField+" Field";
       err.style.color="red";
       x.style.border="1px solid red";
       return 0;
   }
   else if(isNaN(x.value))
   {
       err.innerHTML="* "+errField+" Field should be in numeric";
       err.style.color="red";
       x.style.border="red thin solid";
       return 0;
   }
   else
   {
       err.innerHTML="";
       x.style.border="";
   }
}
//**********************************RadioBox validation(With Two Value)***********************************//
function radioField(name,name1)
{
    var x=document.getElementById(name);
    var y=document.getElementById(name1);
        var errField=x.name;
        var lastIndex = name.lastIndexOf("_");
        var err_e = "err_"+name.substring(0, lastIndex);
        var err =document.getElementById(err_e)
    if(x.checked==false && y.checked==false)
    {
        err.innerHTML="* please select the "+errField;
        err.style.color="red";
        return 0;
    }
    else
    {
        err.innerHTML="";
    }
}
//************************Mobile Number validation(With Length 10 digit)********************************//
function mobileField(name)
{
    var x=document.getElementById(name);
    var errField=x.name;
    var err=document.getElementById("err_"+name)
    if(x.value=='null' || x.value=="" || x.value.trim()=="")
    {
       err.innerHTML="* Please Fill the "+errField+" Field";
       err.style.color="red";
       x.style.border="1px solid red";
       return 0;
    }
    else if(isNaN(x.value))
    {
       err.innerHTML="* "+errField+" Field Should be Numeric";
       err.style.color="red";
       x.style.border="thin solid red";
       return 0;
    }
    else if(x.value.length!=10)
    {
        err.innerHTML="* "+errField+" Number must be in 10 digit";
        x.style.border="thin solid red";
        return 0;
    }
    else
    {
       err.innerHTML="";
       x.style.border="";
    }
}
//*****************************Phone Number VAlidation(With User Sepectif Size)*******************//
function phoneField(name,len)
{
   // alert(number);
    var x=document.getElementById(name);
    var errField=x.name;
    var err=document.getElementById("err_"+name);
    if(x.value=="null" || x.value=="" || x.value.trim()=="")
    {
        err.innerHTML="* Please Fill the "+errField+" Field";
        err.style.color="red";
        x.style.border="1px solid red";
        return 0;
    }
    else if(isNaN(x.value))
    {
        err.innerHTML="* "+errField+" Number Should be Numeric";
        err.style.color="red";
        x.style.border="thin solid red";
        return 0;
    }
    else if(x.value.length!=len)
    {
      err.innerHTML="* "+errField+" Number must be "+len+" digit";
      err.style.color="red";
      x.style.border="thin solid red";
      return 0;
    }
    else
    {
        err.innerHTML="";
        x.style.border="";
    }
}
//**********************Empty Filed Validation*************************************//
function emptyField(name)
{
    var x=document.getElementById(name);
    var errField=x.name;
    var err=document.getElementById("err_"+name);
    if(x.value=="null" || x.value=="" || x.value.trim()=="")
    {
        err.innerHTML="* You can't leave "+errField+" empty";
        err.style.color="red";
        x.style.border="1px solid red";
        return 0;
    }
    else
    {
        err.innerHTML="";
        x.style.border="";
    }
}
//***********************Email Field Validation (With Reg_Exp)**************************************//
function emailField(name)
{
   var x=document.getElementById(name);
   var errField=x.name;
   var err=document.getElementById('err_'+name);
   var regex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
   if(x.value=="null" || x.value=="" || x.value.trim()=="")
   {
       err.innerHTML="* please Fill the "+errField+" Field";
       err.style.color="red";
       x.style.border="1px solid red";
       return 0;
   }
   else if(!regex.test(x.value))
   {
       err.innerHTML="* Please enter your correct "+errField;
       err.style.color="red";
       x.style.border="thin solid red";
       return 0;
   }
   else
   {
       err.innerHTML="";
       x.style.border="";
   }
}
//*******************Check Box Validation(With User Specfic size)***************************************//
function checkboxField(name,len)
{
    var x=document.getElementsByName(name);
    var err=document.getElementById('err_checkbox');
    var hasChecked =false;
    var chkcount=0;
    for(var i=0;i<x.length;i++)
    { 
        if(x[i].checked)
        {
            hasChecked =true;
            chkcount++;
        }
        
    }
    if(hasChecked == true)
    {
        if(chkcount<len)
        {
          err.innerHTML="* Please Select Atlest "+len;
          err.style.color="red";
          return 0;  
        }
           
    }
    else if(hasChecked ==false)
    {
        err.innerHTML="* You can't leave this empty";
        err.style.color="red";
        return 0;
    }
   
}
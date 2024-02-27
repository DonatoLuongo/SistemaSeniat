const form = document.getElementById('form');

const validators={
  nombre_liquidador:valnombre_liquidador,
  apellido_liquidador:valapellido_liquidador,
  cedula_liquidador:valcedula_liquidador,
  clave_liquidador:valclave_liquidador
  
}
const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

form.addEventListener('submit', e => {
    
   const error=validateform()
   console.log(error)
   if (!error){
      e.preventDefault();
     }
    
});

form.addEventListener('input', e => {
  console.log("change")
    if(e.target.tagName!=="INPUT")
       return
    validate(e.target)
});


function validate(domElement){
  const {error,message}=validators[domElement.name](domElement.value)
  if(error)
   {
     setError(domElement,message)
     return false
   }
  setSuccess(domElement,message)
  return true
}



function valnombre_liquidador(value){
  if(value==='')
      return {error:true,message: 'Se requiere nombre de liquidador'}
  return {error:false}  
}
function valapellido_liquidador(value){
  if(value==='')
      return {error:true,message: 'Se requiere Apellido de liquidador'}
  return {error:false}
  
}
function valcedula_liquidador(value){
  if(value==='')
      return {error:true,message: 'Se requiere Apellido de liquidador'}
  return {error:false}
}

function valclave_liquidador(value){
   if (value === '') 
        return {error:true,message:'Se requiere contraseña de liquidador'}
    if (value.length < 8) 
      return {error:true,message:'La contraseña debe tener al menos 8 caracteres.'}
return {error:false}
}

function validateform(){
  const inputName=['nombre_liquidador','apellido_liquidador','cedula_liquidador','clave_liquidador']
  const inputErrors=inputName.map((inputname)=>{
      const node=document.getElementById(inputname)
      const isValid=validate(node)
    return isValid
  })
  console.log(inputErrors)
  
  const error=inputErrors.reduce((valid,inputerror)=>valid&&inputerror,true)
  return error
}

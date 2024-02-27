const form = document.getElementById('form');

const validators={
  nombre_contribuyente:valnombre_contribuyente,
  rif:valrif,
  licencia_contribuyente:vallicencia_contribuyente,
  // estado:valestado,
  municipio:valmunicipio,
  direccion_especifica:valdireccion_especifica
  
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




function valnombre_contribuyente(value){
  if(value==='')
      return {error:true,message: 'Se requiere el nombre del contribuyente'}
  return {error:false}  
}

function valrif(value){
  if(value.length > 10) {
    // Si el valor es mayor a 10 caracteres, devuelve un objeto con error y un mensaje
    return {error: true, message: 'El campo debe tener máximo 10 caracteres'};
  } else if (value === '') {
    // Si el valor está vacío, devuelve un objeto con error y un mensaje
    return {error: true, message: 'El campo es obligatorio'};
  } else {
    // Si el valor es válido, devuelve un objeto sin error
    return {error: false};
  }
}

function vallicencia_contribuyente(value){
  if(value==='')
      return {error:true,message: 'Se requiere licencia de contribuyente'}
  return {error:false}
  
}

// function valestado(value){
//   if(value==='Selecciona un Estado')
//       return {error:true,message: 'Por favor, selecciona un Estado'}
//   return {error:false}  
// }


function valmunicipio(value){
  if(value==='')
      return {error:true,message: 'Se requiere municipio de contribuyente'}
  return {error:false}
}

function valdireccion_especifica(value){
  if(value==='')
      return {error:true,message: 'Se requiere dirección específica del contribuyente'}
  return {error:false}
}


function validateform(){
  const inputName=['input-nombre','input-rif','input-licencia', 'input-municipio', 'input-parroquia']
  const inputErrors=inputName.map((inputname)=>{
      const node=document.getElementById(inputname)
      const isValid=validate(node)
    return isValid
  })
  console.log(inputErrors)
  
  const error=inputErrors.reduce((valid,inputerror)=>valid&&inputerror,true)
  return error
}

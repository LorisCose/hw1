function validazione(event)
{
    if(form.email.value.length == 0 ||
       form.password.value.length == 0)
       
    {
        const container = document.querySelector('#contenitore_alert');
        container.classList.remove('nascosto');
        
        event.preventDefault();
    }
        
}

// Riferimento al form
const form = document.forms['form_login'];
// Aggiungi listener
form.addEventListener('submit', validazione);
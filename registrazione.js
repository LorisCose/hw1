function validazione(event)
{
    // Verifica se tutti i campi sono riempiti
    if(form.nome.value.length == 0 ||
        form.email.value.length == 0 ||
       form.password.value.length == 0)       
    {
        const container = document.querySelector('#contenitore_alert');
        container.classList.remove('nascosto');
        // Blocca l'invio del form
        event.preventDefault();
        return;
    }

    const emailFormat = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(form.email.value);

    if (!emailFormat) 
    {
        const alert2 = document.querySelector('#alert_mail');
        alert2.classList.remove('nascosto');
        event.preventDefault();
    }

    if (form.password.value.length < 6)
    {
        const alert1 = document.querySelector('#alert_lung_pass');
        alert1.classList.remove('nascosto');
        event.preventDefault();
    }

    const hasUpperCase = /[A-Z]/.test(form.password.value);
    const hasNumber = /\d/.test(form.password.value);
            
    if (!hasUpperCase || !hasNumber) 
    {
        const alert2 = document.querySelector('#alert_upper_pass');
        alert2.classList.remove('nascosto');
        event.preventDefault();
    }
        

        
}

// Riferimento al form
const form = document.forms['form_login'];
// Aggiungi listener
form.addEventListener('submit', validazione);
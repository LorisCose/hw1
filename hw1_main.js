function cambia_news(event) {
    const new_strong=document.createElement('strong')
    new_strong.textContent='Ora inizierai a ricevere aggiornamenti e offerte dal Google Store.';
    const new_p=document.createElement('p');
    new_p.textContent='Registrazione effettuata';

    const container1=document.querySelector('.scritta_newsletter');
    container1.innerHTML='';
    container1.appendChild(new_strong);

    const container2=document.querySelector('.registrati_newsletter');
    container2.innerHTML='';
    container2.appendChild(new_p);

}

function attivaRicerca(event){
    const icona = event.currentTarget;

    const container = document.querySelector('#contenitore_barra_ricerca_nav');
    container.classList.remove('hidden');
    event.preventDefault();
}

function chiudiRicerca(event){
    const button = event.currentTarget;

    const container = document.querySelector('#contenitore_barra_ricerca_nav');
    container.classList.add('hidden');
}

function slideDestra(event){
    const button = event.currentTarget;

    const container1 = document.querySelector('#nascondi_cp1');
    container1.classList.add('hidden');

    const container2 = document.querySelector('#nascondi_cp2');
    container2.classList.remove('hidden');
}

function slideSinistra(event){
    const button = event.currentTarget;

    const container1 = document.querySelector('#nascondi_cp1');
    container1.classList.remove('hidden');

    const container2 = document.querySelector('#nascondi_cp2');
    container2.classList.add('hidden');
}

function hoverImg_1(event){
    const new_img = event.currentTarget;
    new_img.src='media/colori_watch.jpeg';
}

function leaveImg_1(event){
    const new_img= event.currentTarget;
    new_img.src='media/pop_1.png';
}

function hoverImg_2(event){
    const new_img = event.currentTarget;
    new_img.src='media/colori_buds.jpg';
}

function leaveImg_2(event){
    const new_img= event.currentTarget;
    new_img.src='media/pop_2.png';
}

function hoverImg_3(event){
    const new_img = event.currentTarget;
    new_img.src='media/tipi_videocamere.jpeg';
}

function leaveImg_3(event){
    const new_img= event.currentTarget;
    new_img.src='media/pop_3.png';
}

function search(event){
    
    event.preventDefault();
    const bottone=document.querySelector('#contenitore_b_notizie');
    bottone.classList.add('hidden');

    console.log('Eseguo ricerca');
    
    rest_url = 'https://content.guardianapis.com/search?section=technology&page-size=6&q=google&api-key=59ad084f-b783-4857-980c-97fa3fb5f048&format=json';
    console.log('URL: ' + rest_url);
    
    fetch(rest_url).then(onResponse).then(onJson);
}

function onResponse(response) {
    console.log('Risposta ricevuta');
    return response.json();
}

function onJson(json) {
    console.log('JSON ricevuto');
   
    const contenitore = document.querySelector('#contenitore_notizie');
    contenitore.innerHTML = '';
    
    
    for(let i=0; i<6; i++)
    {
      
      const articolo = json.response.results[i]
     
      const title = articolo.webTitle;
      const urls = articolo.webUrl;
      
      
      const notizia = document.createElement('div');
      notizia.classList.add('notizia');
      
      
      const titolo_notizia = document.createElement('a');
      titolo_notizia.href = urls
      titolo_notizia.textContent = title;
      
      notizia.appendChild(titolo_notizia);
      // Aggiungiamo il div alla libreria
      contenitore.appendChild(notizia);
    }
  }
  

//main

const button_news = document.querySelector('#b_news');
button_news.addEventListener('click',cambia_news);

const icona_cerca = document.querySelector('#cerca');
icona_cerca.addEventListener('click',attivaRicerca);

const b_annulla = document.querySelector('#annulla');
b_annulla.addEventListener('click',chiudiRicerca);

const b_destra = document.querySelector('#destra');
b_destra.addEventListener('click',slideDestra);

const b_sinistra = document.querySelector('#sinistra');
b_sinistra.addEventListener('click',slideSinistra);

const cambio_img_1 = document.querySelector('#cambio_img_1');
cambio_img_1.addEventListener('mouseenter',hoverImg_1);

const ritorno_img_1=document.querySelector('#cambio_img_1');
ritorno_img_1.addEventListener ('mouseleave', leaveImg_1);

const cambio_img_2 = document.querySelector('#cambio_img_2');
cambio_img_2.addEventListener('mouseenter',hoverImg_2);

const ritorno_img_2=document.querySelector('#cambio_img_2');
ritorno_img_2.addEventListener ('mouseleave', leaveImg_2);

const cambio_img_3 = document.querySelector('#cambio_img_3');
cambio_img_3.addEventListener('mouseenter',hoverImg_3);

const ritorno_img_3=document.querySelector('#cambio_img_3');
ritorno_img_3.addEventListener ('mouseleave', leaveImg_3);

const b_notizie = document.querySelector('#b_notizie');
b_notizie.addEventListener('click', search)
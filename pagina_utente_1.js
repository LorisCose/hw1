function trovaPilota(event){

    event.preventDefault();

    const albumInput = document.getElementById('ricerca');
    const albumView = document.getElementById('vista_prodotti');

    const albumName = albumInput.value;

    function Json_spoti(json){

        albumView.innerHTML = ''; // Pulisce i risultati precedenti
    
                  if (json.error) {
                      albumView.innerHTML = `<p>${json.error}</p>`;
                  } 
                    else if (json.albums && json.albums.items.length > 0) {
                      json.albums.items.forEach(album => {
                          const albumDiv = document.createElement('div');
                          albumDiv.className = 'div_prodotto';
    
                          const albumTitle = document.createElement('h3');
                          albumTitle.textContent = album.name;
                          albumDiv.appendChild(albumTitle);
    
                          if (album.images && album.images.length > 0) {
                              const albumImage = document.createElement('img');
                              albumImage.src = album.images[0].url;
                              albumImage.alt = `Copertina di ${album.name}`;
                              albumDiv.appendChild(albumImage);
                          } else {
                              const noImage = document.createElement('p');
                              noImage.textContent = 'Immagine di copertina non disponibile';
                              albumDiv.appendChild(noImage);
                          }
    
                          albumView.appendChild(albumDiv);
                      });
                  } else {
                      albumView.innerHTML = `<p>Nessun album trovato per il nome "${albumName}"</p>`;
                  }
              
    }
    
    function Risposta_spoti(response){
        return response.json();
    }
    

    fetch(`cerca_artista_spotify.php?ricerca=${encodeURIComponent(albumName)}`)
        .then(Risposta_spoti)
        .then(Json_spoti)
        .catch(error => {
            console.error('Errore:', error);
            albumView.innerHTML = `<p>Si è verificato un errore durante la ricerca.</p>`});

}

const sp = document.querySelector('#form_spotify');
sp.addEventListener('submit',trovaPilota);
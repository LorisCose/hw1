function onSuccess(response){
    return response.json();
}

function onError(error){
    console.log('Error: ' + error);
}

function onJSON(json)
    {
        const container = document.querySelector("#vista_prodotti");
        container.innerHTML = '';
        for(prod of json)
        {
            const div_prod = document.createElement('div');
            div_prod.classList.add('div_prodotto');
            const img_prod = document.createElement('img');
            img_prod.classList.add('img_prodotto');
            img_prod.src = 'data:image/jpeg;base64,' + prod.immagine;
            const nome_prod = document.createElement('span');
            nome_prod.textContent = prod.nome;
            const prezzo_prod = document.createElement('span');
            prezzo_prod.textContent = "€" + prod.prezzo;
            const link_buy = document.createElement('a');
            link_buy.textContent = 'Acquista ora';
            link_buy.href = "aggiungi_carrello.php?id_prod=" + prod.id + "&prezzo=" + prod.prezzo;

            div_prod.appendChild(img_prod);
            div_prod.appendChild(nome_prod);
            div_prod.appendChild(prezzo_prod);
            div_prod.appendChild(link_buy);

            container.appendChild(div_prod);
        }
    }

    const urlPaginaCorrente = window.location.href;
    console.log("URL della pagina corrente:", urlPaginaCorrente);
    
    // Ottenere la stringa dei parametri della query dall'URL corrente
    const queryParamsString = window.location.search;
    
    // Creare un oggetto URLSearchParams utilizzando la stringa dei parametri della query
    const params = new URLSearchParams(queryParamsString);
    
    // Ottenere il valore del parametro "id"
    const id_categoria = params.get("id");
    
    console.log("ID della pagina corrente:", id_categoria);

fetch("database_prodotti.php?id=" + id_categoria).then(onSuccess).then(onJSON);
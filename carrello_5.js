function onSuccess(response){
    return response.json();
}

function onError(error){
    console.log('Error: ' + error);
}

function onJSON(json)
    {
        console.log(json);

        if(json.length>0){
            const carrello_vuoto = document.querySelector("#carrello_vuoto");
            carrello_vuoto.classList.add("nascosto");
            
            const container = document.querySelector("#vista_prodotti");
            container.innerHTML = '';
            for(prod of json)
            {
                const div_prod = document.createElement('div');
                div_prod.classList.add('div_prodotto');
                const div_text = document.createElement('div');
                div_text.classList.add('div_text_prodotto');
                

                const img_prod = document.createElement('img');
                img_prod.classList.add('img_prodotto');
                img_prod.src = 'data:image/jpeg;base64,' + prod.immagine;
                const nome_prod = document.createElement('h2');
                nome_prod.textContent = prod.nome;
                const prezzo_prod = document.createElement('span');
                prezzo_prod.textContent = "€" + prod.prezzo;
                const link_remove = document.createElement('a');
                link_remove.textContent = 'Rimuovi';
                link_remove.href = "rimuovi_prodotto.php?id_prod=" + prod.id;

                div_prod.appendChild(img_prod);
                div_text.appendChild(nome_prod);
                div_text.appendChild(prezzo_prod);
                div_text.appendChild(link_remove);

                div_prod.appendChild(div_text);

                container.appendChild(div_prod);
            }
        }
    }

    fetch("visualizza_carrello_1.php").then(onSuccess).then(onJSON);
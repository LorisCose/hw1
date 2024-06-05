<?php

    session_start();

?>

<html>

<head>
    <meta charset="UTF-8" />
    <title>Google Store</title>
    <link rel="stylesheet" href="hw1_main.css"/>
    <script src="hw1_main.js" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>


<body>


    <nav>

        <div class="nav_bar">

            <div class="contenitore_link_nav">
                <div id="return_home">
                    <a href="index.php">
                        <img src="media/Google_logo.png" class="img_link_nav">
                    </a>
                </div>

                <div class="link_nav">
                    <a href="telefoni.php?id=1">Telefoni</a>
                </div>

                <div class="link_nav">
                    <a href="auricolari.php?id=2">Auricolari</a>
                </div>

                <div class="link_nav">
                    <a href="orologi.php?id=3">Orologi</a>
                </div>

                <div class="link_nav">
                    <a href="smart_home.php?id=4">Smart Home</a>
                </div>

                <div class="link_nav">
                    <a href="accessori.php?id=5">Accessori</a>
                </div>

            </div>

            <div id="contenitore_barra_ricerca_nav" class="hidden">
                <div class="barra_ricerca">
                    <input type="text">
                    <button id="annulla"><strong>X</strong></button>
                </div>
            </div>

            <div class="contenitore_icone_nav">
                <div class="icone_nav">
                    <a href="">
                        <span id="cerca" class="material-symbols-outlined">
                            search
                        </span>
                    </a>
                </div>

                <div class="icone_nav">
                    <a href="pagina_utente.php">
                        <span class="material-symbols-outlined">
                            question_mark
                        </span>
                     </a>
                </div>

                <div class="icone_nav">
                    <a href="carrello.php">
                        <span class="material-symbols-outlined">
                            shopping_cart
                        </span>
                    </a>
                </div>

                <div class="icone_nav">
                            <?php
                                // Verifica la presenza di errori
                                if(isset($_SESSION['email']))
                                {
                                    echo "<a href='hw1_logout.php'>";
                                    echo "<span class='material-symbols-outlined'>";
                                    echo "logout";
                                    echo "</span>";
                                    echo "</a>";
                                }
                                else
                                {
                                    echo "<a href='hw1_login.php'>";
                                    echo "<span class='material-symbols-outlined'>";
                                    echo "account_circle";
                                    echo "</span>";
                                    echo "</a>";
                                }
                            
                            ?>
                </div>
            </div>
        </div>


    </nav>



    <header>


        <div class="video_header">
            <video src="media/video_header.mp4" controls></video>
        </div>

        <div class="overlay_video">
            <strong>Pixel 8 Pro e Pixel 8.</strong>
            <div>Ora in edizione limitata verde menta.</div>
            <div><a class="a_overlay" href="telefoni.php?id=1">Scopri gli smartphone</a></div>
        </div>


        
            
        
    </header>
    
    <section class="selezione_prodotti">
        
        <div class="h3_section">
            <h3>Prodotti popolari sul Google Store.</h3>            
        </div>

        <div id="nascondi_cp1">

            <div class="contenitore_prodotti_1">

                <a href="telefoni.php?id=1">  
                    <div class="prodotto">
                        <div class="immagine"><img src="media/pixel_8_pro.png"></div>
                        <div class="descrizione"><strong>Pixel 8 Pro</strong></div>
                        <div class="prezzo">1099€</div> 
                    </div>
                </a>

                <a href="telefoni.php?id=1">
                    <div class="prodotto">
                        <div class="immagine"><img src="media/pixel_8.png"></div>
                        <div class="descrizione"><strong>Pixel 8</strong></div>
                        <div class="prezzo">799€</div> 
                    </div>
                </a>

                <a href="orologi.php?id=3">
                    <div class="prodotto">
                        <div class="immagine"><img src="media/google_watch.png"></div>
                        <div class="descrizione"><strong>Google Pixel Watch 2</strong></div>
                        <div class="prezzo">399€</div> 
                    </div>
                </a>
            
            </div>

        </div>
        
        <div id="nascondi_cp2" class="hidden">

            <div class="contenitore_prodotti_2">
                
                <a href="auricolari.php?id=2">
                    <div class="prodotto">
                        <div class="immagine"><img src="media/google_buds.png"></div>
                        <div class="descrizione"><strong>Pixel Buds Pro</strong></div>
                        <div class="prezzo">229€</div> 
                    </div>
                </a>

                <a href="smart_home.php?id=4">
                    <div class="prodotto">
                        <div class="immagine"><img src="media/chromecast.png"></div>
                        <div class="descrizione"><strong>Chromecast</strong></div>
                        <div class="prezzo">29,99€</div> 
                    </div>
                </a>

                <a href="orologi.php?id=3">
                    <div class="prodotto">
                        <div class="immagine"><img src="media/fitbit.png"></div>
                        <div class="descrizione"><strong>Fitbit</strong></div>
                        <div class="prezzo">159€</div> 
                    </div>
                </a>

            </div>

        </div>

        <div id="selettore_prodotti">
            <button id="sinistra">
                <span class="material-symbols-outlined">
                    arrow_back
                    </span>
            </button>
            <button id="destra">
                <span class="material-symbols-outlined">
                    arrow_forward
                    </span>
            </button>
        </div>

    </section>

    <section class="banner">

        <a href="orologi.php?id=3" class="b_principale">
            <div class="immagine_b"></div>
            <div class="scritte_b">
                <div class="categoria_b"><span class="titolo_b">Google Pixel Watch 2</span></div>
                <div class="frase_principale_b"><strong class="str_b">In forma con Fitbit. Con l'aiuto di Google. Su misura per te.</strong></div>
                <div class="didascalia_b">Ottieni un aiuto personalizzato per la salute, la sicurezza e la produttività.</div>
                <div class="link_b"><span class="scopri">Scopri di più</span></div>
            </div>
        </a>
        
        <div class="spazio"></div>

        <div class="griglia">

            <a href="telefoni.php?id=1" class="griglia1">
                <div class="scritte_griglia">
                    <div class="categoria_b"><span class="titolo_b">Smartphone</span></div>
                    <div class="frase_principale_b"><strong class="str_b">Gli smartphone Google al tuo servizio.</strong></div>
                    <div class="link_b"><span class="scopri">Scopri gli smartphone</span></div>
                </div>
                <div class="img_griglia1"></div>
            </a>

            <a href="auricolari.php?id=2" class="griglia2">
                <div class="scritte_griglia">
                    <div class="categoria_b"><span class="titolo_b">Pixel Buds</span></div>
                    <div class="frase_principale_b"><strong class="str_b">Un suono fantastico e avvolgente.</strong></div>
                    <div class="link_b"><span class="scopri">Scopri gli auricolari</span></div>
                </div>
                <div class="img_griglia2"></div>
            </a>

        </div>


    </section>



    <section class="pop">


        <div class="titolo_pop"><strong>Sfoglia le categorie più popolari.</strong></div>
        <div class="contenitore_pop">
            <a href="orologi.php?id=3" class="categoria_pop">
                <div class="img_pop"><img id="cambio_img_1" src="media/pop_1.png"></div>
                <div class="nome_pop">Smartwatch</div>
            </a>
            <a href="auricolari.php?id=2" class="categoria_pop">
                <div class="img_pop"><img id="cambio_img_2" src="media/pop_2.png"></div>
                <div class="nome_pop">Auricolari</div>
            </a>
            <a href="smart_home.php?id=4" class="categoria_pop">
                <div class="img_pop"><img id="cambio_img_3" src="media/pop_3.png"></div>
                <div class="nome_pop">Videocamere</div>
            </a>
        </div>


    </section>

    <section class="newsletter">


        <div class="sfondo_newsletter">
            <div class="contenitore_newsletter">
                <img src="media/newsletter.svg">
                <div class="scritta_newsletter"><strong>Ricevi novità, offerte, promemoria del carrello e sondaggi dal Google Store.</strong></div>
                <div class="registrati_newsletter"><button id="b_news"><span class="scopri">Registrati</span></button></div>
            </div>
        </div>


    </section>

    <section class="consigli_acquisti">


        <div class="zona_ca">
            <div class="titolo_ca"><strong>Perché acquistare sul Google Store.</strong></div>
            <div class="contenitore_ca">
                <div class="box_ca">
                    <img src="media/ca_1.svg" class="img_box_ca">
                    <div class="scritta_box_ca"><strong>Spedizione gratuita.</strong></div>
                    <div class="scopri_box_ca"><span class="scopri">Scopri di più</span></div>
                </div>
                <div class="box_ca">
                    <img src="media/ca_2.svg" class="img_box_ca">
                    <div class="scritta_box_ca"><strong>Approfitta della nostra promessa del miglior prezzo.</strong></div>
                    <div class="scopri_box_ca"><span class="scopri">Scopri di più</span></div>
                </div>
                <div class="box_ca">
                    <img src="media/ca_3.svg" class="img_box_ca">
                    <div class="scritta_box_ca"><strong>Resi comodi e gratuiti.</strong></div>
                    <div class="scopri_box_ca"><span class="scopri">Scopri di più</span></div>
                </div>
            </div>
        </div>


    </section>


   
    <footer>


        <div class="f_alto">

            <div id="notizie">
                <div id="contenitore_b_notizie">
                    <button id="b_notizie">Clicca per le ultime notizie</button>
                </div>

                <div id="contenitore_notizie"></div>

            </div>

            <div class="lista_f">
                <a href="">Metodi di pagamento</a>
                <a href="">Opzioni di consegna</a>
                <a href="">Gestire un ordine</a>
                <a href="">Disponibilità nei paesi e <br>limitazioni relative alla consegna</a>
                <a href="">Riparazioni</a>
                <a href="">Trova un tecnico Nest Pro</a>
                <a href="">Informazioni sul Google Store</a>
                <a href="">Assistenza per l'accessibilità</a>
            </div>
            <div class="lista_f">
                <a href="">Centro assistenza</a>
                <a href="">Contattaci</a>
                <a href="">Riciclo di dispositivi</a>
            </div>

        </div>

        <div class="f_basso">

            <div class="contenitore_icone_f">

                <div class="icone_f">
                    <a href="">
                        <img src="media/icona_twitter.svg" class="img_icona">
                    </a>
                </div>

                <div class="icone_f">
                    <a href="">
                        <img src="media/icona_instagram.svg" class="img_icona">
                    </a>
                </div>

                <div class="icone_f">
                    <a href="">
                        <img src="media/icona_facebook.svg" class="img_icona">
                    </a>
                </div>

                <div class="icone_f">
                    <a href="">
                        <img src="media/icona_youtube.svg" class="img_icona">
                    </a>
                </div>

                <div class="icone_f">
                    <a href="">
                        <img src="media/icona_titok.svg" class="img_icona">
                    </a>
                </div>

            </div>

            <div class="contenitore_link_f">

                <div class="link_f">
                    <a href="">
                        <img src="media/italianflag.svg" class="img_link_f">
                    </a>
                    <div class="regione_f">Italia</div>
                </div>

                <div class="link_f">
                    <a href="">Privacy</a>
                </div>

                <div class="link_f">
                    <a href="">L'impegno di Google Nest per la privacy</a>
                </div>
                
                <div class="link_f">
                    <a href="">Condizionoi di vendita</a>
                </div>

                <div class="link_f">
                    <a href="">Termini di servizio</a>
                </div>

            </div>
        </div>



    </footer>
</body>
</html>
<?php

    session_start();

    if(!isset($_SESSION["email"]))
    {
        // Vai al login
        header("Location: hw1_login.php");
        exit;
    }

?>

<html>

<head>
    <meta charset="UTF-8" />
    <title>Google Store</title>
    <link rel="stylesheet" href="pagina_utente_2.css"/>
    <script src="pagina_utente_1.js" defer></script>
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

    <div class="spazio"></div>


    <section id="welcome"> 


        <div id="titolo_welcome">
            <?php
               echo "<h1>Benvenuto ".$_SESSION['nome']." </h1>"
            ?>
        </div>  
        
        
    </section>

    <section id="ricerca_spotify">
                                
            <form method="get" name='form_spotify' action='pagina_utente.php' id='form_spotify'>
                <input type="text" name='ricerca' placeholder="Inserisci la tua ricerca" id="ricerca">
                <input type="submit" value="Cerca" id="invia">
            </form>
                                

    </section>

    <section id="vista_prodotti">
    </section>


    <div class="spazio"></div>



    <footer>
        
    
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
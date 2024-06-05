<?php

    session_start();

?>

<html>

<head>
    <meta charset="UTF-8" />
    <title>Carrello</title>
    <link rel="stylesheet" href="carrello_5.css"/>
    <script src="carrello_5.js" defer></script>
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

            </div>

            <div id="title_nav">

                <strong>Carrello</strong>

            </div>            

            <div class="contenitore_icone_nav">
               
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



    <section id="carrello_vuoto"> 

        <div id="contenitore_carrello_vuoto">

            <div>
                <h1>Il tuo carrello è vuoto</h1>
            </div>
            
            <div>
                <a href="telefoni.php?id=1">Scopri subito i nuovi Pixel</a>
            </div>

        </div>
            
    </section>

    <section id="vista_prodotti">
    </section>



    <?php 

    $res=null;

    if(isset($_SESSION["email"]))
    {
        // Connetti al database
        $conn = mysqli_connect("localhost", "root", "", "test");
        // Escape dell'input
        $utente = $_SESSION["email"];
        $query = "SELECT totale FROM totale_carrello WHERE utente = '$utente'";
        $res = mysqli_query($conn, $query);

    }
    
    if ($res) {
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            echo "<div id='totale'>";
            echo "<strong>Totale €" . $row['totale'] . "</strong>";
            echo "<a id='b_paga' href='sim_pagamento.php'>Paga con un click</a>";
            echo "</div>";
        } else {
            echo "<div id='totale'>";
            echo "<strong>Totale €0</strong>";
            echo "<button>Paga con un click</button>";
            echo "</div>";
        } 
    }                   
    ?>


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
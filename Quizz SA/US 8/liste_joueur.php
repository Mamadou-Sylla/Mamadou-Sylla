<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style _liste_joueur.css">
        <title>SA Quizz</title>
        </head>
    <body>
        <style>
                        *{
                            margin: 0;
                            padding: 0;
                        }
                    body{
                        overflow-x: hidden;
                        overflow-y: hidden;
                    }
                        table{
                            width: 70%;
                            border:2px solid grey;
                            margin-left:5%;
                            border-radius:2%;
                            padding:10px;
                        }
                        h4{
                        margin-left:120px;
                            color: grey;
                        }
                    #btn{
                        margin-top:55%;
                        width: 15%;
                        border: none;
                        margin-right:1%;
                    }
                    #child{
                        padding-right:100px;
                        color:grey;

                    }
        </style>
        <div class="container">
            <h4>LISTE DES JOUEURS PAR SCORE</h4>
            <div class="section_haut">
                <table>
                    <th id="child">Nom</th><th id="child">Prénom</th><th id="child">Score</th>
                    <tr>
                        <td>DIATTA</td>
                        <td>Ibou</td>
                        <td> 1 022 pts</td>
                    </tr>
                    <tr>
                        <td>NIANG</td>
                        <td>Aly</td>
                        <td>963 pts</td>
                    </tr>
                    <tr>
                        <td>MBAYE</td>
                        <td>Saliou</td>
                        <td>877 pts</td>
                    </tr>
                    <tr>
                        <td>DIOUF</td>
                        <td>Khady</td>
                        <td>875 pts</td>
                    </tr>
                    <tr>
                        <td>SOW</td>
                        <td>Moussa</td>
                        <td>870 pts</td>
                    </tr>
                    <tr>
                        <td>MBOUP</td>
                        <td>Youssou</td>
                        <td>816 pts</td>
                    </tr>
                    <tr>
                        <td>NIANG</td>
                        <td>Djiby</td>
                        <td>816 pts</td>
                    </tr>
                    <tr>
                        <td>DIENG</td>
                        <td>Astou</td>
                        <td>800 pts</td>
                    </tr>
                    <tr>
                        <td>SAMB</td>
                        <td>Ibrahima</td>
                        <td>797 pts</td>
                    </tr>
                    <tr>
                        <td>GUEYE</td>
                        <td>Léna</td>
                        <td>763 pts</td>
                    </tr>
                    <tr>
                        <td>BEYE</td>
                        <td>Aminata</td>
                        <td>760 pts</td>
                    </tr>
                    <tr>
                        <td>MANÉ</td>
                        <td>Lamine</td>
                        <td>759 pts</td>
                    </tr>
                    <tr>
                        <td>MENDES</td>
                        <td>Serges</td>
                        <td>730 pts</td>
                    </tr>
                    <tr>
                        <td>NDECKY</td>
                        <td>Estelle</td>
                        <td>723 pts</td>
                    </tr>
                    <tr>
                        <td>DIALLO  </td>
                        <td>Moustapha</td>
                        <td>720 pts</td>
                    </tr>
                    <tr>
                        <td>NDOUR</td>
                        <td>Abba</td>
                        <td>716 pts</td>
                    </tr>
            </div>
                    <?php
                        $nombrevaleurparpage=15;
                       
                                    $totalvaleur=15;
                                    $nbredepage=ceil($totalvaleur/$nombrevaleurparpage);
                                    if(isset($_GET['lien'])){
                                                $pageActuel=$_GET['lien'];
                                                if($pageActuel>$nbredepage){
                                                    $pageActuel=$nbredepage;
                                                }
                                            else{
                                                $pageActuel=1;
                                            }
                                            $IndiceDepart=($pageActuel-1)*$nombrevaleurparpage;
                                            $IndiceDeFin=$IndiceDepart+$nombrevaleurparpage-1;
                                        }
                                        
                        
                            for ($page=1; $page<=$nbredepage ; $page++){ 
                                            # code...
                                            ?>           
                                        
                <button name="suivant" id="btn"><?php  echo "<a href=administrateur.php?page=liste_liste?lien=".$page."></a>";?>Suivant</button>
                            <?php 
                            }
                            ?>
        </div>
    </body>
</html>






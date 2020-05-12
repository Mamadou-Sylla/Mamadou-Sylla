<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            #score1,  #score2,  #score3,  #score1{
                padding-bottom:5px;
                border-radius:2px;
            }
            #score1{
                border-bottom:3px solid #3addd6;
            }
            #score2{
                border-bottom:3px solid orange;
            }
            #score3{
                border-bottom:3px solid red;
            }
            #score4{
                border-bottom:3px solid grey;
            }
            #player{
                margin:10px;
                font-family:bold;
            }
            table{
                width:50%;
                height:40%;
                margin-left:20%;
                margin-top:-75px;
            }
        </style>
    </head>
    <body>
        <div class="container">
             <?php 
                echo"<table>";
                    echo"<tr>";
                        echo'<td id="player">Ibou DIATTA <td>'."    ".'<td id="score1">1022 pts <td>';
                    echo"</tr>";
                        echo"<br/>";
                    echo"<tr>";
                        echo'<td id="player">Aly NIANG <td>'."    ".'<td id="score1">963 pts <td>';
                    echo"</tr>";
                        echo"<br/>";
                    echo"<tr>";
                        echo'<td id="player">Saliou MBAYE <td>'."    ".'<td id="score2">877 pts <td>';
                    echo"</tr>";
                        echo"<br/>";
                    echo"<tr>";
                        echo'<td id="player">Khady DIOUF <td>'."    ".'<td id="score3">875 pts <td>';
                    echo"</tr>";
                        echo"<br/>";
                    echo"<tr>";
                        echo'<td id="player">Moussa SOW <td>'."    ".'<td id="score4">870 pts <td>';
                    echo"</tr>";
                        echo"<br/>";
                    
             ?>
        </div>
    </body>
</html>
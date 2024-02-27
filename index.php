<?php
    $hotels = [
        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],
    ];

    // copia l'array degli hotels in filtroHotel
    $filtroHotel = $hotels;

    // verifica se in "GET" c'è ['parcheggio'] e se il suo valore è uguale a 'selcParcheggio' preso dal value in options
    if(isset($_GET['parcheggio']) && $_GET['parcheggio'] == 'selcParcheggio' ){

        // array temporaneo
        $tempWithparking = [];

        // ciclo per l'elemento filtroHotel
        foreach($filtroHotel as $element){

            // verifica se nella chiave filtroHotel è presente 'parking' e se è in true
            if($element['parking']){
                // se c'è un parcheggio, viene aggiunto in tempWithparking
                $tempWithparking[] = $element;

            }
        }
        // copia l'array del filtroHotel in tempWithparking
        $filtroHotel = $tempWithparking;
    }






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!--     
    Iniziate in modo graduale.
    Prima stampate in pagina i dati, senza preoccuparvi dello stile.
    Dopo aggiungete Bootstrap e mostrate le informazioni con una tabella.


    Bonus:
    1 - Aggiungere un form ad inizio pagina che tramite una richiesta GET permetta di
    filtrare gli hotel che hanno un parcheggio.


    2 - Aggiungere un secondo campo al form che permetta di filtrare gli hotel per voto
    (es. inserisco 3 ed ottengo tutti gli hotel che hanno un voto di tre stelle o superiore)
    NOTA: deve essere possibile utilizzare entrambi i filtri contemporaneamente (es.
    ottenere una lista con hotel che dispongono di parcheggio e che hanno un voto di tre stelle o superiore)
    Se non viene specificato nessun filtro, visualizzare come in precedenza tutti gli hotel.
    -->

</head>
<body style="background-color: darkgray;">

    <div class="container">

        <form method="get" action="index.php">
            <div  class="row">
                <div class="col-3">
                    <div class="my-3">
                        <label for="parcheggio" class="form-label">parcheggio</label>
                        <select name="parcheggio">
                            <option value="">scegli</option>
                            <option value="selcParcheggio">parcheggio</option>
                        </select>
                        <button>Invia</button>
                    </div>
                </div>
            </div>
        </form>
        

        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">Hotel</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col">Parcheggio</th>
                        <th scope="col">Voto</th>
                        <th scope="col">Distanza dal centro</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- per ottenere il filtro -->
                    <?php foreach($filtroHotel as $element): ?>
                        <tr>
                            <td>
                                <?= $element ['name'] ?>
                            </td>

                            <td>
                                <?= $element ['description'] ?>
                            </td>

                            <td>
                                <!-- se c'è parcheggio ? ' ' : ' ' -->
                                <?= ($element ['parking']) ? 'Si' : 'No' ?>
                            </td>

                            <td>
                                <?= $element ['vote'] ?>
                            </td>

                            <td>
                                <?= $element ['distance_to_center'] ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
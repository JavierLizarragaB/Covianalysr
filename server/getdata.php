<?php
    include_once 'dbm.php';

    $sql = "SELECT COUNT(*) AS total from encuesta WHERE Respuesta='Más de 10 veces al mes' AND WHERE ID_Preguntas='2-1'";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $twoONEichi = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);

    $sql = "SELECT COUNT(*) AS total from encuesta WHERE Respuesta='De 6 a 10 veces al mes' AND WHERE ID_Preguntas='2-1'";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $twoONEni = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);

    $sql = "SELECT COUNT(*) AS total from encuesta WHERE Respuesta='De 1 a 5 veces al mes' AND WHERE ID_Preguntas='2-1'";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $twoONEsan = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);

    $sql = "SELECT COUNT(*) AS total from encuesta WHERE Respuesta='1 vez cada varios meses' AND WHERE ID_Preguntas='2-1'";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $twoONEyo = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);

    $sql = "SELECT COUNT(*) AS total from encuesta WHERE Respuesta='No realizaba compras en línea' AND WHERE ID_Preguntas='2-1'";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $twoONEgo = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);


    $data = [
        "Más de 10 veces por mes" => $twoONEichi["total"],
        "10 a 6 veces al mes" => $twoONEni["total"],
        "5 a 1 vez al mes" => $twoONEsan["total"],
        "1 vez cada varios meses" => $twoONEyo["total"],
        "No realizó compras en línea" => $twoONEgo["total"]
    ];
    $chartData = json_encode($data);

    /*$data = array();
    $data = {
            cols: [{id: '', label: 'Opcion', type: 'string'},
                {id: '', label: 'Respuestas', type: 'number'},
            ],
            rows: [
                {"c":[{"v":"Más de 10 veces por mes","f":null},{"v":$twoONEichi["total"],"f":null}]},
                {"c":[{"v":"10 a 6 veces al mes","f":null},{"v":$twoONEni["total"],"f":null}]},
                {"c":[{"v":"5 a 1 vez al mes","f":null},{"v":$twoONEsan["total"],"f":null}]},
                {"c":[{"v":"1 vez cada varios meses","f":null},{"v":$twoONEyo["total"],"f":null}]},
                {"c":[{"v":"No realizó compras en línea","f":null},{"v":$twoONEgo["total"],"f":null}]}
            ]
            ],
    };

    $chartData = json_encode($data); */

 /*   {
  cols: [{id: '', label: 'Opcion', type: 'string'},
         {id: '', label: 'Respuestas', type: 'number'},
  ],
  rows: [
            {"c":[{"v":"Más de 10 veces por mes","f":null},{"v":"q2_1a1" => $twoONEichi["total"],"f":null}]},
            {"c":[{"v":"10 a 6 veces al mes","f":null},{"v":"q2_1a2" => $twoONEni["total"],"f":null}]},
            {"c":[{"v":"5 a 1 vez al mes","f":null},{"v":"q2_1a3" => $twoONEsan["total"],"f":null}]},
            {"c":[{"v":"1 vez cada varios meses","f":null},{"v":"q2_1a4" => $twoONEyo["total"],"f":null}]},
            {"c":[{"v":"No realizó compras en línea","f":null},{"v":"q2_1a5" => $twoONEgo["total"],"f":null}]}
        ]
  ],
}
*/ /*
    $json = array(
        "q2_1a1" => $twoONEichi["total"],
        "q2_1a2" => $twoONEni["total"],
        "q2_1a3" => $twoONEsan["total"],
        "q2_1a4" => $twoONEyo["total"],
        "q2_1a5" => $twoONEgo["total"],
    );

    $chartData = json_encode($json);
    echo $chartData; */

    /*{
        "cols": [
            {"id":"","label":"Topping","pattern":"","type":"string"},
            {"id":"","label":"Slices","pattern":"","type":"number"}
        ],
        "rows": [
            {"c":[{"v":"Mushrooms","f":null},{"v":3,"f":null}]},
            {"c":[{"v":"Onions","f":null},{"v":1,"f":null}]},
            {"c":[{"v":"Olives","f":null},{"v":1,"f":null}]},
            {"c":[{"v":"Zucchini","f":null},{"v":1,"f":null}]},
            {"c":[{"v":"Pepperoni","f":null},{"v":2,"f":null}]}
        ]
    }*/

    /*$tableONEa = array();
    $tableONEa['cols'] = array(
        array('label'=>'Frecuency',type=>'string')
        array('label'=>'Answers',type=>'number')
    );

    $rows=array();*/
    echo $chartData;

?>
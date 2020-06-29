<?php

    include "../../server.php";

    if (isset($_GET['term'])) {
        $search = $_GET['term'];

        $query = $con->query("SELECT * FROM cosmetic_product WHERE name LIKE '%".$search."%' ORDER BY name"); 

        $response = [];

        if ($query->num_rows > 0) { 
            while ($row = $query->fetch_assoc()) { 
                $data['id'] = $row['id']; 
                $data['label'] = $row['name']; 
                array_push($response, $data); 
            } 
        }

        echo json_encode($response); 
    }

exit;
<?php
if (isset($_POST["submit"])) {
   

    $id = $_POST["id"];

    $area_id = $_POST["area_id"];
    $area_name = $_POST["area_name"];
    $location = $_POST["location"];
    $biodiversity_conservation = $_POST["biodiversity_conservation"];
    
    $research_institute_id = $_POST["research_institute_id"];
    $research_institute_location = $_POST["research_institute_location"];
    $research_institute_name = $_POST["research_institute_name"];
    
    $research_focus = $_POST["research_focus"];
    $flora_common_name = $_POST["flora_common_name"];
    $flora_scientific_name = $_POST["flora_scientific_name"];
    $habitat_preferences = $_POST["habitat_preferences"];
    
    $flora_family = $_POST["flora_family"];
    $planting_date = $_POST["planting_date"];
    $climate_id = $_POST["climate_id"];
    
    $climate_zone_id = $_POST["climate_zone_id"];
    $temperature_range = $_POST["temperature_range"];
    $seasonal_patterns = $_POST["seasonal_patterns"];
   

    if (!empty($id) && !empty($area_id) && !empty($area_name) && !empty($location) && !empty($biodiversity_conservation) && !empty($research_institute_id) && 
        !empty($research_institute_location) && !empty($research_institute_name) && !empty($research_focus) &&
        !empty($flora_common_name) && !empty($flora_scientific_name) && !empty($habitat_preferences) && !empty($flora_family) &&
        !empty($planting_date) && !empty($climate_id) && !empty($climate_zone_id) &&
        !empty($temperature_range) && !empty($seasonal_patterns) 
       ) {

        $link = mysqli_connect("localhost", "root", "12345678", "index");
        if ($link === false) {
            die(mysqli_connect_error());
        }

        $sql_flora = "INSERT INTO flora VALUES ('$area_id', '$area_name', '$location', '$biodiversity_conservation','$research_institute_id','$research_institute_location','$research_institute_name','$research_focus','$flora_common_name','$flora_scientific_name','$habitat_preferences','$flora_family','$planting_date','$climate_id','$climate_zone_id','$temperature_range','$seasonal_patterns')";
        

        $queries = [ $sql_flora];

        $success = true;

        foreach ($queries as $query) {
            if (!mysqli_query($link, $query)) {
                echo "Error: " . mysqli_error($link);
                $success = false;
                break;
            }
        }

        if ($success) {
            $sql_main = "INSERT INTO main VALUES ('$id')";
            if (mysqli_query($link, $sql_main)) {
                echo "Records inserted successfully into all tables";
            } else {
                echo "Error inserting records into tables : " . mysqli_error($link);
            }
        }

        mysqli_close($link);
    } else {
        echo "Please provide all information";
    }
}
?>
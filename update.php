<?php
$link = mysqli_connect("localhost", "root", "12345678", "index");
if ($link === false) {
    die(mysqli_connect_error());
}

function updateTable($link, $table, $idColumn, $id, $data)
{
    $updateValues = '';

    foreach ($data as $column => $value) {
        if (!empty($value)) {
            $sanitizedValue = mysqli_real_escape_string($link, htmlspecialchars($value));
            $updateValues .= "$column = '$sanitizedValue',";
        }
    }

    if (!empty($updateValues)) {
        $updateValues = rtrim($updateValues, ',');

        $sql = "UPDATE $table SET $updateValues WHERE $idColumn = '$id'";

        if (mysqli_query($link, $sql)) {
            echo "Records updated successfully in $table \n <br>";
        } else {
            echo "Error updating records in $table: " . mysqli_error($link);
        }
    } else {
        echo "No values provided for update in $table \n <br>";
    }
}

if (isset($_POST["submit"])) {
    // Update flora table
    $area_id = isset($_POST["area_id"]) ? $_POST["area_id"] : '';
    $area_name = isset($_POST["area_name"]) ? $_POST["area_name"] : '';
    $location = isset($_POST["location"]) ? $_POST["location"] : '';
    $biodiversity_conservation = isset($_POST["biodiversity_conservation"]) ? $_POST["biodiversity_conservation"] : '';
    $research_institute_id = isset($_POST["research_institute_id"]) ? $_POST["research_institute_id"] : '';
    $research_institute_location = isset($_POST["research_institute_location"]) ? $_POST["research_institute_location"] : '';
    $research_institute_name = isset($_POST["research_institute_name"]) ? $_POST["research_institute_name"] : '';
    $research_focus = isset($_POST["research_focus"]) ? $_POST["research_focus"] : '';
    $flora_common_name = isset($_POST["flora_common_name"]) ? $_POST["flora_common_name"] : '';
    $flora_scientific_name = isset($_POST["flora_scientific_name"]) ? $_POST["flora_scientific_name"] : '';
    $habitat_preferences = isset($_POST["habitat_preferences"]) ? $_POST["habitat_preferences"] : '';
    $flora_family = isset($_POST["flora_family"]) ? $_POST["flora_family"] : '';
    $planting_date = isset($_POST["planting_date"]) ? $_POST["planting_date"] : '';
    $climate_id = isset($_POST["climate_id"]) ? $_POST["climate_id"] : '';
    $climate_zone_id = isset($_POST["climate_zone_id"]) ? $_POST["climate_zone_id"] : '';
    $temperature_range = isset($_POST["temperature_range"]) ? $_POST["temperature_range"] : '';
    $seasonal_patterns = isset($_POST["seasonal_patterns"]) ? $_POST["seasonal_patterns"] : '';




    if (!empty($id)) {
        $data = array(
            "id" => $id,
            "area_id" => $area_id,
            "area_name" => $area_name,
            "location" => $location,
            "biodiversity_conservation" => $biodiversity_conservation,
            "research_institute_id" => $research_institute_id,
            "research_institute_location" => $research_institute_location,
            "research_institute_name" => $research_institute_name,
            "research_focus" => $research_focus,
            "flora_common_name" => $flora_common_name,
            "flora_scientific_name" => $flora_scientific_name,
            "habitat_preferences" => $habitat_preferences,
            "flora_family" => $flora_family,
            "planting_date" => $planting_date,
            "climate_id" => $climate_id,
            "climate_zone_id" => $climate_zone_id,
            "temperature_range" => $temperature_range,
            "seasonal_patterns" => $seasonal_patterns,



            



        );

        updateTable($link, "scheme", "s_id", $s_id, $data);
    }

    

}

mysqli_close($link);
?>
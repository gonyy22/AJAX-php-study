<?php
$conn = mysqli_connect("127.0.0.1", "gonyy22", "wysl22!@" , "gonyy22");

if($_POST['type'] === 'insert'){
    $three_price = (int)$_POST[total_price] / (int)$_POST[total_amount] * (int)$_POST[three_amount] ;
    $four_price =  (int)$_POST[total_price] / (int)$_POST[total_amount] * (int)$_POST[four_amount];
    $insert_query = "INSERT INTO snack_21st_july_jiwon(unique_id, category, name, total_amount, total_price, three_amount, four_amount, three_price, four_price) VALUES ('$_POST[unique_id]','$_POST[category]', '$_POST[name]', '$_POST[total_amount]','$_POST[total_price]', '$_POST[three_amount]', '$_POST[four_amount]', $three_price, $four_price)";
    $insert_live_query = "INSERT INTO snack_21st_july_jiwon_live(unique_id, three_stock_count, four_stock_count, update_day) VALUES (last_insert_id(), 0, 0, now())";
    $select_query = "SELECT * FROM snack_21st_july_jiwon ORDER BY unique_id DESC LIMIT 1";
    $insert_result = mysqli_query($conn, $insert_query);
    $insert_live_result = mysqli_query($conn, $insert_live_query);
    $result_set = mysqli_query($conn, $select_query);
    $row = mysqli_fetch_object($result_set);
    $json_array = json_encode($row,JSON_UNESCAPED_UNICODE);
    echo $json_array;
}

if($_POST['type'] === 'select'){
    $sql = "SELECT * FROM snack_21st_july_jiwon INNER JOIN snack_21st_july_jiwon_live ON snack_21st_july_jiwon.unique_id = snack_21st_july_jiwon_live.unique_id";
    $result = mysqli_query($conn, $sql);
    $lists = [];
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            array_push($lists, $row);
        }
    echo json_encode($lists, JSON_UNESCAPED_UNICODE);
    }
}

if($_POST['type'] === 'delete'){
    $delete_query = "DELETE FROM snack_21st_july_jiwon WHERE unique_id = $_POST[unique_id]";
    $delete_live_query = "DELETE FROM snack_21st_july_jiwon_live WHERE unique_id = $_POST[unique_id]";
    $delete_result = mysqli_query($conn, $delete_query);
    $delete_live_result = mysqli_query($conn, $delete_live_query);

    echo $_POST[unique_id];
}

if($_POST['type'] === 'update'){
//    $update_query = "UPDATE snack_21st_july_jiwon SET category = '$_POST[category]', name='$_POST[name]', total_amount=$_POST[total_amount], total_price=$_POST[total_price], three_amount=$_POST[three_amount], four_amount=$_POST[four_amount] WHERE unique_id = $_POST[unique_id]";
//    $update_result = mysqli_query($conn, $update_query);

    $query = "UPDATE snack_21st_july_jiwon SET ";
    $update_arr = [];

    if ($_POST[category]) {
        array_push($update_arr, "category = '$_POST[category]' ");
    }
    if ($_POST[name]){
        array_push($update_arr, "name = '$_POST[name]' ");
    }
    if ($_POST[total_amount]){
        array_push($update_arr, "total_amount = '$_POST[total_amount]' ");
    }
    if ($_POST[total_price]){
        array_push($update_arr, "total_price = '$_POST[total_price]' ");
    }
    if ($_POST[three_amount]){
        array_push($update_arr, "three_amount = '$_POST[three_amount]' ");
    }
    if ($_POST[four_amount]){
        array_push($update_arr, "four_amount = '$_POST[four_amount]' ");
    }
    
    $query = $query . implode(',', $update_arr) . "WHERE unique_id = $_POST[unique_id]";
    $update_result = mysqli_query($conn, $query);

    $select_query = "SELECT * FROM snack_21st_july_jiwon WHERE unique_id = $_POST[unique_id]";
    $result_set = mysqli_query($conn, $select_query);
    $row = mysqli_fetch_object($result_set);
    $json_array = json_encode($row,JSON_UNESCAPED_UNICODE);

    echo $json_array;
}

?>
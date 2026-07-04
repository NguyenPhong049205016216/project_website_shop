<?php
function getPagination($conn, $table, $limit = 5){
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    if($page < 1){
        $page = 1;
    }
    $countSql = "SELECT COUNT(*) AS total FROM $table";
    $countResult = mysqli_query($conn, $countSql);
    $countRow = mysqli_fetch_assoc($countResult);
    $totalItems = $countRow['total'];
    $totalPages = ceil($totalItems / $limit);
    $offset = ($page - 1) * $limit;

    return [
        "page" => $page,
        "limit" => $limit,
        "offset" => $offset,
        "totalItems" => $totalItems,
        "totalPages" => $totalPages
    ];
}
// hàm phân trang
function renderPagination($page, $totalPages){
    echo '<div class="pagination">';
    if($page > 1){
        echo '<a href="?page='.($page - 1).'">Back</a>';
    }
    for($i = 1; $i <= $totalPages; $i++){
        $active = ($i == $page) ? "active-page" : "";
        echo '<a class="'.$active.'" href="?page='.$i.'">'.$i.'</a>';
    }
    if($page < $totalPages){
        echo '<a href="?page='.($page + 1).'">Next</a>';
    }
    echo '</div>';
}
?>
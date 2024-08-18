<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="StyleForBài2.css">
    <script src="JSForBài2.js"></script>
    <title>Bài 2</title>
</head>
<body>
<?php
$rowsPerPage = 10;
$data = [];
for ($i = 1; $i <= 100; $i++) {
    $data[] = [
        'STT' => $i,
        'Tensach' => "Tensach$i",
        'Noidungsach' => "Noidungsach$i"
    ];
}

$totalPages = ceil(count($data) / $rowsPerPage);
echo '<table>';
echo '<tr>
        <th id=\'id_1\'>STT</th>
        <th>Tên sách</th>
        <th>Nội dung sách</th>
      </tr>';

for ($page = 0; $page < $totalPages; $page++) {
    echo '<tbody class="slide" id="slide_' . $page . '">';
    for ($i = $page * $rowsPerPage; $i < ($page + 1) * $rowsPerPage && $i < count($data); $i++) {
        echo "<tr>";
        echo "<td>" . $data[$i]['STT'] . "</td>";
        echo "<td id=\"id_2\">" . $data[$i]['Tensach'] . "</td>";
        echo "<td id=\"id_2\">" . $data[$i]['Noidungsach'] . "</td>";
        echo "</tr>";
    }
    echo '</tbody>';
}

echo '</table>';
?>

<div>
    <button onclick="prevSlide()">Previous</button>
    <button onclick="nextSlide()">Next</button>
</div>


<script>
    let totalSlides = <?php echo $totalPages; ?>;
</script>
</body>
</html>
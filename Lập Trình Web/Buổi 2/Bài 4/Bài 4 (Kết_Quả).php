<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="StyleForBài4(Kết_Quả).css">
    <title>Kết Quả</title>
</head>
<body>
    <div class="div">
        <h1>Array Functions</h1>
        <div class="div" id="id_1">
            <div id="id">
                <?php 
                    if($_SERVER["REQUEST_METHOD"]=="POST"){
                        if(isset($_POST["array"]) && !empty($_POST["array"])){
                            $input=$_POST["array"];
                            $input_2=$_POST["item"];
                            if (is_string($input) && !empty($input)) {
                                $array = explode(',', $input);
                                $array=array_map('floatval', $array);
                                $input_2=floatval($input_2);
                                echo "<div> Mảng ban đầu: ";
                                for($i=0;$i<count($array);$i++){
                                    if($i!=(count($array)-1)){
                                        echo $array[$i] . ", ";
                                    }else{
                                        echo $array[$i] . ".";
                                    }
                                }
                                echo "</div>";

                                echo "Giá trị lớn nhất trong mảng: ";
                                $max=findmax($array);
                                echo " $max";
                                echo"<br>";
                                echo "Giá trị nhỏ nhất trong mảng: ";
                                $min=findmin($array);
                                echo " $min";
                                echo"<br>";
                                echo "Giá trị nhỏ nhất trong mảng: ";
                                $sum=sum($array);
                                echo " $sum";
                                sort($array);
                                echo"<br>";
                                echo "Mảng sau khi sắp xếp: ";
                                for($i=0;$i<count($array);$i++){
                                    if($i!=(count($array)-1)){
                                        echo $array[$i] . ", ";
                                    }else{
                                        echo $array[$i] . ".";
                                    }
                                }
                                echo"<br>";

                                find($input_2,$array);
                            }else {
                                echo "Dữ liệu không hợp lệ.";
                            }
                        }
                    }
                    function findmax($array){
                        $max=$array[0];
                        foreach($array as $item){
                            if($max<$item){
                                $max=$item;
                            }
                        }
                        return $max;
                    }

                    function findmin($array){
                        $min=$array[0];
                        foreach($array as $item){
                            if($min>$item){
                                $min=$item;
                            }
                        }
                        return $min;
                    }


                    function sum($array){
                        $sum=0;
                        foreach($array as $item){
                            $sum+=$item;
                        }
                        return $sum;
                    }

                    function find($input, $array){
                        foreach($array as $item){
                            if($item == $input){
                                echo "$input có trong mảng";
                                return true;
                            }
                        }
                        echo "$input không có trong mảng";
                        return false;
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
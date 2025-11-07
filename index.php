<?php
    $op = "";
    $sidea = "";
    $sideb= "";
    $sidec = "";
    $height = "";
    $result = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(isset($_POST['clear']))
        {
            $op = $sidea = $sideb = $sidec =  $height = $result = "";
        }
        else 
        {
            $sidea = $_POST['sidea'];
            $sideb = $_POST['sideb'];
            $sidec = $_POST['sidec'];
            $height = $_POST['height'];
            $op = $_POST['op'];

            switch($op){
                case 'area':
                    if($sideb === "" || $height === "")
                    {
                        $result = "Please enter Side B/Height to compute the Area.";
                    }
                    else {
                        $result = ($sideb * $height) / 2;
                    }
                    break;
                case 'perimeter':
                    if ($sidea === "" || $sideb === "" || $sidec === "")
                    {
                        $result = "Please Enter Side A/Side B/Side C to compute the Perimeter.";
                    }
                    else 
                    {
                        $result = $sidea + $sideb + $sidec;
                    }
                    break;
    }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Area Perimeter Calculator</title>
</head>
<body class="bg-gray-100">
    <main class="w-full min-h-screen flex justify-center items-center p-4">
        <form method="POST" class="bg-white shadow-lg p-6 sm:p-8 md:p-10 rounded-lg flex flex-col gap-4 w-full max-w-xl">
            <h1 class="text-2xl sm:text-3xl font-bold text-center mb-4">Area & Perimeter Calculator</h1>

            <label for="sidea" class="text-md font-semibold">Side A</label>
            <input class="p-2 border-2 border-black rounded-lg focus:border-blue-600 focus:outline-none w-full" type="number" value="<?= $sidea ?>" name="sidea" placeholder="Enter Side A...">

            <label for="sideb" class="text-md font-semibold">Side B</label>
            <input class="p-2 border-2 border-black rounded-lg focus:border-blue-600 focus:outline-none w-full" type="number" value="<?= $sideb ?>" name="sideb" placeholder="Enter Side B...">
            
            <label for="sidec" class="text-md font-semibold">Side C</label>
            <input class="p-2 border-2 border-black rounded-lg focus:border-blue-600 focus:outline-none w-full" type="number" value="<?= $sidec ?>" name="sidec" placeholder="Enter Side C...">

            <label for="height" class="text-md font-semibold">Height</label>
            <input class="p-2 border-2 border-black rounded-lg focus:border-blue-600 focus:outline-none w-full" type="number" value="<?= $height ?>" name="height" placeholder="Enter Height...">

            <select class="p-2 border-2 border-black rounded-lg w-full" name="op">
                <option value="" <?= $op == "" ? "selected" : "" ?>></option>
                <option value="area" <?= $op == "area" ? "selected" : "" ?>>Compute for Area</option>
                <option value="perimeter" <?= $op == "perimeter" ? "selected" : "" ?>>Compute for Perimeter</option>
            </select>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-3 w-full">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg w-full sm:w-1/2">Compute</button>
                <button type="submit" name="clear" class="bg-blue-600 text-white px-6 py-2 rounded-lg w-full sm:w-1/2">Clear</button>
            </div>

            <input class="p-2 border-2 border-black rounded-lg w-full" type="text" name="result" value="<?= $result ?>" placeholder="Result..." readonly>
        </form>
    </main>
</body>
<script src="script.js"></script>
</html>


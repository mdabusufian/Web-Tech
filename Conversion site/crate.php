<!DOCTYPE html>
<html>

<head>
  <title>Conversion Rate</title>
</head>

<body>
<h1>Page 2 [Conversion Site]</h1>
<h3>Conversion Site</h3>

1.<a href="home.php">Home</a> 2.<a href="crate.php">Conversion Rate</a> 3.<a href="history.php">History</a><br>


  <h3>Conversion Rate:</h3>
  <form>    

   <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

   Category: <input type="text" name="cat" value="">
   Unit: <input type="text" name="uni" value="">
   Rate: <input type="text" name="rat" value="">

    <input type="submit" name="Submit">

  </form>

   <?php

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $Category= $_POST['cat'];
        $Unit = $_POST['uni'];
        $Rate = $_POST['rat'];

        if (empty($Category) or empty($Unit) or empty($Rate)) {
          echo "Wrong Information";
        }
        else {
          $Category = validate($cat);
          $Unit = validate($uni);
          $Rate = validate($rat);


          $handle = fopen("data.json", "a");
          $arr1 = array('Category' => $cat, 'Unit' => $uni,'Rate'=>$rat);
          $arr1 = json_encode($arr1);
          fwrite($handle, $arr1 . "\n");

          echo "Data Updated";
        }
      }

      function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

    ?>
    <br><br>

<table border="1">
 <thead>
   <tr>
     <th>Conversion Rate</th>
     <th>uni</th>
     <th>rat</th>
   </tr>
 </thead>
</table>
</body>
</html> 
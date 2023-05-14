<h1 class="text-center text-success">All Categories</h1>
    <table class="table table-bordered mt-5">
    <thead class="bg-info text-center">
        <tr>
        <th>Sl No</th>
        <th>Brand Title</th>
        <th>Edit</th>
        <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $number = 0;
             $select_category = "select * from brands ";
             $result_query = mysqli_query($con, $select_category);
             while($row_category = mysqli_fetch_assoc($result_query))
             {
                 $brand_title = $row_category['brand_title'];
                 $brand_id = $row_category['brand_id'];
                  //echo "<option value='$category_id'>$category_title</option>";
            $number++;
             
        ?>
        <tr class="text-center">
            <td><?php echo $number?></td>
            <td><?php echo $brand_title?></td>
            <td><a href='index.php?edit_brands=<?php echo $brand_id?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='index.php?delete_brands=<?php echo $brand_id?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
             }
             ?>
    </tbody>
    </table>
<h1 class="text-center text-success">All Categories</h1>
    <table class="table table-bordered mt-5">
    <thead class="bg-info text-center">
        <tr>
        <th>Sl No</th>
        <th>Category Title</th>
        <th>Edit</th>
        <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $number = 0;
             $select_category = "select * from Categories ";
             $result_query = mysqli_query($con, $select_category);
             while($row_category = mysqli_fetch_assoc($result_query))
             {
                 $category_title = $row_category['category_title'];
                 $category_id = $row_category['category_id'];
                  //echo "<option value='$category_id'>$category_title</option>";
            $number++;
             
        ?>
        <tr class="text-center">
            <td><?php echo $number?></td>
            <td><?php echo $category_title?></td>
            <td><a href='index.php?edit_category=<?php echo  $category_id?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='index.php?delete_category=<?php echo $category_id?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
             }
             ?>
    </tbody>
    </table>
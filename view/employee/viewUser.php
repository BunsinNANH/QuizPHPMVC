<div class="container">
    <a href="index.php?action=addUser"><i class="glyphicon glyphicon-plus-sign" style="font-size:20px;"></i></a>&nbsp;
    <table class="table table-striped table-bordered ">
        <tr class="text-center mt-4">
            <th>ID</th>
            <th>Usename</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
        <?php 
        if($data['user_data']!="" ){
            $i = 1;
            foreach($data['user_data'] as $rows):?>
                <tr>
                    <td class="text-center"><?php echo $i?></td>
                    <td class="text-center"><?php echo $rows['username']?></td>
                    <td class="text-center"><?php echo $rows['name']?></td>
                    <td class="text-center"><?php echo $rows['password']?></td>
                    <td class="text-center">
                        <a href="index.php?action=edit&id=<?php echo $rows['id']?>"><i class="glyphicon glyphicon-edit" style="font-size:20px;color:green;"></i></a>&nbsp;
                        <a href="index.php?action=delete&id=<?php echo $rows['id']?>"
                        onclick="return confirm('Are you sure you to Delete?')"><i class="glyphicon glyphicon-trash" style="font-size:20px; color:red;"></i></a>
                    </td>
                </tr>
        <?php
            $i++;
        endforeach;
    }else{
        echo "";
    }
        ?>
    </table>
</div>
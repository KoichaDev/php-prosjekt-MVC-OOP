<?php 
    function userReportedTable($user) {
?>
     <tr>
        <td><?php echo $user -> report_user_id; ?></td>                      
        <td><?php echo $user -> blog_user_name; ?></td>    
        <td><?php echo $user -> email; ?></td>   
        <td>
            <a href="<?php echo URLROOT; ?>/pages/blog/<?php echo $user -> blog_id_comments_from_post; ?>" style="color: blue;"><?php echo $user -> title; ?></a>
        </td>    
        <td><?php echo $user -> report_reason; ?></td>   
        <td><?php echo $user -> report_date; ?></td>       
        <td>
            <?php 
                switch ($user -> status) {
                    case 'unbanned':
                        ?>
                        <select name="status" class="select-status">
                            <option value="<?php echo URLROOT; ?>/admins/changeUserStatus/<?php echo $user -> report_user_id; ?>/unbanned">
                                <?php echo ucfirst($user -> status); ?>
                            </option>
                            <option value="<?php echo URLROOT; ?>/admins/changeUserStatus/<?php echo $user -> report_user_id; ?>/banned">
                                Banned
                            </option>
                            </select>
                        <?php
                        break;
                        case 'banned':
                        ?>
                        <select name="status" class="select-status">
                            <option value="<?php echo URLROOT; ?>/admins/changeUserStatus/<?php echo $user -> report_user_id; ?>/banned">
                                <?php echo ucfirst($user -> status) ?>
                            </option>
                            <option value="<?php echo URLROOT; ?>/admins/changeUserStatus/<?php echo $user -> report_user_id; ?>/unbanned">
                                Unbanned
                            </option>
                        </select>
                        <?php
                        break;
                    default:
                        break;
                }
            ?>
        </td>                                             
    </tr>
<?php
    }
?>
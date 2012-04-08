<h3>Search for <?php echo $_POST['username']; ?></h3>
<p>
<?php
if($db->isLoggedIn()){
    $search_result = $db->searchUsers($_POST['username']);
    if (count($search_result) === 0) {
?>
Sorry...no users matched that name.
<?php
    } else {
?>
    <table class='userlist'>
    <?php
        for ($i = 0; $i < 15; $i++) {
            $td = new UserTD((count($search_result) > $i) ? $search_result[$i] : null);
            if (($i % 5) === 0) {
                echo '<tr>';
            }
            echo $td->render();
            if (($i % 5) === 4) {
                echo '</tr>';
            }
        }
    ?>
    </table>
<?php
    }
} else {
    echo "You are not logged in ;)";
}
?>
</p>

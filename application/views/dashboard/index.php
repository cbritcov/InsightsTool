<h2>Create a report</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('dashboard') ?>

<label for="influencer_id">Influencer ID</label>
<input type="input" name="influencer_id"/><br/>

<label for="keywords">Keywords</label>
<input type="input" name="keywords"/><br/>

<input type="submit" name="submit" value="Search"/>

</form>

<?php
if (!empty($error_message)) {

    echo $error_message;

} elseif (!empty($search_result)) {

    echo "<pre>";
    var_dump($search_result);
    echo "</pre>";

    if($previous_cursor != 0){
    ?>
        <a href="<?$twitter_url?>'='<?previous_cursor_str?>"PREVIOUS/>
    <?php
    }
    if($next_cursor != 0){
        echo "i am here";
        ?>
        <a href="<?$twitter_url?>'='<?$next_cursor_str?>"NEXT/>
    <?php
    }
}
?>
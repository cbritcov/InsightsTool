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
    echo "<pre>";
    var_dump($error_message);
    echo "</pre>";
} elseif (!empty($search_result)) {

    echo "<pre>";
    var_dump($search_result);
    echo "</pre>";
}
?>
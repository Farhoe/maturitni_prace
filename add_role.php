<?php require_once "classes/Model.php"; ?>
<?php require_once "header.php"; ?>
<?php
$name = filter_input(INPUT_POST, 'name');
$description = filter_input(INPUT_POST, 'description');
$submit = filter_input(INPUT_POST, 'submit');

    $message = "Stránka se načetla";
if(isset($submit)) {
    $message = "Stránka se načetla odesláním formuláře";
    $result = RoleModel::addRole($name, $description);
    if($result) {
        $message .= "Tásk byl přidán.";
    }
    else {
        $message .= "Tásk nelze přidat.";
    }

}
?>

<h1>Přidávání rolí</h1>
<form action="add_role.php" method="post">

    <label for="title">Název:</label>
        <input type="text" name="name"> <br>
    <label for="description">Popis:</label>
        <textarea rows="1" cols="25" name="description" id="description" placeholder="popis úkolu"></textarea> <br>
    <input type="submit" name="submit" id="submit">
    <?php echo $message ?>

</form>

<?php require_once "footer.php" ?>

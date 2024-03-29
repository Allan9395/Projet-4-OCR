<?php $title = 'Blog Ecrivain - Jean Forteroche - Création de Chapitre'; ?>
<?php ob_start(); ?>

<div class="container adminCreateChapter">

    

    <form action="index.php?action=adminAddNewChapter" method="post" class="form-group">
    <h2>Publions un nouveau chapitre !<button class="btn btn-outline-success submitAdminCreateChapter" type="submit">Publier</button></h2>
        <input type="text" name="titleNewChapter" class="form-control titleCreateChapter" id="formGroupExampleInput" placeholder="Un titre à votre chapitre" required>
        <input type="text" name="descriptionNewChapter" class="form-control descriptionChapter" id="descriptionChapter" placeholder="Une description à votre chapitre">
        <textarea class="tinymce" name="contentNewChapter" id="" cols="30" rows="10" require></textarea>
        <button class="btn btn-outline-success submitAdminCreateChapter2" type="submit">Publier</button>
    </form>
</div>


<!-- Js-->
<script src="public/js/tinymce/js/jquery-min.js"></script>
<script src="public/js/tinymce/tinymce.min.js"></script>
<script src="public/js/tinymce/angs/fr_FR.js"></script>
<script src="public/js/tinymce/init-tinymce.js"></script>

<?php $content = ob_get_clean(); ?>

<?php require('views/backend/templateConnect.php');?>
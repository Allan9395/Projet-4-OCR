<?php

require_once('controller/frontend.php');
require_once('controller/backend.php');

try
{   // frontend
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listTickets') {
            listTickets();
        } elseif ($_GET['action'] == 'ticket') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                ticket();
            } else {
                throw new Exception('Erreur : aucun identifiant de billet envoyé');
            }    

        } elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author'] && !empty($_POST['comment']))) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                } else {
                    throw new Exception('Erreur : tout les champs ne sont pas remplie');
                }
            }

        } elseif($_GET['action'] == 'chapters') {
            chaptersPage();

        }elseif($_GET['action'] == 'jean') {
            require('views/frontend/jean.php');

        } elseif($_GET['action'] == 'registration') {
            require('views/backend/registrationView.php');

        } elseif ($_GET['action'] == 'registrationOk') {
            if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_confirm'])) {
                if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_confirm'])) {
                    dataVerification($_POST['username'], $_POST['email'], $_POST['password'], $_POST['password_confirm']);
                }
            }

        } elseif($_GET['action'] == 'registrationConfirmation') {
            require('views/backend/registrationConfirmation.php');

            //Backend
        } elseif($_GET['action'] == 'homeViewConnect') {
            if (isset($_POST['usernameConnect']) && isset($_POST['passwordConnect'])) {
                if (!empty($_POST['usernameConnect']) && !empty($_POST['passwordConnect'])) {
                    identityCheck($_POST['usernameConnect'], $_POST['passwordConnect']);
                }
            } else {
                throw new Exception('Erreur : tout les champs ne sont pas remplie');
            } 

        } elseif ($_GET['action'] == 'admin') {
            listTicketsAdmin ();

        } elseif ($_GET['action'] == 'adminticket') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                adminticket();
            } else {
                throw new Exception('Erreur : aucun identifiant de billet envoyé');
            } 

        } elseif ($_GET['action'] == 'disconnection') {
            header('Location: index.php');
        } elseif ($_GET['action'] == 'createChapter') {
            require('views/backend/adminCreateChapter.php');

        } elseif ($_GET['action'] == 'adminAddNewChapter') {
            if (isset($_POST['titleNewChapter']) && isset($_POST['descriptionNewChapter']) && isset($_POST['contentNewChapter'])) {
                if (!empty($_POST['titleNewChapter']) && !empty($_POST['contentNewChapter'])) {
                    addNewChapter($_POST['titleNewChapter'], $_POST['descriptionNewChapter'], $_POST['contentNewChapter']);
                } else {
                    throw new Exception('Erreur : Vous n\'aver pas remplie les champs pour créer le chapitre' );
                }
            }

        } elseif ($_GET['action'] == 'updateChapter') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (empty($_POST['titleNewChapter']) && empty($_POST['descriptionNewChapter']) && empty($_POST['contentNewChapter'])) {
                    chapterToEdit($_GET['id']);
                } else {
                    updateChapter($_GET['id'], $_POST['titleNewChapter'], $_POST['descriptionNewChapter'], $_POST['contentNewChapter']);
                }
            } else {
                throw new Exception('Erreur : aucun identifiant de billet envoyé');
            }

        } elseif ($_GET['action'] == 'deleteChapter') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                deleteChapter($_GET['id']);
            } else {
                throw new Exception('Erreur : aucun identifiant de billet envoyé');
            }

        } elseif ($_GET['action'] == 'report') {
            if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['id_chapter']) && $_GET['id_chapter'] > 0) {
                reportComment ($_GET['id'], $_GET['id_chapter']);
            }

        } elseif ($_GET['action'] == 'alertsComments') {
            commentsPosted();

        } elseif ($_GET['action'] == 'keepComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                keepComment ($_GET['id']);
            } else {
                throw new Exception('Erreur : aucun identifiant de commentaire envoyé');
            }

        }  elseif ($_GET['action'] == 'delateComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                delateComment ($_GET['id']);
            } else {
                throw new Exception('Erreur : aucun identifiant de commentaire envoyé');
            }
        }
    } else {
        listTickets();
    }

} catch(Exception $e) {
    $errorMessage = $e->getMessage();
    require('views/frontend/errorView.php');
}
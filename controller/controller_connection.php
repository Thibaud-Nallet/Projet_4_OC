 <?php
    //Connexion BDD
    require_once('model/ConnectionManager.php');
    function checkInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (isset($_POST['formConnection'])) {
        $mailConnect = checkInput($_POST['mailConnect']);
        $mdpConnect = checkInput($_POST['passwordConnect']);
        if (!empty($mailConnect) and !empty($mdpConnect)) {
            $connection = new Connection;
            $user = $connection->connectUser();
            if ($userExist == 1) {
                $userInfo = $reqUser->fetch();
                $_SESSION['id'] = $userInfo['id'];
                $_SESSION['pseudo'] = $userInfo['pseudo'];
                $_SESSION['email'] = $userInfo['email'];
                header("Location: view/gestionProfil.php?id=" . $_SESSION['id']);
            } else {
                $erreur = "Mauvais mail ou password";
            }
        } else {
            $erreur = "Tous les champs doivent être remplis";
        }
    }

    ?>
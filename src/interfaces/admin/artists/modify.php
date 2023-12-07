<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../index.php");
}

include_once('../../../database/config/config.php');
$sql = "SELECT * FROM artiste WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindValue(':id', $_GET['id']);
$stmt->execute();
$artist = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include('../../../assets/includes/head.php'); ?>
    <title>Modifier un artiste | Admin</title>
    <link rel="stylesheet" href="../../../assets/css/global.css" />
    <link rel="stylesheet" href="./assets/css/add.css" />
</head>

<body>
    <?php include('../../../assets/includes/sidebar.php'); ?>

    <div class="layout">
        <div class="previous-page-btn">
            <a href="../../../index.php">
                <i class="bi bi-chevron-left"></i>
            </a>
        </div>
        <div class="container">
            <h1>Inscription</h1>
            <form method="post" id="ArtistsForm" action="controllers/artists.contr.php">
                <!-- One "Index" for each step in the form: -->
                <div class="index">
                    <label for="firstname">Prénom</label>
                    <input oninput="this.className = ''" name="firstname" value="<?= $artist['prenom'] ?>" />
                    <label for="lastname">Nom</label>
                    <input oninput="this.className = ''" name="lastname" value="<?= $artist['nom'] ?>" />
                    <label for="pseudo">Pseudo</label>
                    <input oninput="this.className = ''" name="pseudo" value="<?= $artist['pseudo'] ?>" />
                </div>
                <div class="index">
                    <label for="genre">Genre</label>
                    <select name="genre" onchange="this.className = ''">
                        <option value="1">Photographie</option>
                        <option value="2">Peinture</option>
                        <option value="3">Sculpture</option>
                        <option value="4">Gravure</option>
                        <option value="5">Mosaïque</option>
                    </select>
                    <label for="email">Email</label>
                    <input type="email" oninput="this.className = ''" name="email" value="<?= $artist['email'] ?>" />
                    <label for="tel">Téléphone</label>
                    <input type="text" oninput="this.className = ''" name="tel" value="<?= $artist['telephone'] ?>" />
                </div>
                <div class="index">
                    <label for="web">Lien site web</label>
                    <input type="text" oninput="this.className = ''" name="web" value="<?= $artist['web'] ?>" />
                    <label for="fb">Lien facebook</label>
                    <input type="text" oninput="this.className = ''" name="fb" value="<?= $artist['facebook'] ?>" />
                    <label for="insta">Lien instagram</label>
                    <input type="text" oninput="this.className = ''" name="insta" value="<?= $artist['instagram'] ?>" />
                </div>
                <div class="index">
                    <label for="adresse">Numéro et Rue</label>
                    <input type="text" oninput="this.className = ''" name="adresse" value="<?= $artist['adresse'] ?>" />
                    <label for="ville">Ville</label>
                    <input type="text" oninput="this.className = ''" name="ville" value="<?= $artist['ville'] ?>" />
                    <label for="codepostal">Code Postal</label>
                    <input type="number" oninput="this.className = ''" name="codepostal" value="<?= $artist['code_postal'] ?>" />
                </div>
                <div class="index">
                    <label for="domaine">Genre d'art</label>
                    <input type="text" oninput="this.className = ''" name="domaine" value="<?= $artist['domaine'] ?>" />
                    <label for="pres">Présentation</label>
                    <input type="text" oninput="this.className = ''" name="pres" value="<?= $artist['presentation'] ?>" />
                    <label for="description">Description</label>
                    <input type="text" oninput="this.className = ''" name="description" value="<?= $artist['description'] ?>" />
                </div>
                <div class="index">
                    <label for="photo_url">Photo url</label>
                    <input type="text" oninput="this.className = ''" name="photo_url" value="<?= $artist['photo_url'] ?>" />
                    <label for="itw_url">Interview url</label>
                    <input type="text" oninput="this.className = ''" name="itw_url" value="<?= $artist['iterview_url'] ?>" />
                </div>
                <!-- Circles which indicates the steps of the form: -->
                <div class="dots">
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                </div>
                <div class="btns">
                    <button class="btn primary" type="button" id="nextBtn" onclick="nextPrev(1)">Suivant</button>
                    <button class="btn secondary" type="button" id="prevBtn" onclick="nextPrev(-1)">Précédent</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        var currentIndex = 0; // Current Index is set to be the first Index (0)
        showIndex(currentIndex); // Display the current Index

        function showIndex(n) {
            // This function will display the specified Index of the form ...
            var x = document.getElementsByClassName("index");
            x[n].style.display = "flex";
            // ... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Ajouter";
            } else {
                document.getElementById("nextBtn").innerHTML = "Suivant";
            }
            // ... and run a function that displays the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which Index to display
            var x = document.getElementsByClassName("index");
            // Exit the function if any field in the current Index is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current Index:
            x[currentIndex].style.display = "none";
            // Increase or decrease the current Index by 1:
            currentIndex = currentIndex + n;
            // if you have reached the end of the form... :
            if (currentIndex >= x.length) {
                //...the form gets submitted:
                document.getElementById("ArtistsForm").submit();
                return false;
            }
            // Otherwise, display the correct Index:
            showIndex(currentIndex);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("index");
            y = x[currentIndex].getElementsByTagName("input");
            // A loop that checks every input field in the current Index:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false:
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentIndex].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class to the current step:
            x[n].className += " active";
        }
    </script>
</body>

</html>
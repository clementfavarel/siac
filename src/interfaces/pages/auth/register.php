<?php
session_start();

/*
TODO : Check if all steps are built accordingly to the database table utilisateur
* 1. firstname, lastname
* 2. job, email
* 3. birth, living place
* 4. password and confirm
! make sure photo_url isn't in the db anymore
*/
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Inscription | Mapollon</title>
    <?php include('../../../assets/includes/head.php'); ?>
    <link rel="stylesheet" href="../../../assets/css/global.css" />
    <link rel="stylesheet" href="assets/css/auth.css" />
    <link rel="stylesheet" href="assets/css/register.css" />
</head>

<body>
    <div class="container">
        <h1>Inscription</h1>
        <form method="post" id="regForm" action="controllers/auth.contr.php">
            <!-- One "tab" for each step in the form: -->
            <div class="tab">
                <label for="firstname">Prénom</label>
                <input oninput="this.className = ''" name="firstname" />
                <label for="lastname">Nom</label>
                <input oninput="this.className = ''" name="lastname" />
            </div>
            <div class="tab">
                <label for="job">Profession</label>
                <input oninput="this.className = ''" name="job" />
                <label for="email">Email</label>
                <input type="email" oninput="this.className = ''" name="email" />
            </div>
            <div class="tab">
                <label for="birth">Date de naissance</label>
                <div class="birth">
                    <input placeholder="jj" oninput="this.className = ''" name="dd" />
                    <input placeholder="mm" oninput="this.className = ''" name="mm" />
                    <input placeholder="aaaa" oninput="this.className = ''" name="yyyy" />
                </div>
            </div>
            <div class="tab">
                <label for="username">Mot de passe</label>
                <input oninput="this.className = ''" name="pwd" type="password" />
                <label for="username">Confirmer le mot de passe</label>
                <input oninput="this.className = ''" name="pwd-repeat" type="password" />
            </div>
            <!-- Circles which indicates the steps of the form: -->
            <div class="dots">
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
            </div>
            <div class="btns">
                <button class="link" type="button" id="prevBtn" onclick="nextPrev(-1)">Précédent</button>
                <button class="btn btn-primary" type="button" id="nextBtn" onclick="nextPrev(1)">Suivant</button>
            </div>
        </form>
    </div>

    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form ...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "flex";
            // ... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "S'inscrire";
            } else {
                document.getElementById("nextBtn").innerHTML = "Suivant";
            }
            // ... and run a function that displays the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form... :
            if (currentTab >= x.length) {
                //...the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
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
                document.getElementsByClassName("step")[currentTab].className += " finish";
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
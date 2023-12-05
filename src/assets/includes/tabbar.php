<nav>
    <div class="row">
        <div class="col">
            <img class="menu-icon" src="../../../assets/img/map.svg" alt="Map" />
            <p class="small">Plan</p>
        </div>
        <div class="col">
            <img class="menu-icon" src="../../../assets/img/scan.svg" alt="Scan" />
            <p class="small">QR Code</p>
        </div>
        <div class="col">
            <img class="menu-icon" src="../../../assets/img/like.svg" alt="Like" />
            <p class="small">Favoris</p>
        </div>
        <div class="col">
            <img class="menu-icon" src="../../../assets/img/profile.svg" alt="User" />
            <p class="small">Profil</p>
        </div>
    </div>
</nav>

<style>
    nav {
        position: fixed;
        width: 80%;
        bottom: 16px;
        left: 50%;
        transform: translateX(-50%);
        padding: .5rem 0;
        background-color: #fff;
        border-radius: 1.875rem;
    }

    .row {
        display: flex;
        justify-content: space-around;
        align-items: center;
    }

    .col {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
    }

    .col:hover {
        cursor: pointer;
    }

    p {
        font-size: .9rem;
        margin: 0;
        padding: 0;
    }

    .menu-icon {
        width: 40px;
        height: 40px;
    }
</style>

<script>
    // Function to get the current folder name
    function getCurrentFolder() {
        var pathArray = window.location.pathname.split('/');
        // Remove empty elements and get the last element
        return pathArray.filter(Boolean).pop();
    }

    // Function to add the 'active' class and update the img src
    function setActiveTab() {
        var currentFolder = getCurrentFolder();
        var navItems = document.querySelectorAll('.col');

        for (var i = 0; i < navItems.length; i++) {
            var img = navItems[i].querySelector('img');
            var imgSrc = img.getAttribute('src');
            var imgName = imgSrc.substring(imgSrc.lastIndexOf('/') + 1, imgSrc.lastIndexOf('.'));

            if (imgName.toLowerCase() === currentFolder.toLowerCase()) {
                navItems[i].classList.add('active');
                // Change the img src to img"-active.svg"
                img.setAttribute('src', imgSrc.replace('.svg', '-active.svg'));
                break; // Stop after finding the match
            }
        }
    }

    // Call the function to set the active tab on page load
    window.onload = setActiveTab;
</script>
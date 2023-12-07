<aside>
    <div class="column">
        <button id="toggle" class="hamburger hamburger--squeeze" type="button">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </button>
        <?php
        $tabs = [
            [
                'name' => 'Dashboard',
                'icon' => 'layout.svg',
                'link' => '../dashboard'
            ],
            [
                'name' => 'Oeuvres',
                'icon' => 'pen-tool.svg',
                'link' => '../artworks'
            ],
            [
                'name' => 'Artistes',
                'icon' => 'user-plus.svg',
                'link' => '../artists'
            ],
            [
                'name' => 'Likes',
                'icon' => 'heart.svg',
                'link' => '../likes'
            ],
            [
                'name' => 'Users',
                'icon' => 'users.svg',
                'link' => '../users'
            ]
        ];

        foreach ($tabs as $tab) {
            echo '<a href="' . $tab['link'] . '" class="tab">';
            echo '<img src="../../../assets/img/' . $tab['icon'] . '" alt="' . $tab['name'] . '" />';
            echo '<span class="tab-name hide">' . $tab['name'] . '</span>';
            echo '</a>';
        }
        ?>
    </div>
</aside>

<style>
    @import url('../../../assets/css/hamburger.css');

    .hamburger {
        margin-left: .08rem;
        align-self: flex-start;
    }

    aside {
        position: relative;
        top: 0;
        left: 0;
        width: fit-content;
        height: 100%;
        padding: .5rem;
        background-color: var(--darkgrey);
    }

    aside.is-active {
        width: 100%;
    }

    .column {
        display: flex;
        flex-direction: column;
        gap: .5rem;
    }

    .tab {
        border: none;
        border-radius: 5px;
        color: #fff;
        padding: .75rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        width: 100%;
        max-width: 380px;
    }

    .tab:hover {
        /* display a little white gradient to make it active */
        background-image: linear-gradient(to left, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0));
        text-decoration: none;
    }

    .toggle {
        position: absolute;
        top: 0;
        right: 0;
        background-color: transparent;
        border: none;
        padding: .5rem;
        cursor: pointer;
    }

    .hide {
        display: none;
    }

    @media (min-width: 768px) {
        aside {
            max-width: 380px;
            border-right: 1px solid #333;
        }
    }
</style>

<script>
    const toggle = document.getElementById('toggle');
    const aside = document.querySelector('aside');
    const tab_name = document.querySelectorAll('.tab-name');

    toggle.addEventListener('click', () => {
        toggle.classList.toggle('is-active');
        aside.classList.toggle('is-active');
        tab_name.forEach(tab => {
            tab.classList.toggle('hide');
        });
    });
</script>

<nav id="appNavBar">

    <ul>

        <li class="navItems" data-action="Tile.add('indexTile')">
            <a onclick="Tile.add('indexTile', 'tileContainer', 'static', 'tile')">
                <span class="material-symbols-rounded">psychology</span>
                <p>About</p>
            </a>
        </li>

        <li class="navItems trigger" data-action="Tile.add('portfolioTile')">
            <a>
                <span class="material-symbols-rounded">edit</span>
                <p>Portfolio</p> 
            </a>
        </li>


        <li class="navItems trigger" data-action="Tile.clean(), Tile.add('blogTile')">
            <a>
                <span class="material-symbols-rounded">front_hand</span>
                <p>Contact</p>
            </a>
        </li>

        <li class="navItems trigger" data-action="Tile.clean(), Tile.add('blogTile')">
            <a>
                <span class="material-symbols-rounded">lightbulb</span>
                <p>Blog</p>
            </a>
        </li>

    </ul>



</nav>

<head>
    <script>
    //GET #appNavBar Items
    const navItems = document.querySelectorAll('.navItems');

    //RESET #appNavVar items
    function setActiveClass(clickedItem) {
        navItems.forEach(item => {
            item.classList.remove('is-active');   
        });

    // Add .is-active style to the clicked item
    clickedItem.classList.add('is-active');
    // Update changes on triggers
    triggerService();
    };
    
    </script>


    <style>
    /*High Structure app navigation bar*/
    #appNavBar {
        display: flex;
        flex-flow: column nowrap;
        justify-content: flex-start;
        align-items: center;
        padding: 24px 0px 24px 0px;

        width: 96px;

        z-index: 3;
        


    }

    /* List of navigable items*/

    #appNavBar ul {

        display: flex;
        flex-flow: column nowrap;
        justify-content: center;
        align-items: center;


        width: 100%;
    }

    /* Navigable item container*/

    #appNavBar ul li {

        display: flex;
        justify-content: center;
        align-items: center;

        width: 100%;
        height: 80px;

    }



    /* Navigable item link*/

    #appNavBar ul li a {

        display: flex;
        flex-flow: column nowrap;
        justify-content: center;
        align-items: center;
        gap: 4px;
        cursor: pointer;



    }

    /* Navigable item icon*/
    #appNavBar ul li a span {

        display: flex;
        flex-flow: row nowrap;
        justify-content: center;
        align-items: center;

        width: 24px;
        height: 34px;
        border-radius: 100px;
        font-variation-settings:
            'FILL'0,
            'wght'550,
            'GRAD'0,
            'opsz'24;

        color: var(--md-sys-color-on-secondary-container);
        transition: 0.4s cubic-bezier(0.05, 0.7, 0.1, 1.0);
    }

    #appNavBar ul li a span:hover {
        width: 56px;

        font-variation-settings:
            'FILL'0,
            'wght'700,
            'GRAD'0,
            'opsz'24;

        background-color: var(--md-sys-color-surface-variant);
        border-radius: 100px;
    }

    #appNavBar ul li a span:active {
        width: 56px;

        font-variation-settings:
            'FILL'0,
            'wght'400,
            'GRAD'0,
            'opsz'24;

        background-color: var(--md-sys-color-surface-variant);
        border-radius: 100px;
    }

    #appNavBar a p {

        font-size: 14px;
        font-family: Inter Tight, Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
        font-weight: 550;
        color: var(--md-sys-color-on-surface-variant);


    }


    /*IS-ACTIVE */
    /*ICON*/
    #appNavBar li.is-active a span {

        font-variation-settings:
            'FILL'1,
            'wght'600,
            'GRAD'0,
            'opsz'24;

        width: 56px;
        height: 34px;
        background-color: var(--md-sys-color-secondary-container);

    }
/*maintain is-active when hovered ICON*/
    #appNavBar li.is-active a span:hover {

        font-variation-settings:
            'FILL'1,
            'wght'600,
            'GRAD'0,
            'opsz'24;

        width: 56px;
        height: 34px;
        background-color: var(--md-sys-color-secondary-container);

    }

    /*P TEXT*/
    #appNavBar li.is-active a p {

        color: var(--md-sys-color-primary);

    }
    </style>

    <style>
    @media (max-aspect-ratio: 4/5) {

        /*High Structure navigation Component*/
        #appNavBar {
            flex-flow: row nowrap;

            width: 100%;
            height: 72px;
            max-width: none;
            padding: 0 8% 0 8%;
            box-shadow: 0px -1px 4px hsl(0deg, 0%, 94%);


        }

        /* NAV icon range Container*/

        #appNavBar ul {

            display: flex;
            flex-flow: row nowrap;

            height: auto;


        }

        #appNavBar ul li {

            display: flex;
            justify-content: center;
            align-items: center;

            width: 100%;




        }


    }
    </style>
</head>
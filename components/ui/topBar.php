<div id="topBar">
    <button class="colorBlue"
    onclick="Tile.add('indexTile', 'tileContainer', 'fill', 'tile')">
        <i class="material-symbols-outlined">add</i>
    </button>

    <button class="colorGreen" style="flex-grow:0.1"
        onclick="Tile.add('blankTile', 'tileContainer', 'fill', 'tile2')"><i
            class="material-symbols-outlined">add</i></button>

    <button class="colorBlue" 
    onclick="Tile.remove('tile')">
    <i class="material-symbols-outlined">remove</i></button>
    
    <button class="colorGreen" style="flex-grow:0.1"
     onclick="Tile.remove('tile2')">
     <i class="material-symbols-outlined">remove</i>
    </button>
</div>

<head>
    <style>
    .colorGreen {
        color: var(--accent_green);
        background-color: var(--lightAccent_green);
    }

    .colorBlue {
        color: var(--accent_blue);
        background-color: var(--lightAccent_blue);
    }

    #topBar {
        
        z-index: 2;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
        height: 24px;
        transition: 0.8s cubic-bezier(0.05, 0.7, 0.1, 1.0);
        opacity: 0;

    }

    #topBar:hover {
        width: 100%;
        display: flex;
        height: 64px;
        opacity: 1;

    }

    #topBar button {
        opacity: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-grow: 1;
        height: 40px;
        width: auto;
        outline-style: none;
        border-radius: 8px;
        transition: 0.8s cubic-bezier(0.05, 0.7, 0.1, 1.0);

        -webkit-backdrop-filter: blur(5px);
        backdrop-filter: blur(5px);

    }

    #topBar button:hover {

        padding: 0px 3% 0px 3%;
        border-radius: 24px;

    }

    #topBar button:active {
        background-color: rgb(32, 64, 94);
    }

    @media (max-aspect-ratio: 4/5) {

        #topBar {
    height: 0px;
    display: none;
}

    }
    </style>
</head>
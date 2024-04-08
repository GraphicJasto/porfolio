<article class="tileContent">
    <div class="scrollContent">

        <figure class="tileHead small">
            <section>

                <nav class="iconButton trigger" data-action="Tile.remove">
                    <span class="material-symbols-rounded">arrow_back</span>
                </nav>

            </section>
            <section></section>
        </figure>

        <figure class="tileBody">

            <input type="text">

        </figure>
    </div>

    <figure class="tileFoo">
        <nav class="pageButton trigger" data-action="Tile.add('blogTile')">
            <span class="material-symbols-rounded">full_coverage</span>
            <p>Go to project</p>
        </nav>
    </figure>

</article>





<head>



    <style>
    input {
        background-color: transparent;
        border: none;
        outline: none;
        padding: 0;
        margin: 0;
        font-family: inherit;
        font-size: 2em;
        color: inherit;
        width: auto;
        height: auto;
       
    }

    .tileHead {

        position: sticky;
        top: -0.5px;
        z-index: 2;

        display: flex;
        flex-flow: row nowrap;
        justify-content: flex-start;
        align-items: flex-start;
        border-radius: 0px 0px 0px 0px;
        gap: 28px;

        width: 100%;
        height: auto;
        scroll-behavior: auto !important;

        color: var(--md-sys-color-on-surface);

        transition: 0.8s cubic-bezier(0.05, 0.7, 0.1, 1.0);

    }


    /*tileHead Variants*/

    /*SMALL VARIANT*/

    .small {

        padding: 20px 20px 20px 20px;
    }

    .tileHead.small section {
        display: flex;
        flex-flow: row nowrap;
        justify-content: flex-start;
        align-items: center;
        gap: 16px;
    }

    .tileHead.small h1 {
        font-family: Inter tight;

        font-variation-settings: 'wght'500;
        font-size: 1.618rem;

        transition: 0.4s cubic-bezier(0.05, 0.7, 0.1, 1.0);
    }

    .iconButton {
        padding: 16px 16px 16px 16px;
        border-radius: 100px;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: none;
        cursor: pointer;
        background-color: rgba(0, 0, 0, 0.06);
        transition: 0.4s cubic-bezier(0.05, 0.7, 0.1, 1.0);
    }

    .iconButton span {
        width: 24px;
        height: 24px;
        font-variation-settings:
            'FILL'0,
            'wght'600,
            'GRAD'0,
            'opsz'48;
    }

    .tileHead.is-pinned {
        backdrop-filter: blur(16px);
        box-shadow: 0px 2px 8px hsla(0, 0%, 0%, 0.1);
        background-color: hsla(0, 0%, 100%, 0.05);

    }

    .iconButton:hover {
        margin: 0px 0px 0px -6px;
        padding: 16px 48px 16px 12px;
        font-variation-settings:
            'FILL'0,
            'wght'900,
            'GRAD'0,
            'opsz'20;
    }



    .iconButton:active {
        transform: scale(0.9);
        font-variation-settings:
            'FILL'0,
            'wght'900,
            'GRAD'0,
            'opsz'48;
    }

    /*MEDIUM VARIANT*/

    .medium {
        padding: 20px 20px 28px 20px;
    }

    .tileHead.medium section {
        display: flex;
        flex-flow: column nowrap;
        justify-content: flex-start;
        align-items: flex-start;

        gap: 16px;
        height: 100%;
    }

    .tileHead.medium h1 {
        font-family: Inter tight;
        width: 100%;
        font-variation-settings: 'wght'500;
        font-size: 4rem;
        line-height: 4rem;
        transition: 0.4s cubic-bezier(0.05, 0.7, 0.1, 1.0);
    }


    .tileContent.lenis,
    .tileContent.lenis {
        height: auto;
    }

    .tileContent.lenis-smooth {
        scroll-behavior: auto !important;
    }

    .tileContent.lenis-smooth [data-lenis-prevent] {
        overscroll-behavior: contain;
    }

    .tileContent.lenis-stopped {
        overflow: hidden;
    }

    .tileContent.lenis-scrolling iframe {
        pointer-events: none;
    }

    .tileFoo {

        position: sticky !important;
        bottom: 0px;
        z-index: 2;

        display: flex;
        flex-flow: row nowrap;
        justify-content: flex-end;
        align-items: center;
        padding: 16px;


        width: 100%;
        height: auto;
        scroll-behavior: auto !important;

        transition: 0.8s cubic-bezier(0.05, 0.7, 0.1, 1.0);
    }

    .pageButton {

        display: flex;
        flex-flow: row nowrap;
        justify-content: center;
        align-items: center;
        width: auto;
        gap: 12px;
        border-radius: 1000px;
        padding: 16px 20px;
        cursor: pointer;

        border: 1.5px solid hsla(0, 0%, 80%, 0.5);
        background-color: hsla(0, 0%, 100%, 1);
    }

    .pageButton p {

        font-family: Inter tight;

        font-variation-settings: 'wght'500;
        font-size: 1.1rem;
    }




    @media (max-aspect-ratio: 4/5) {
        .tileHead.medium h1 {
            font-size: 2.5rem;
            line-height: 2.5rem;

        }

        video {

            padding: 0px;
            border-radius: 0px;
            opacity: 60%;

        }

    }
    </style>




</head>
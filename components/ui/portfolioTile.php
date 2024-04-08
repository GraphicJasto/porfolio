<article class="tileContent">
    <div class="scrollContent">

    <figure class="tileHead small">
            <section>

                <nav class="iconButton trigger" data-action="Tile.remove">
                    <span class="material-symbols-rounded">arrow_back</span>
                </nav>

                <h1>Positioning statement</h1>

            </section>
            <section></section>
        </figure>

    <section class="grid-container">
        <!-- Conserva el aspect ratio de cada imagen si quieres cambiar la resolución -->
        <div class="gridA">
            <section id="parchis"></section>
        </div>
        <div class="gridB">
            <section></section>
        </div>
        <div class="gridC">
            <section></section>
        </div>



    </section>
    </div>
</article>



<head>
    




    <head>
        
        <style>
        .grid-container {

            display: flex;
            flex-flow: column wrap;
            gap: 16px;
            width: 100%;
            padding-bottom: 16px;

        }

        .grid-container div {
            display: flex;
            flex-flow: column nowrap;
            justify-content: flex-start;
            align-items: flex-end;
            overflow: clip;
            width: 100%;
            height: 400px;
            padding: 16px 16px 16px 16px;

            background-color: var(--md-sys-color-inverse-on-surface);
            border-radius: 24px;
        }

        .grid-container div section {
            z-index: 2;
            background-color: var(--md-sys-color-secondary-container);
            height: 100%;
            width: 80%;
            border-radius: 12px;
            padding: 0;
            overflow: clip;

        }

        #parchis {
            background-image: url(content/KERS.jpg);
            background-position: center;

            background-size: cover;
            background-repeat: no-repeat;
            z-index: 4;
            padding: 0;
        }
        </style>
    </head>
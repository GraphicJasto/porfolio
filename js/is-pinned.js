
 //TILEHEAD SCRIPTS//    
        //Observe tileHead to get pinned & change style once scrolled//
function observeHead(tileHead) {

    const el = tileHead;
    const observer = new IntersectionObserver(
        ([e]) => e.target.classList.toggle("is-pinned", e.intersectionRatio < 1), {
            root: document.querySelector(".tileContent"),
            threshold: [1]
        }
    );

    observer.observe(el);


}

async function initLenis(wrapper, content) {

const lenis = new Lenis({
    wrapper: wrapper, // Your custom wrapper
    eventsTarget: wrapper,
    content: content,
    lerp: 0.08, // The lerp factor determines the smoothness (lower value = smoother)
    smooth: true, // Enable smooth scrolling
    syncTouch: true,
    direction: 'vertical', // Scroll direction ('vertical' or 'horizontal')
    autoResize: true,
  });

  lenis.on('scroll', (e) => {
    
  })

  function raf(time) {
    lenis.raf(time); 
    requestAnimationFrame(raf);
  }
  
  requestAnimationFrame(raf);


}



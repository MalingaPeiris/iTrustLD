const parentContainer =  document.querySelector('.viewMoreDiv');

parentContainer.addEventListener('click', event=>{

    const current = event.target;

    const isReadMoreBtn = current.className.includes('viewMoreBtn');

    if(!isReadMoreBtn) return;

    const currentText = event.target.parentNode.querySelector('.viewMoreContent');

    currentText.classList.toggle('viewMoreContent--show');

    current.textContent = current.textContent.includes('View More') ? "View Less..." : "View More...";

})
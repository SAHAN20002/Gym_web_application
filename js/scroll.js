window.onload = function() {
    var element = document.getElementById('pricing_container');
        
    if (element) {
        element.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    } else {
        console.log('Div element is missing.');
    }
};

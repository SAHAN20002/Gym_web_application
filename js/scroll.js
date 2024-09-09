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

document.getElementById('Week_Plane_P').addEventListener('click', function() {
    alert('Pricing clicked');
});

document.getElementById('Month_Plane_P').addEventListener('click', function() {
    alert('Pricing clicked');
});

document.getElementById('Year_Plane_P').addEventListener('click', function() {
    alert('Pricing clicked');
});

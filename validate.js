let autocomplete;

function initAutocomplete() {
    const addressInput = document.getElementById('address');
    autocomplete = new google.maps.places.Autocomplete(addressInput, { types: ['geocode'] });
    autocomplete.addListener('place_changed', fillInAddress);
}

function fillInAddress() {
    const place = autocomplete.getPlace();
    if (!place.geometry) {
        alert("No details available for input: '" + place.name + "'");
        return;
    }

    const map = new google.maps.Map(document.getElementById("map"), {
        center: place.geometry.location,
        zoom: 15,
    });

    new google.maps.Marker({
        position: place.geometry.location,
        map: map,
    });

    let city = '';
    for (const component of place.address_components) {
        if (component.types.includes("locality")) {
            city = component.long_name;
            break;
        }
    }

    document.getElementById('city').value = city;
}

document.addEventListener("DOMContentLoaded", function() {
    initAutocomplete();
});

function validateForm() {
    const number1 = document.getElementById('number1').value;
    const number2 = document.getElementById('number2').value;

    if (number1.length > 3 || number2.length > 3) {
        alert('Input numbers must be up to 3 digits.');
        return false;
    }

    return true;
}

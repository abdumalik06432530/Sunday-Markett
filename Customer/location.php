<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Select Location</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places"></script>
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>
    <h1>Select Your Location</h1>
    <div id="map"></div>
    <input type="hidden" id="lat" name="lat">
    <input type="hidden" id="lng" name="lng">
    <input type="text" id="address" placeholder="Your address here" required>
    <button onclick="submitLocation()">Submit Location</button>

    <script>
        let map;
        let marker;

        function initMap() {
            const defaultLocation = { lat: -34.397, lng: 150.644 }; // Default location
            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 8,
                center: defaultLocation,
            });

            marker = new google.maps.Marker({
                position: defaultLocation,
                map: map,
                draggable: true,
            });

            google.maps.event.addListener(marker, 'dragend', function(event) {
                document.getElementById('lat').value = event.latLng.lat();
                document.getElementById('lng').value = event.latLng.lng();
            });
        }

        function submitLocation() {
            const address = document.getElementById('address').value;
            const lat = document.getElementById('lat').value;
            const lng = document.getElementById('lng').value;

            if (address && lat && lng) {
                // Save to session (or pass it to the next PHP script)
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = 'order_confirmation.php'; // Your order confirmation page
                form.innerHTML = `
                    <input type="hidden" name="address" value="${address}">
                    <input type="hidden" name="lat" value="${lat}">
                    <input type="hidden" name="lng" value="${lng}">
                `;
                document.body.appendChild(form);
                form.submit();
            } else {
                alert("Please select a location and enter your address.");
            }
        }

        window.onload = initMap;
    </script>
</body>
</html>

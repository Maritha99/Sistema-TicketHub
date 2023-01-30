if(document.querySelector('#mapa')) {

    const lat = -7.40647
    const lng = -79.57099
    const zoom = 16

    const map = L.map('mapa').setView([lat, lng], zoom);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([lat, lng]).addTo(map)
        .bindPopup(`
            <h2 class="mapa__heading">TicketHub</h2>
            <p class="mapa__texto">Punto de venta de entradas en físico</p>
        `)
        .openPopup();
}
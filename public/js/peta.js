document.addEventListener("DOMContentLoaded", function () {
    const map = L.map('map').setView([-7.8504876, 110.2001684], 16); // Ganti dengan koordinat tengah Dusun

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    const lokasiData = window.dusunMapData.lokasi;
    const iconUrls = window.dusunMapData.iconUrls;

    // Fungsi untuk membuat ikon Leaflet
    function getIcon(kategori) {
        const iconUrl = iconUrls[kategori] || iconUrls['default'];
        return L.icon({
            iconUrl,
            iconSize: [32, 32],
            iconAnchor: [16, 32],
            popupAnchor: [0, -32]
        });
    }

    function getIcon(kategori) {
        const lower = kategori ? kategori.toLowerCase() : 'default';
        const iconUrl = iconUrls[lower] || iconUrls['default'];

        if (!iconUrl) {
            console.error(`Icon URL untuk kategori "${kategori}" tidak ditemukan. Pastikan default tersedia.`);
            return L.icon({
                iconUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-icon.png', // fallback keras
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [0, -41]
            });
        }

        return L.icon({
            iconUrl,
            iconSize: [32, 32],
            iconAnchor: [16, 32],
            popupAnchor: [0, -32]
        });
    }


    // Tambahkan marker untuk setiap lokasi
    lokasiData.forEach(item => {
        const kategori = item.kategori ? item.kategori.toLowerCase() : 'default';
        const marker = L.marker([item.latitude, item.longitude], {
            icon: getIcon(kategori)
        }).addTo(map);

        marker.bindPopup(`<strong>${item.nama}</strong><br>${item.keterangan ?? 'Tidak ada'}`);
    });

});

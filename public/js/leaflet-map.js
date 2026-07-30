document.addEventListener('DOMContentLoaded', function () {
    // 1. Inisialisasi Peta
    // Koordinat pusat RW 5 Kelurahan Gundih (Kecamatan Bubutan, Surabaya)
    const mapCenter = [-7.2435, 112.7303]; // Koordinat area Gundih
    
    const map = L.map('leaflet-map', {
        zoomControl: true, // Leaflet's default top-left zoom control
    }).setView(mapCenter, 16);

    // Tambahkan layer OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        maxZoom: 19
    }).addTo(map);

    // 2. Polygon Batas RW 5 (Gundih) - Estimasi kotak
    const rwPolygonCoords = [
        [-7.2415, 112.7285],
        [-7.2415, 112.7325],
        [-7.2455, 112.7325],
        [-7.2455, 112.7285]
    ];

    const rwPolygon = L.polygon(rwPolygonCoords, {
        color: '#0d8abc',     // kelurahan-primary
        weight: 3,
        opacity: 1,
        fillColor: '#0d8abc',
        fillOpacity: 0.15
    }).addTo(map);

    rwPolygon.bindPopup("<b>Wilayah RW 5</b><br>Kelurahan Gundih");

    // Efek Hover pada Polygon
    rwPolygon.on('mouseover', function () {
        this.setStyle({ fillOpacity: 0.3 });
    });
    rwPolygon.on('mouseout', function () {
        this.setStyle({ fillOpacity: 0.15 });
    });

    // Sesuaikan view agar polygon terlihat semua
    map.fitBounds(rwPolygon.getBounds());

    // 3. Static Markers (Balai RW, Posyandu, Masjid/Mushola)
    const createCustomIcon = (iconClass, colorClass, bgColorClass, borderColorClass) => {
        return L.divIcon({
            html: `<div class="w-8 h-8 rounded-full ${bgColorClass} ${colorClass} flex items-center justify-center shadow-md border-2 ${borderColorClass} text-lg"><i class="${iconClass}"></i></div>`,
            className: '',
            iconSize: [32, 32],
            iconAnchor: [16, 16],
            popupAnchor: [0, -16]
        });
    };

    const staticFacilities = [
        { name: "Balai RW 5", lat: -7.2430, lng: 112.7298, type: "balai", icon: createCustomIcon('fas fa-building', 'text-blue-600', 'bg-blue-100', 'border-blue-300') },
        { name: "Posyandu RW 5", lat: -7.2440, lng: 112.7312, type: "posyandu", icon: createCustomIcon('fas fa-notes-medical', 'text-red-600', 'bg-red-100', 'border-red-300') },
        { name: "Masjid Baiturrahman", lat: -7.2435, lng: 112.7305, type: "masjid", icon: createCustomIcon('fas fa-mosque', 'text-green-600', 'bg-green-100', 'border-green-300') }
    ];

    staticFacilities.forEach(facility => {
        L.marker([facility.lat, facility.lng], { icon: facility.icon })
            .addTo(map)
            .bindPopup(`<div class="text-center font-bold text-gray-800">${facility.name}</div>`);
    });

    // 4. Marker Cluster Group untuk UMKM
    const umkmClusterGroup = L.markerClusterGroup({
        iconCreateFunction: function(cluster) {
            return L.divIcon({ 
                html: '<div><span>' + cluster.getChildCount() + '</span></div>', 
                className: 'marker-cluster marker-cluster-custom', 
                iconSize: L.point(40, 40) 
            });
        },
        maxClusterRadius: 50
    });

    // Helper Fungsi untuk Parse peta_embed Google Maps
    function extractCoordinates(embedString) {
        if (!embedString) return null;
        
        // Coba cari pola koordinat di maps (contoh: !3d-7.2435!4d112.7303 atau pb=!1m18!1m12!1m3!1d3957.2435!2d112.7303!3d-7.2435)
        const regex3d4d = /!3d(-?\d+\.\d+)!4d(-?\d+\.\d+)/;
        const match = embedString.match(regex3d4d);
        if (match && match.length >= 3) {
            return { lat: parseFloat(match[1]), lng: parseFloat(match[2]) };
        }

        return null;
    }

    // Buat marker UMKM dari window.umkmData (JSON dari blade)
    const umkmMarkers = []; // Array untuk simpan marker asli (untuk filter/search)

    if (window.umkmData && Array.isArray(window.umkmData)) {
        window.umkmData.forEach((umkm, index) => {
            // Coba dapatkan koordinat asli dari iframe, jika tidak ada, beri koordinat random di dalam polygon
            let coords = extractCoordinates(umkm.peta_embed);
            
            if (!coords) {
                // Generate random coordinate around map center (agar tidak menumpuk)
                const latOffset = (Math.random() - 0.5) * 0.003;
                const lngOffset = (Math.random() - 0.5) * 0.003;
                coords = {
                    lat: mapCenter[0] + latOffset,
                    lng: mapCenter[1] + lngOffset
                };
            }

            // Kategori dan Icon UMKM
            let iconClass = 'fas fa-store';
            let catNames = [];
            let catIds = [];

            if (umkm.categories && umkm.categories.length > 0) {
                umkm.categories.forEach(c => {
                    catNames.push(c.nama_kategori);
                    catIds.push(c.id);
                });

                // Pilih icon berdasar kategori pertama
                const catStr = catNames[0].toLowerCase();
                if (catStr.includes('makan') || catStr.includes('kuliner')) iconClass = 'fas fa-utensils';
                else if (catStr.includes('minum')) iconClass = 'fas fa-coffee';
                else if (catStr.includes('fashion') || catStr.includes('baju')) iconClass = 'fas fa-tshirt';
                else if (catStr.includes('jasa')) iconClass = 'fas fa-tools';
                else if (catStr.includes('kerajinan') || catStr.includes('kriya')) iconClass = 'fas fa-palette';
            } else {
                catNames.push('Umum');
            }

            const markerIcon = createCustomIcon(iconClass, 'text-orange-600', 'bg-orange-100', 'border-orange-300');
            const marker = L.marker([coords.lat, coords.lng], { icon: markerIcon });
            
            // Simpan data di marker untuk keperluan search & filter
            marker.umkmData = {
                name: umkm.nama_usaha.toLowerCase(),
                categoryIds: catIds.length ? catIds.map(String) : []
            };

            // Bangun konten popup
            const detailUrl = `/umkm/${umkm.id}`; // Sesuai rute web
            let popupHtml = `
                <div class="w-48 sm:w-56 p-1">
                    <h4 class="font-bold text-gray-900 text-lg border-b pb-1 mb-2 leading-tight">${umkm.nama_usaha}</h4>
                    <p class="text-xs text-gray-500 mb-2"><i class="fas fa-user mr-1 w-3 text-center"></i> ${umkm.pemilik}</p>
                    <div class="mb-2 flex flex-wrap gap-1">
                        ${catNames.map(c => `<span class="inline-block bg-blue-50 text-blue-700 border border-blue-200 text-[10px] font-bold px-2 py-0.5 rounded">${c}</span>`).join('')}
                    </div>
                    <p class="text-xs text-gray-600 line-clamp-2 mb-2"><i class="fas fa-map-marker-alt mr-1 w-3 text-center text-red-500"></i> ${umkm.alamat || 'Alamat tidak tersedia'}</p>
                    <p class="text-xs text-green-600 font-medium mb-3"><i class="fab fa-whatsapp mr-1 w-3 text-center"></i> ${umkm.no_telepon || '-'}</p>
                    <a href="${detailUrl}" class="block w-full text-center bg-blue-600 text-white text-xs py-1.5 rounded hover:bg-blue-700 transition-colors shadow-sm mb-1">Lihat Detail UMKM</a>
            `;
            
            if(umkm.peta_embed) {
                // Add a simple google maps search link based on address or name
                 popupHtml += `<a href="https://maps.google.com/?q=${encodeURIComponent(umkm.nama_usaha + ' ' + (umkm.alamat || ''))}" target="_blank" class="block w-full text-center bg-white border border-gray-300 text-gray-700 text-xs py-1.5 rounded hover:bg-gray-50 transition-colors shadow-sm">Buka di Google Maps</a>`;
            }
            popupHtml += `</div>`;

            marker.bindPopup(popupHtml);
            umkmMarkers.push(marker);
            umkmClusterGroup.addLayer(marker);
        });
    }

    map.addLayer(umkmClusterGroup);

    // 5. Fitur Search dan Filter
    const searchInput = document.getElementById('map-search');
    const filterCheckboxes = document.querySelectorAll('.category-filter');

    function applyFilters() {
        if(!searchInput) return;
        
        const searchTerm = searchInput.value.toLowerCase().trim();
        
        // Dapatkan kategori yang dicentang
        const activeCategories = Array.from(filterCheckboxes)
            .filter(cb => cb.checked)
            .map(cb => cb.value);

        // Bersihkan cluster layer
        umkmClusterGroup.clearLayers();

        // Loop semua marker, cek apakah lolos filter
        umkmMarkers.forEach(marker => {
            const mData = marker.umkmData;
            
            // Cek nama
            const matchesSearch = mData.name.includes(searchTerm);
            
            // Cek kategori 
            let matchesCategory = false;
            if (mData.categoryIds.length === 0) {
                matchesCategory = true; 
            } else {
                // Lolos jika setidaknya salah satu ID kategori marker ada di activeCategories
                matchesCategory = mData.categoryIds.some(id => activeCategories.includes(id));
            }

            if (matchesSearch && matchesCategory) {
                umkmClusterGroup.addLayer(marker);
            }
        });
    }

    // Event listener search
    if (searchInput) {
        searchInput.addEventListener('input', applyFilters);
    }

    // Event listener filter
    filterCheckboxes.forEach(cb => {
        cb.addEventListener('change', applyFilters);
    });

    // 6. Kontrol Tambahan (Fullscreen & Locate)
    const mapWrapper = document.getElementById('map-wrapper');
    const fullscreenBtn = document.getElementById('map-fullscreen-btn');
    const locateBtn = document.getElementById('map-locate-btn');

    if (fullscreenBtn && mapWrapper) {
        fullscreenBtn.addEventListener('click', function(e) {
            e.preventDefault();
            mapWrapper.classList.toggle('map-fullscreen');
            
            // Ganti icon
            const icon = fullscreenBtn.querySelector('i');
            if (mapWrapper.classList.contains('map-fullscreen')) {
                icon.classList.remove('fa-expand');
                icon.classList.add('fa-compress');
                document.body.style.overflow = 'hidden'; // cegah scroll body
            } else {
                icon.classList.remove('fa-compress');
                icon.classList.add('fa-expand');
                document.body.style.overflow = '';
            }
            
            // Trigger resize agar map render ulang tiles-nya dengan benar
            setTimeout(() => {
                map.invalidateSize();
            }, 300);
        });
    }

    if (locateBtn) {
        locateBtn.addEventListener('click', function(e) {
            e.preventDefault();
            map.locate({setView: true, maxZoom: 17});
        });

        // Event saat lokasi ditemukan
        map.on('locationfound', function(e) {
            const radius = e.accuracy / 2;
            
            // Hapus penanda lokasi sebelumnya jika ada
            if(window.userLocationMarker) {
                map.removeLayer(window.userLocationMarker);
                map.removeLayer(window.userLocationCircle);
            }

            window.userLocationMarker = L.marker(e.latlng).addTo(map)
                .bindPopup("Lokasi Anda dalam radius " + Math.round(radius) + " meter").openPopup();

            window.userLocationCircle = L.circle(e.latlng, radius, {
                color: '#3b82f6',
                fillColor: '#3b82f6',
                fillOpacity: 0.15
            }).addTo(map);
        });

        map.on('locationerror', function(e) {
            alert("Tidak dapat menemukan lokasi Anda. Pastikan izin lokasi (GPS) diaktifkan.");
        });
    }
});

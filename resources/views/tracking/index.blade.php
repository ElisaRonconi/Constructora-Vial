@extends('layouts.app')

@section('title', 'Rastreo de Máquinas')

@section('content')
    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white rounded shadow">
        <h1 class="text-2xl font-semibold mb-4 text-yellow-600">Seleccionar máquina a rastrear</h1>

        {{-- SELECT para elegir la máquina --}}
        <select id="machineSelect"
                class="w-full p-2 border border-gray-300 rounded mb-6"
                onchange="mostrarInfoMaquina()">
            <option value="">-- Selecciona una máquina --</option>
            @foreach ($machines as $machine)
                <option value="{{ $machine->serial }}">
                    {{ $machine->brand_model }} ({{ $machine->serial }})
                </option>
            @endforeach
        </select>

        {{-- DIV que muestra la provincia --}}
        <div id="infoMaquina" class="p-4 bg-gray-50 border border-gray-300 rounded hidden">
            <p class="text-lg font-medium text-gray-700">
                <strong>Provincia asignada:</strong>
                <span id="provinciaTexto" class="text-gray-900">---</span>
            </p>
        </div>

        {{-- DIV donde irá el mapa de Leaflet --}}
        <div id="map" class="mt-6 h-96 w-full rounded shadow hidden"></div>
    </div>
@endsection

@section('scripts')
    {{-- Leaflet CSS y JS --}}
    @section('scripts')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>



    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" ></script>

    <script>
        // Convertimos la colección de máquinas a un array JS
        const machines = @json($machines);

        let mapa, marcador;

        function inicializarMapa(lat, lng) {
            mapa = L.map('map').setView([lat, lng], 7);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(mapa);
            marcador = L.marker([lat, lng]).addTo(mapa);
        }

        function mostrarInfoMaquina() {
    const serial = document.getElementById('machineSelect').value;
    const infoDiv = document.getElementById('infoMaquina');
    const texto = document.getElementById('provinciaTexto');
    const mapaDiv = document.getElementById('map');

    if (!serial) {
        infoDiv.classList.add('hidden');
        texto.textContent = '';
        mapaDiv.classList.add('hidden');
        return;
    }

    const maquina = machines.find(m => m.serial === serial);
    let asignacionActiva = null;
    if (Array.isArray(maquina.assignments)) {
        asignacionActiva = maquina.assignments.find(a => !a.data_end);
    }

    if (asignacionActiva
        && asignacionActiva.work
        && asignacionActiva.work.province
        && asignacionActiva.work.province.latitud !== null
        && asignacionActiva.work.province.longuitud !== null) {

        const provincia = asignacionActiva.work.province.name;
        const lat = parseFloat(asignacionActiva.work.province.latitud);
        const lng = parseFloat(asignacionActiva.work.province.longuitud);

        texto.textContent = provincia;
        infoDiv.classList.remove('hidden');
        mapaDiv.classList.remove('hidden');

        // Importante: forzar redibujo
        setTimeout(() => {
            if (!mapa) {
                inicializarMapa(lat, lng);
            } else {
                mapa.setView([lat, lng], 7);
                marcador.setLatLng([lat, lng])
                        .bindPopup("Máquina: " + maquina.serial)
                        .openPopup();
            }
            mapa.invalidateSize(); // fuerza el render
        }, 200); // espera que el div esté visible
    } else {
        texto.textContent = "Guardada en Casa Central";
        infoDiv.classList.remove('hidden');
        mapaDiv.classList.add('hidden');
    }
}


        
    </script>
@endsection

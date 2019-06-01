<div class="bg-white border-right" id="sidebar-wrapper">
    <div class="list-group list-group-flush">
        <a href="{{ route('ingredientes.index') }}" class="list-group-item list-group-item-action bg-white">Ingredientes</a>
        <a href="{{ route('platos.index') }}" class="list-group-item list-group-item-action bg-white">Platos</a>
        <a href="{{ route('ordenes.index') }}" class="list-group-item list-group-item-action bg-white">Ordenes</a>
        <a href="{{ route('ordenes.create') }}" class="list-group-item list-group-item-action bg-white">Crear orden</a>
        <a href="{{ route('ordenes.buscar') }}" class="list-group-item list-group-item-action bg-white">Cerrar orden</a>
        <a href="{{ route('ventas.index') }}" class="list-group-item list-group-item-action bg-white">Venta del dia</a>
    </div>
</div>
<button class="btn btn-sidebar" id="menu-toggle"><</button>

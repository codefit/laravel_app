<!-- Main scripts -->
<script src="{{ asset('backend/assets/vendors/bundle.js') }}"></script>

<!-- Apex chart -->
<script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
<script src="{{ asset("backend/assets/vendors/charts/apex/apexcharts.min.js") }}"></script>

<!-- Daterangepicker -->
<script src="{{ asset('backend/assets/vendors/datepicker/daterangepicker.js') }}"></script>

<!-- DataTable -->
<script src="{{ asset('backend/assets/vendors/dataTable/datatables.min.js') }}"></script>

<!-- Dashboard scripts -->
<script src="{{ asset('backend/assets/js/examples/pages/ecommerce-dashboard.js') }}"></script>

<!-- Main functions -->
<script src="{{ asset("backend/assets/js/functions.js") }}"></script>

<!-- App scripts -->
<script src="{{ asset("backend/assets/js/app.min.js") }}"></script>



@if($listClass)
    <script src="{{ asset('backend/assets/js/module/table.js') }}"></script>
    <script src="{{ asset('backend/assets/js/module/events.js') }}"></script>
    <script>
        var Table = new table("{{ $listRoute }}");
        Table.setLimit(12);
        Table.setWrapper("{{ $listClass }}");
        Table.setWrapperPagination("pagination");
        Table.setLocation('{{ env('APP_URL') }}');
        @if(request()->get('p'))
            Table.setPage('{{ request()->get('p') }}')
        @endif
        @if(request()->get('q'))
            Table.setSearch('{{ request()->get('q') }}')
        @endif
        Table.read();
    </script>
@endif

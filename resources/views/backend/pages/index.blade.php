@extends('backend.layout')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <select id="action" class="form-control select-action w-20 ml-auto mr-3 ml-auto ">
                <option value="default" selected="">Vybrat akci</option>
                <option value="export_ppl">Export pro PPL</option>
                <option value="export_dhl">Export pro DHL</option>
                <option value="delete">Smazat</option>
            </select>
            <select id="status" class="form-control select-status w-20 ">
                <option value="default">Změna na</option>
                <option value="0">Blokován</option>
                <option value="1">Aktivní</option>
            </select>
            <table id="" class="table">
                <tbody id="{{ $listClass }}" class="{{ $listClass }}">

                </tbody>
            </table>
            <div id="pagination" class="pagination"></div>
        </div>
    </div>

@endsection

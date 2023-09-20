var itemsChecked = $(".check-selected");

$(document).on('click','.set-page',function (e){
    e.preventDefault();
    Table.setPage($(this).data("page"));
    pageParams.set('p', $(this).data("page"));
    if(Table.filter.search){
        pageParams.set('q', Table.filter.search);
    }
    if(Table.o){
        pageParams.set('o', Table.order);
    }
    history.pushState(null, null, pageUrl + "?" + pageParams);

    Table.read();
});

$(document).on("keyup",'.set-search', function (e){
    if (e.which === 13) {
        pageParams.set('q', $(this).val());
        history.pushState(null, null, pageUrl + "?" + pageParams);

        Table.setPage(1);
        Table.setSearch($(this).val());
        Table.read();
    }
});


$(document).on("change",'.select-action',function (){
    swal({
        title : 'Opravdu chcete provést akci?',
        text : 'Položky budou změněny',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#11b85c',
        cancelButtonColor: '#ff8510',
        buttons: [
            'Zrušit akci',
            'Ano provést'
        ],
    }).then((result) => {
        if (result) {
            Table.setAction($(this).val());
            Table.actionCall();
        }
    })
});

$(document).on("change",'.select-status',function (){
    swal({
        title : 'Opravdu chcete provést akci?',
        text : 'Položky budou změněny',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#11b85c',
        cancelButtonColor: '#ff8510',
        buttons: [
            'Zrušit akci',
            'Ano provést'
        ],
    }).then((result) => {
        if (result) {
            Table.setStatus($(this).val());
            Table.statusCall();
        }
    })
});


$(document).on('click','.checkall',function() {
    var name = $(this).attr("data-name");
    $("input[name='"+name+"[]']").prop('checked', this.checked);
});

$(document).on("change",".checkall",function (e) {
    if($(this).is(':checked')){
        Table.settings.checkedAll = true;
        Table.setActionType('exclude');
        Table.setData([]);
        itemsChecked.text(parseInt(Table.pagination.count));
    } else {
        Table.settings.checkedAll = false;
        Table.setActionType('include');
        Table.setData([]);
        itemsChecked.text(0);
    }
});

$(document).on("click",".item-check",function () {
    var item = $(this).val();
    var items = [];
    if($(this).is(':checked')){
        if(Table.actionType === "include"){
            items = $("input[name='items[]']:checked").map(function () {
                return this.value;
            }).get();
            Table.setData(arrayUnique(Table.data.concat(items)));
            itemsChecked.text(parseInt(Table.data.length));
        } else if(Table.actionType === "exclude"){
            let itemTmp = Table.data;
            Table.setData(itemTmp.filter(function (value) {
                return value !== item;
            }));
            items = $(".item-check:not(:checked)").map(function () {
                return this.value;
            }).get();
            Table.setData(arrayUnique(Table.data.concat(items)));
            itemsChecked.text(parseInt(Table.pagination.count) - parseInt(Table.data.length));
        }
    } else {
        if(Table.actionType === "include"){
            let itemTmp = Table.data;
            items = itemTmp.filter(function (value) {
                return value !== item;
            })
            Table.setData(arrayUnique(items));
            itemsChecked.text(parseInt(Table.data.length));
        }  else if(Table.actionType === "exclude"){
            items = $(".item-check:not(:checked)").map(function () {
                return this.value;
            }).get();
            Table.setData(arrayUnique(Table.data.concat(items)));
            itemsChecked.text(parseInt(Table.pagination.count) - parseInt(Table.data.length));
        }
    }
});

$('.filter-select').change(function (e) {

    var vals = $(this).val();
    var data = $(this).data();

    Table.setPage(1);
    /*
    pageParams.set('a', JSON.stringify(Table.filterGroups));
    pageParams.set('p', 1);
    if(Table.filter.search){
        pageParams.set('q', Table.filter.search);
    }
    if(Table.o){
        pageParams.set('o', Table.order);
    }
    */
    //history.pushState(null, null, window.location.protocol + "//" + window.location.host + window.location.pathname + "?" + pageParams);
    Table.setFilter(data,vals);
    Table.read();
});

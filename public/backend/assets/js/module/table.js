class table {
    constructor(
        service
    ){
        this.id = null;
        this.data = [];
        this.service = service;
        this.location = window.location.origin;

        this.page = 1;
        this.count = null;
        this.max = null;
        this.limit = 12;

        this.filter = {
            "search" : "",
            "attributes" : {},
        };

        this.filterGroups = {};

        this.order = 'default';

        this.request = null;
        this.response = null;

        this.html = "";

        this.wrapper = null;
        this.wrapperPagination = null;

        this.action = "";
        this.actionStatus = "";
        this.actionType = "include";
        this.settings = {
            "dashboard" : true,
            "checkedAll" : false,
            "readService" : "getAll"
        };
    }

    setId(id){
        this.id = id;
    }

    setData(data){
        this.data = data;
    }

    setLocation(location){
        this.location = location;
    }

    setFilter(data,vals){
        this.filter = [];

        for(var i in vals){
            if(vals[i]){
                this.filter.push({
                    'id' : vals[i],
                    'group' : data.name
                });
            }
        }

        this.filterGroups[data.name] = this.getArrayOfObjects(this.filter,'group');
    }

    setSearch(search){
        this.filter.search = search;
    }

    setPage(page){
        this.page = page;
    }

    setLimit(limit){
        this.limit = limit;
    }

    setOrder(order){
        this.order = order;
    }

    setWrapper(wrapper){
        this.wrapper = '#' + wrapper;
    }

    setWrapperPagination(wrapper){
        this.wrapperPagination =  '#' + wrapper;
    }
    setAction(action){
        this.action = action;
    }
    setActionType(actionType){
        this.actionType = actionType;
    }

    setReadService(service){
        this.settings.readService = service;
    }

    setStatus(status){
        this.actionStatus = status;
    }

    getId(){
        return this.id;
    }

    getData(){
        return this.data;
    }

    getPage(){
        return this.page;
    }

    getFilter(){
        return this.filter;
    }

    getOrder(){
        return this.order;
    }

    getArrayOfObjects(list, key) {
        return list.reduce(function(rv, x) {
            (rv[x[key]] = rv[x[key]] || []).push(x.id);
            return rv;
        }, { });
    };

    initFeatures(){
        $('[data-toggle="tooltip"]').tooltip({
            container: 'body'
        });
        $('.modal').modal("hide");
    }

    iniCheckSettings(){
        this.settings.checkedAll = false;
        this.setData([]);
        if($("#checkAll").is(':checked')){
            $("#checkAll").click();
        }
        $(".check-selected").text(0);
    }

    initActionSelect(){
        $('#action option[value="default"]').prop('selected',true);
    }

    initCheckItems(){
        for(var i in this.data){
            if(this.actionType === "include"){
                $('input[value='+this.data[i]+']').prop("checked",true);
            } else if(this.actionType === "exclude"){
                $('input[value='+this.data[i]+']').removeAttr("checked");
            }
        }
    }

    create(){
        try {
            if(this.data){

            } else {
                throw new Error("No Data set");
            }
        } catch(e){
            console.error(e);
        }
    }

    read(){
        var __this = this;
        __this.isProcessing();
        try {
            if(__this.request){
                __this.request.abort();
            }
            __this.request = $.get(__this.service, {
                order : __this.order,
                page: __this.page,
                count : __this.count,
                max: __this.max,
                limit : __this.limit,
                filters : JSON.stringify(__this.filterGroups),
                search : `${this.filter.search}`,
                settings : JSON.stringify(__this.settings),
            }, function (response, status) {
                __this.render(response.render);
                __this.max = response.max;
                __this.count = response.count;
                __this.renderPagination();
                if(response.renderOptions){
                    __this.renderOptions(response.renderOptions.optionsSelector,response.renderOptions.optionsData);
                }

                var options = "";
                if(response.galleryOptions){
                    for(var i in response.galleryOptions){
                        options += `
                    <div style="width: 25%; padding: 15px;">
                       <label for="galleryItem${response.galleryOptions[i].IMAGE_ID}" class="d-flex align-items-center flex-column justify-content-center">
                            <img src="${settings.url}image/${response.galleryOptions[i].IMAGE_ID}/100x100/${response.galleryOptions[i].IMAGE_NAME}}" alt="">
                            <input name="image_id" value="${response.galleryOptions[i].IMAGE_ID}" id="galleryItem${response.galleryOptions[i].IMAGE_ID}" type="checkbox" value="${response.galleryOptions[i].IMAGE_ID}" class="mt-5">
                        </label>
                    </div>
                `;
                    }
                }
                $('.options-gallery').html(options);

            } , "json" ).fail(function(e) {
                __this.alertify("Chyba při čtení dat " +e);
            }).always(function() {
                __this.isProcessing();
                __this.request = null;
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl)
                })
            });
        } catch(e){
            console.error(e);
        }
    }

    update(){
        try {
            if(__this.id && __this.data){
                if(__this.request){
                    __this.request.abort();
                }
                __this.request = $.post(__this.location + "api/services/"+__this.service+"/update", {

                }, function (response, status){

                }, "json" )
            } else {
                throw new Error("No ID or DATA set");
            }
        } catch(e){
            console.error(e);
        }
    }

    delete(){
        var __this = $(this);
        __this.isProcessing();
        try {
            if(__this.id){

            } else {
                throw new Error("No ID set");
            }
        } catch(e){
            console.error(e);
        }
    }

    actionCall(){
        var __this = this;
        __this.isProcessing();
        try {
            if(__this.data.length === 0 && __this.actionType === "include"){
                throw new Error("Nevybrali jste žádná data");
            }
            if(!__this.action){
                throw new Error("Není nastavena akce");
            }
            if(__this.request){
                __this.request.abort();
            }
            __this.request = $.post(__this.location + "api/services/"+__this.service+"/action", {
                'action' : __this.action,
                'actionType' : __this.actionType,
                'items' : __this.data,
                'filters' : JSON.stringify(__this.filterGroups),
                'search' : `${this.filter.search}`,
            }, function (response, status){
                if(response.success){
                    __this.iniCheckSettings();
                    __this.initActionSelect();
                    __this.read();

                    if(response.callback){
                        if(response.args){
                            __this.callback(response.callback,response.args);
                        } else {
                            __this.callback(response.callback);
                        }
                    }

                    notify('OK!', 'Změněno',"success");
                } else {
                    notify('Chyba!', response.error,"warning");
                }
            }, "json" ).fail(function(e) {
                __this.alertify("Chyba při akci -" +e);
            }).always(function() {
                __this.isProcessing();
                __this.request = null;
                __this.initActionSelect();
            });
        } catch(e){
            __this.initActionSelect();
            notify('Chyba', e.message,"warning");
        }
    }

    multipleEdit(){
        var __this = this;

        try {
            if(__this.data.length === 0 && __this.actionType === "include"){
                throw new Error("Nevybrali jste žádná data");
            }

            if(response.success) {

                __this.read();
            }
        } catch (e){
            notify('Chyba', e.message,"warning");
        }
    }

    statusCall(){
        var __this = this;
        __this.isProcessing();
        try {
            if(__this.data.length === 0 && __this.actionType === "include"){
                throw new Error("Nevybrali jste žádná data");
            }
            if(!__this.actionStatus){
                throw new Error("Není nastavena akce");
            }
            if(__this.request){
                __this.request.abort();
            }
            __this.request = $.post(__this.location + "api/services/"+__this.service+"/status", {
                'status' : __this.actionStatus,
                'statusType' : __this.actionType,
                'items' : __this.data,
                'token' : $('meta[name="csrf-token"]').attr('content')
            }, function (response, status){
                if(response.success){
                    __this.iniCheckSettings();
                    __this.initActionSelect();
                    __this.read();
                    notify('OK!', 'Změněno',"success");
                } else {
                    notify('Chyba!', response.error,"warning");
                }
            }, "json" ).fail(function(e) {
                __this.alertify("Chyba při akci -" +e);
            }).always(function() {
                __this.isProcessing();
                __this.request = null;
            });
        } catch(e){
            __this.initActionSelect();
            notify('Chyba', e.message,"warning");
        }
    }

    render(html){
        var __this = this;
        try {
            if(html){
                $(__this.wrapper).html(html);
                __this.initFeatures();
                setTimeout(function (){
                    __this.initCheckItems();
                },50);
            } else {
                $(__this.wrapper).html('');
            }
        } catch(e){
            // Todo: Catch with alerfiy
        }
    }
    renderHtml(){
        try {
            if(this.wrapper){
                $(this.wrapper).html(this.html);
            } else {
                throw new Error("No wrapper set");
            }
        } catch(e){
            console.error(e);
        } finally {

        }
    }

    renderPagination(){
        try {
            if(this.count > 0){
                if(this.wrapperPagination){
                    var prev = "",next = "", prevArr = [], lastpage,fillpage = 0;
                    var first = "", last = "";
                    var prevbefore = "", nextbefore = "";
                    if(this.page > 1){
                        prev += `<li class="page-item"><a class="page-link set-page" href="#" data-page="${this.page-1}" tabindex="" aria-disabled="true"><i class="ti-angle-left"></i> </a></li>`;
                    }

                    if(this.page !== this.max){
                        next += `<li class="page-item"><a class="page-link set-page" href="#" data-page="${this.page+1}"><i class="ti-angle-right"></i></a></li>`;
                    }
                    for(var i in prevArr){
                        prev += prevArr[i];
                    }

                    if(this.page > 1){
                        first = `
                            <li class="page-item"><a class="page-link set-page" href="" data-page="1">1</a></li>
                        `;
                        prevbefore += `
                          <li class="page-item">
                              <a href="" class="page-link set-page" data-page="${this.page-1}">${this.page-1}</a>
                         </li>
                        `;
                    }

                    if(this.page < this.max){
                        last = `
                            <li class="page-item">
                                <a class="page-link set-page" href="" data-page="${this.max}">${this.max}</a>
                            </li>
                        `;
                        nextbefore += `
                            <li class="page-item">
                              <a href="" class="page-link set-page" data-page="${this.page+1}">${this.page+1}</a>
                            </li>
                        `;
                    }

                    $(this.wrapperPagination).html(`
                    ${prev}
                    ${first}

                    <li class="page-item active">
                          <a href="#" class="page-link">${this.page}</a>
                    </li>

                    ${last}
                    ${next}
                `);

                    if(this.max <= 1){
                        $(this.wrapperPagination).css({
                            'display' : "none"
                        });
                    } else {
                        $(this.wrapperPagination).css({
                            'display' : "flex"
                        });
                    }
                } else {
                    throw new Error("No pagination wrapper set");
                }
            } else {
                $(this.wrapperPagination).html("");
                if(this.max <= 1){
                    $(this.wrapperPagination).css({
                        'display' : "none"
                    });
                } else {
                    $(this.wrapperPagination).css({
                        'display' : "flex"
                    });
                }
            }
            $('.count').text(this.count);
        } catch (e){
            console.error(e);
        }
    }

    renderOptions(selector,options){
        $(selector).html('<option value="">--Vyberte nadřazenou položku--</option>');
        $(selector).append(options);
    }

    alertify(error){
        console.error(error);
    }

    isProcessing(){

    }
    callback(fn, args = []){
        if(args){
            eval(fn + '(args)');
        } else {
            eval(fn + '()');
        }
    }
}


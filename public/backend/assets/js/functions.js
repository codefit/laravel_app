function isElement(el){
    return el.length > 0;
}
function isText(el){
    return el.attr("type") === "text";
}
function isRadio(el){
    return el.attr("type") === "radio";
}
function isCheckbox(el){
    return el.attr("type") === "checkbox";
}
function isTextarea(el){
    return el.is("textarea");
}
function isSelect(el){
    return el.is("select");
}
function isButton(el){
    return el.is("button");
}
function isHidden(el){
    return  el.attr("type") === "hidden";
}

function modal(id,event){
    var element =  $('#'+id);
    switch(event){
        case "show" :
            element.modal('show');
            break;
        case "hide" :
            element.modal('hide');
            break;
    }
}
function modalFill(id,response){

    for(let element in response){
        let input = $('#'+id).find('[name="'+element+'"]');

        if(isElement(input)){
            if(isText(input)){
                input.val(response[element]);
            }
            if(isCheckbox(input)){
                if(response[element] === 2){
                    input.prop('checked',true);
                }  else {
                    input.prop("checked",false);
                    input.removeAttr("checked");
                }
            }
            if(isSelect(input)){
                if(response[element]){
                    input.val(response[element]);
                } else {
                    input.val("");
                }
            }
            if(isTextarea(input)){
                if(input.hasClass("tinymce")){
                    tinymce.get('editText').setContent(response[element]);
                } else {
                    input.val(response[element]);
                }
            }
            if(isHidden(input)){
                input.val(response[element]);

            }
        } else {
            //console.error("Element " + element + " není element");
        }
    }
}

function modalFillImage(id,response){
    var image = $('#'+id).find("#imagePreview").attr("src",settings.url + "image/" + response.ID + "/400x400/" + response.SLUG + "." + response.EXTENSION);
    if(response.ID){
        $(".btn-delete-image").data("id",response.ID).removeClass('d-none');
    } else {
        $(".btn-delete-image").data("id","").addClass('d-none');
    }
}

function notify(title,text,type){
    swal({
        title: title,
        text: text,
        icon: type,
        dangerMode: true,
    })
}


function arrayUnique(array) {
    var a = array.concat();
    for(var i=0; i<a.length; ++i) {
        for(var j=i+1; j<a.length; ++j) {
            if(a[i] === a[j])
                a.splice(j--, 1);
        }
    }

    return a;
}

function exportFile(data) {
    const a = document.createElement('a');
    a.style.display = 'none';
    a.href = data.url;
    a.download = data.name;
    document.body.appendChild(a);
    a.click();
    window.URL.revokeObjectURL(data.url);
}

function copy(txt){
    var m = document;
    txt = m.createTextNode(txt);
    var w = window;
    var b = m.body;
    b.appendChild(txt);
    if (b.createTextRange) {
        var d = b.createTextRange();
        d.moveToElementText(txt);
        d.select();
        m.execCommand('copy');
    }
    else {
        var d = m.createRange();
        var g = w.getSelection;
        d.selectNodeContents(txt);
        g().removeAllRanges();
        g().addRange(d);
        m.execCommand('copy');
        g().removeAllRanges();
    }
    txt.remove();
}

function readURL(element,input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#'+element).css('background-image', 'url('+e.target.result +')');
            $('#'+element).css('background-size', 'contain');
            $('#'+element).hide();
            $('#'+element).fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function initMultiSelect(
    element = '.multiselect',
    enableFiltering = true,
    includeSelectAllOption = true,
    enableCaseInsensitiveFiltering = true
){
    $(element).multiselect({
        enableFiltering: enableFiltering,
        includeSelectAllOption: includeSelectAllOption,
        enableCaseInsensitiveFiltering: enableCaseInsensitiveFiltering,
        maxHeight:400,
        buttonClass: 'form-select',
        templates: {
            button: '<button href="" type="button" class="multiselect dropdown-toggle toggle-dropdown text-start" data-bs-toggle=".dropdown-menu"><span class="multiselect-selected-text"></span></button>',
            filter: '<div class="input-group"><input class="form-control multiselect-search" type="text"></div>',
        },
    });
}

function initColorPicker(){
    $(".colorpicker").spectrum({
        allowEmpty: true,
        locale: "cs"
    });
}

function downloadFile(data) {
    const a = document.createElement('a');
    a.style.display = 'none';
    a.href = data.url;
    a.download = data.name;
    document.body.appendChild(a);
    a.click();
    window.URL.revokeObjectURL(data.url);
}

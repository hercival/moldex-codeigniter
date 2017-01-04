$(document).ready(function(){
    $(document).on('click', '.delete-content', function(e){ 
        var $this = $(this);
        var table = $(this).closest('table').attr('data-tbname');
        if(!table){
            var table = $this.closest('.sortable-ol').attr('data-tbname');
        }

        confirmM("Confirm Delete", "Are you sure you want to delete this content?", function(){
            $.post( get_base_url()+"administrator/delete_content", { table: table, slug: $this.attr('rel'), ajax : 1 }, function( data ) {
              if(data){ console.log(data);
                if($this.closest('tr').length > 0){
                    $this.closest('tr').remove();
                } else {
                    $this.closest('li').remove();
                }
              }
            });
        });

        e.preventDefault();
        return false;
    });

    //Delete Confirmation
    $("a.delete-link").click(function(e){
        if(!confirm('Are you sure you want to delete this item?', function(){})){
            e.preventDefault();
            return false;
        }
        return true;
    });

    //App.init();
    if($('.colorselector').length > 0){
        $('.colorselector').colorselector({
            callback: function(value, color, title){
                var border_color = value;
                $('#btn-preview').css('background-color', color);
                if($('#btn-text').val() != ''){
                    $('#btn-preview').html($('#btn-text').val());
                }
                $('#btn-bgcolor').val(color);

                $('#btn-preview').css('border-color', border_color);
                $('#btn-border-color').val(border_color);
            }
        });
    }



    $('#btn-text').keyup(function(){
        var text = $('#btn-text').val();

        if(text == ''){
            $('#btn-preview').html('Preview');
        } else {
             $('#btn-preview').html(text);
        }
       
    });

    

    /*change color of highlighted text*/
    function init_color_select(){
        var selection = "";
        var area = "";
        $('.editable-div').on('blur', function(){
           selection = getSelectionHtml(); 
           area = $(this);
        });

        if($('.color-input').length > 0){
            $('.color-input').colorselector({
                callback: function(value, color, title){
                    area.html(function(){
                        var newContent = '<span class="'+title+'">'+selection+'</span>';
                        return this.innerHTML.replace(selection, newContent);
                    });
                }
            });
        }

        // $('#add-block-btn').click(function(){
        //     $('#title-textarea').html($('#title').html());
        // });

        $('.editable-div').bind('DOMSubtreeModified', function(){
            $(this).siblings('textarea').html($(this).html());
        });
    }
    init_color_select();

    function getSelectionHtml() {
        var html = "";
        if (typeof window.getSelection != "undefined") {
            var sel = window.getSelection();
            if (sel.rangeCount) {
                var container = document.createElement("div");
                for (var i = 0, len = sel.rangeCount; i < len; ++i) {
                    container.appendChild(sel.getRangeAt(i).cloneContents());
                }
                html = container.innerHTML;
            }
        } else if (typeof document.selection != "undefined") {
            if (document.selection.type == "Text") {
                html = document.selection.createRange().htmlText;
            } 
        }
        console.log(html);
        return html;
    }
    /*end change colors highlighted*/

    $('.save-desc').click(function(){
        var editable = $(this).parent().parent().find('.editable');
        var desc = editable.val();
        var slug = editable.attr('id'); 
        var title = $(this).parent().parent().find('.editable-title').html();
        var jap_subtitle = $(this).parent().siblings().find('#jap-subtitle').val();
        $.post( get_base_url()+"administrator/save_description", { description: desc, slug: slug, title: title, jap_subtitle: jap_subtitle }, function( data ) {
          if(data){ console.log(data);
            show_gritter("Saved", "Content Description is saved.");
          }
        });
    });

    function show_gritter(title, text){
        setTimeout(function () {
                var unique_id = $.gritter.add({
                    title: title,
                    text: text,
                    sticky: true
                });

                // You can have it return a unique id, this can be used to manually remove it later using
                setTimeout(function () {
                    $.gritter.remove(unique_id, {
                        fade: true,
                        speed: 'slow'
                    });
                }, 12000);
            }, 1500);
    }


    //start ordering
    /*start reordering of blocks*/
    if($('#blocks-tbl').length > 0){
        $('#blocks-tbl').rowReordering();

        $('.save-ordering').on('click', function(){
            save_ordering();
        });
    }
    /*end reordering of blocks*/

    /*start reordering of product categories*/
    if($('.reordering-tbl').length > 0){
        $('.reordering-tbl').rowReordering();

        $('.save-ordering').on('click', function(){
            save_tbl_ordering($('.reordering-tbl').attr('data-tbname'));
        });
    }
    /*end reordering of product categories*/


    /*start sortable ol*/
    var ns = $('ol.sortable').nestedSortable({
        forcePlaceholderSize: true,
        handle: 'div',
        helper: 'clone',
        items: 'li',
        opacity: .6,
        placeholder: 'placeholder',
        revert: 250,
        tabSize: 25,
        tolerance: 'pointer',
        maxLevels: 3,
      //isTree: true,
        expandOnHover: 700,
        startCollapsed: false,
        change: function(){
            console.log('Relocated item');
        }
    });

    if($('.save-sorting').length > 0){
        $('.save-sorting').click(function(e){
            var items = [];

            $('.sortable-ol').children().each(function(){
                var id_parent = $(this).attr('id');

                items.push({id:id_parent, parent_id: 0, level: 1});
                
                //2nd level
                if($(this).children('ol').length > 0){
                    $(this).children('ol').children('li').each(function(){ 
                        var id_child = $(this).attr('id');
                        items.push({id:id_child, parent_id: id_parent, level: 2});

                        //3rd level
                        if($(this).children('ol').length > 0){
                            $(this).children('ol').children('li').each(function(){
                                var id_child2 = $(this).attr('id');
                                var id_parent_child2 = id_child;
                                items.push({id:id_child2, parent_id: id_parent_child2, level: 3});
                            });
                            
                        }
                    });
                }
            });

            var items = JSON.stringify(items);
            $.post( get_base_url()+"administrator/reorder_with_subs", { items: items, table: $('.sortable-ol').attr('data-tbname') }, function( data ) {
                if(data){
                    show_gritter("Saved", "New ordering is saved.");
                    $('.modal').modal('hide');
                }
            });
        });
    }
    /*end sortable ol*/

    function get_tbl_rows(){
        var row_ids = '';   
        $('#blocks-tbl > tbody  > tr').each(function() {
            if($(this).attr('id') === undefined){} else {
                row_ids += $(this).attr('id')+',';
            }
        });

        return row_ids;
    }

    function save_ordering(){
        var blocks = get_tbl_rows();

        var page_slug = $('#blocks-tbl').attr('data-page');

        $('#waitmodal').modal('show');

        $.post( get_base_url()+"administrator/reorder_blocks", { blocks: blocks, page_slug: page_slug }, function( data ) {
          if(data){
            show_gritter("Saved", "New ordering is saved.");
            $('.modal').modal('hide');
          }
        });
    }

    function save_tbl_ordering(table){
        var items = '';   
        $('.reordering-tbl > tbody  > tr').each(function() {
            if($(this).attr('id') === undefined){} else {
                items += $(this).attr('id')+',';
            }
        });
        console.log(items);

        $('#waitmodal').modal('show');

        $.post( get_base_url()+"administrator/reorder_items", { items: items, table: table }, function( data ) {
          if(data){ console.log(data);
            show_gritter("Saved", "New ordering is saved.");
            $('.modal').modal('hide');
          }
        });
    }
    // end ordering
    

    if($('#add-block').length > 0){
        $('#add-block').click(function(e){
            var block_id = $('#blocks-select').val();
            var page_slug = $(this).attr('data-slug');

            if(block_id){
                $('#waitmodal').modal('show');
                $.post( get_base_url()+"administrator/blocks_management/"+page_slug, { block_id: block_id, page_slug: page_slug }, function( data ) {
                  if(data){
                    show_gritter("Saved", "Block is added to page.");
                    $('.modal').modal('hide');

                    var i = parseInt($('#blocks-tbl tr:last td:first').html(), 10) + 1;
                    var trclass = i % 2 == 0 ? 'even' : 'odd';

                    var result = $.parseJSON(data)[0];
                    var html = '<tr id="'+result.id+'" role="row" class="'+trclass+'" style="display: table-row;">'+
                                '<td class="sorting_1 sorting_2">'+i+'</td>'+
                                '<td>'+result.title+'</td>'+
                                '<td>'+result.jap_subtitle+'</td>'+
                                '<td>'+result.description+'</td>'+
                                '<td>'+result.slug+'</td>'+
                                '<td>'+result.date_created+'</td>'+
                                '<td></td>'+
                            '</tr>';
                    $('#blocks-tbl tbody').append(html);

                    location.reload();
                  }
                });
            }
            
            e.preventDefault();   
        });
    }

    $('.remove-page-block').click(function(e){
        var $this = $(this);
        confirmM("Remove Block Confirmation", "Are you sure you want to remove this block from the page?", function(){

            $this.closest('tr').remove();

            save_ordering();
        });

        e.preventDefault();
    });


    // add product category add more blocks
    var group_prod_blocks = $('.group-prod-blocks');
    var i = $('.block-rows').size() + 1;

    $('.add-more-blocks').on('click', function(){
        var html = $('<div class="block-rows col-md-5 m-l-40">'+
                        '<div class="form-group">'+
                            '<label class="control-label" for="title">Title</label>'+
                            '<div class="">'+
                                '<div contenteditable="true" class="form-control editable-div width-md(450px)"></div>'+
                                '<textarea id="title-define-textarea" rows="1" class="hidden" name="blocks['+i+'][title]">'+
                                '</textarea>'+
                                '<select class="color-input" >'+
                                    '<option value="#ED1C24" data-color="#ED1C24" selected="selected">red</option>'+
                                    '<option value="#000000" data-color="#000000">black</option>'+
                                    '<option value="#ffffff" data-color="#ffffff">automatic</option>'+
                                '</select>'+ 
                                '<span class="help-block" >Highlight the text then pick the color to change it. Default is white.</span>'+
                            '</div>'+
                        '</div>'+
                        '<div class="form-group">'+
                            '<label class="control-label col-md-3">Description</label>'+
                            '<div class="">'+
                                '<textarea class="form-control" placeholder="Enter description" rows="5" name="blocks['+i+'][description]"></textarea>'+
                            '</div>'+
                        '</div>'+
                    '</div>').appendTo(group_prod_blocks);

        i++;
        init_color_select();
        return false;
    });
    // end add product category add more blocks
    


    /*add page. copy paste muna tayo ngaun. fix this*/
    $('#add-page').on('click', function(e){
        var title = $('#title').val();

        if(title){
            $.post( get_base_url()+"administrator/pages", { title: title, ajax : 1 }, function( data ) { 
              if(data){
                var row = '<li id="'+data.pid+'"><div>'+data.title+
                                    '<a href="#!" class="btn btn-xs btn-icon btn-circle btn-danger pull-right delete-content" title="Delete" rel="'+data.slug+'"><i class="fa fa-times"></i></a>'+
                                '</div></li>';
                $('.sortable-ol#pages').append(row);
              }
            }, "json");
            $('#help-title').html('New page has been successfully saved.');
            $('#title').val('');
        } else {
            modalView('', 'Error', 'Title field is required.');
        }
        

        e.preventDefault();
    });
    
    $('#add-other-page').on('click', function(e){
        var title = $('#title').val();

        if(title){
            $.post( get_base_url()+"administrator/other_pages", { title: title, ajax : 1 }, function( data ) { 
              if(data){
                var row = '<tr>'+
                                    '<td>'+data.pid+'</td>'+
                                    '<td>'+data.title+'</td>'+
                                    '<td>'+data.slug+'</td>'+
                                    '<td>'+
                                        '<a href="" class="btn btn-xs btn-icon btn-circle btn-danger delete-content" title="Delete" rel="'+data.slug+'"><i class="fa fa-times"></i></a>'+
                                    '</td>'+
                                '</tr>';
                $('#pages tbody').append(row);
              }
            }, "json");
            $('#help-title').html('New page has been successfully saved.');
            $('#title').val('');
        } else {
            modalView('', 'Error', 'Title field is required.');
        }
        

        e.preventDefault();
    });
    /*end add page.*/

    $('.make-featured').click(function(e){
        var page_slug = $(this).attr('data-slug');
        var table = $(this).closest('table').attr('data-tbname');
        var $this = $(this);

        $.post( get_base_url()+"administrator/mark_featured", { table: table, slug : page_slug }, function( data ) { 
              if(data == 1){
                $('.make-featured').switchClass('btn-success', 'btn-primary');
                $this.switchClass('btn-primary', 'btn-success');
                show_gritter("Success", "Your product has been successfully marked as Featured Product.");
              } else {
                modalView('modal-featured', 'Error', data.message);
              }
            }, "json");
        e.preventDefault();
    });


    /*photo uploading scripts*/
    /*if($("input:file#img-select-f").length > 0){
        $("input:file#img-select-f").change(function(){
            Upload.doUpload('.featured-image-form', {hidden_input_name:'f_image', msg_container:'.upload-messages-f', uploaded_container:'#f-img-container' });
        });
    }
    if($("input:file#img-select-thumb").length > 0){
        $("input:file#img-select-thumb").change(function(){
            Upload.doUpload('.thumb-form', {hidden_input_name:'thumb', msg_container:'.upload-messages', uploaded_container:'#upload-container', });
        });
    }
    if($("input:file#img-select-bg").length > 0){
        $("input:file#img-select-bg").change(function(){
            Upload.doUpload('.bg-image-form', {hidden_input_name:'bg_image', msg_container:'.upload-messages-bg', uploaded_container:'#bg-img-container'});
        });
    }*/

    if($("input:file#img-select").length > 0){
        $("input:file#img-select").change(function(){
            Upload.doUpload('.image-form', {msg_container:'.upload-messages', uploaded_container:'#img-container'});
        });
    }
    /*end photo uploading scripts*/


//    if($("#catering-menu-form .ckeditor").length > 0){
//        for(name in CKEDITOR.instances){
//            CKEDITOR.instances[name].destroy(true);
//        }
//
//        CKEDITOR.replace(document.getElementById("editor1"), { customConfig: 'customConfig.js' });
//        CKEDITOR.replace(document.getElementById("editor2"), { customConfig: 'customConfig.js' });
//        CKEDITOR.replace(document.getElementById("editor3"), { customConfig: 'customConfig.js' });
//        CKEDITOR.replace(document.getElementById("editor4"), { customConfig: 'customConfig.js' });
//        CKEDITOR.replace(document.getElementById("editor5"), { customConfig: 'customConfig.js' });
//
//        // CKEDITOR.replace(document.getElementById("title-editable"), { customConfig: 'customConfigTitle.js' });
//        // CKEDITOR.replace(document.getElementById("title-define-textarea"), { customConfig: 'customConfigTitle.js' });
//    }



    //remove photo
    $('.form-group').on('click', '.remove-photo', function(){ 
        var fieldname = $(this).attr('data-fieldname');
        $(this).parent().html('');
        $('input[name*="'+fieldname+'"]').val('');
    });


    $('.prod-filter').change(function(){
        location.href = get_base_url()+'administrator/products/'+$(this).val();
    });

    $('.catering-filter').change(function(){
        location.href = get_base_url()+'administrator/catering_menu/'+$(this).val();
    });

});

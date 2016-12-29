$(function(){

    function initBackgrid(){
        Backgrid.InputCellEditor.prototype.attributes.class = 'form-control input-sm';

        var Territory = Backbone.Model.extend({});

        var PageableTerritories = Backbone.PageableCollection.extend({
            model: Territory,
            url: "js/json/pageable-territories.json",
            state: {
                pageSize: 9
            },
            mode: "client" // page entirely on the client side
        });


        var pageableTerritories = new PageableTerritories(),
            initialTerritories = pageableTerritories;
        function createBackgrid(collection){
            var columns = [{
                name: "id", // The key of the model attribute
                label: "ID", // The name to display in the header
                editable: false, // By default every cell in a column is editable, but *ID* shouldn't be
                // Defines a cell type, and ID is displayed as an integer without the ',' separating 1000s.
                cell: Backgrid.IntegerCell.extend({
                    orderSeparator: ''
                })
            }, {
                name: "name",
                label: "Name",
                // The cell type can be a reference of a Backgrid.Cell subclass, any Backgrid.Cell subclass instances like *id* above, or a string
                cell: "string" // This is converted to "StringCell" and a corresponding class in the Backgrid package namespace is looked up
            }, {
                name: "pop",
                label: "Population",
                cell: "integer" // An integer cell is a number cell that displays humanized integers
            }, {
                name: "url",
                label: "URL",
                cell: "uri" // Renders the value in an HTML <a> element
            }];
            if (LightBlue.isScreen('xs')){
                columns.splice(3,1)
            }
            var pageableGrid = new Backgrid.Grid({
                columns: columns,
                collection: collection,
                className: 'table table-striped table-editable no-margin mb-sm'
            });

            var paginator = new Backgrid.Extension.Paginator({

                slideScale: 0.25, // Default is 0.5

                // Whether sorting should go back to the first page
                goBackFirstOnSort: false, // Default is true

                collection: collection,

                controls: {
                    rewind: {
                        label: '<i class="fa fa-angle-double-left fa-lg"></i>',
                        title: "Primero"
                    },
                    back: {
                        label: '<i class="fa fa-angle-left fa-lg"></i>',
                        title: "Anterior"
                    },
                    forward: {
                        label: '<i class="fa fa-angle-right fa-lg"></i>',
                        title: "Siguiente"
                    },
                    fastForward: {
                        label: '<i class="fa fa-angle-double-right fa-lg"></i>',
                        title: "Último"
                    }
                }
            });

            $("#table-dynamic").html('').append(pageableGrid.render().$el).append(paginator.render().$el);
        }

        PjaxApp.onResize(function(){
            createBackgrid(pageableTerritories);
        });

        createBackgrid(pageableTerritories);

        $("#search-countries").keyup(function(){

            var $that = $(this),
                filteredCollection = initialTerritories.fullCollection.filter(function(el){
                    return ~el.get('name').toUpperCase().indexOf($that.val().toUpperCase());
                });
            createBackgrid(new PageableTerritories(filteredCollection, {
                state: {
                    firstPage: 1,
                    currentPage: 1
                }
            }));
        });


        pageableTerritories.fetch();

    }
    function initDataTables(){
        /* Set the defaults for DataTables initialisation */
        $.extend( true, $.fn.dataTable.defaults, {
            "sDom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
            "sPaginationType": "bootstrap",
			"searching": false,
			"select": true,
			"pageLength": 5,
            "oLanguage": {
                "sLengthMenu": "_MENU_ records per page"
            }
        } );


        /* Default class modification */
        $.extend( $.fn.dataTableExt.oStdClasses, {
            "sWrapper": "dataTables_wrapper form-inline"
        } );


        /* API method to get paging information */
        $.fn.dataTableExt.oApi.fnPagingInfo = function ( oSettings )
        {
            return {
                "iStart":         oSettings._iDisplayStart,
                "iEnd":           oSettings.fnDisplayEnd(),
                "iLength":        oSettings._iDisplayLength,
                "iTotal":         oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage":          oSettings._iDisplayLength === -1 ?
                    0 : Math.ceil( oSettings._iDisplayStart / oSettings._iDisplayLength ),
                "iTotalPages":    oSettings._iDisplayLength === -1 ?
                    0 : Math.ceil( oSettings.fnRecordsDisplay() / oSettings._iDisplayLength )
            };
        };


        /* Bootstrap style pagination control */
        $.extend( $.fn.dataTableExt.oPagination, {
            "bootstrap": {
                "fnInit": function( oSettings, nPaging, fnDraw ) {
                    var oLang = oSettings.oLanguage.oPaginate;
                    var fnClickHandler = function ( e ) {
                        e.preventDefault();
                        if ( oSettings.oApi._fnPageChange(oSettings, e.data.action) ) {
                            fnDraw( oSettings );
                        }
                    };

                    $(nPaging).append(
                        '<ul class="pagination no-margin">'+
                        '<li class="prev disabled"><a href="#">Anterior</a></li>'+
                        '<li class="next disabled"><a href="#">Siguiente</a></li>'+
                        '</ul>'
                    );
                    var els = $('a', nPaging);
                    $(els[0]).bind( 'click.DT', { action: "previous" }, fnClickHandler );
                    $(els[1]).bind( 'click.DT', { action: "next" }, fnClickHandler );
                },

                "fnUpdate": function ( oSettings, fnDraw ) {
                    var iListLength = 5;
                    var oPaging = oSettings.oInstance.fnPagingInfo();
                    var an = oSettings.aanFeatures.p;
                    var i, ien, j, sClass, iStart, iEnd, iHalf=Math.floor(iListLength/2);

                    if ( oPaging.iTotalPages < iListLength) {
                        iStart = 1;
                        iEnd = oPaging.iTotalPages;
                    }
                    else if ( oPaging.iPage <= iHalf ) {
                        iStart = 1;
                        iEnd = iListLength;
                    } else if ( oPaging.iPage >= (oPaging.iTotalPages-iHalf) ) {
                        iStart = oPaging.iTotalPages - iListLength + 1;
                        iEnd = oPaging.iTotalPages;
                    } else {
                        iStart = oPaging.iPage - iHalf + 1;
                        iEnd = iStart + iListLength - 1;
                    }

                    for ( i=0, ien=an.length ; i<ien ; i++ ) {
                        // Remove the middle elements
                        $('li:gt(0)', an[i]).filter(':not(:last)').remove();

                        // Add the new list items and their event handlers
                        for ( j=iStart ; j<=iEnd ; j++ ) {
                            sClass = (j==oPaging.iPage+1) ? 'class="active"' : '';
                            $('<li '+sClass+'><a href="#">'+j+'</a></li>')
                                .insertBefore( $('li:last', an[i])[0] )
                                .bind('click', function (e) {
                                    e.preventDefault();
                                    oSettings._iDisplayStart = (parseInt($('a', this).text(),10)-1) * oPaging.iLength;
                                    fnDraw( oSettings );
                                } );
                        }

                        // Add / remove disabled classes from the static elements
                        if ( oPaging.iPage === 0 ) {
                            $('li:first', an[i]).addClass('disabled');
                        } else {
                            $('li:first', an[i]).removeClass('disabled');
                        }

                        if ( oPaging.iPage === oPaging.iTotalPages-1 || oPaging.iTotalPages === 0 ) {
                            $('li:last', an[i]).addClass('disabled');
                        } else {
                            $('li:last', an[i]).removeClass('disabled');
                        }
                    }
                }
            }
        } );

        var unsortableColumns = [];
        $('#busq_personas').find('thead th').each(function(){
            if ($(this).hasClass( 'no-sort')){
                unsortableColumns.push({"bSortable": false});
            } else {
                unsortableColumns.push(null);
            }
        });

        var table = $("#busq_personas").dataTable({
            "sDom": "<'row'<'col-md-6 hidden-xs'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
            "oLanguage": {
                "sLengthMenu": "_MENU_",
                "sInfo": "Mostrando <strong>_START_ al _END_</strong> de _TOTAL_ registros"
            },
            "oClasses": {
                "sFilter": "pull-right",
                "sFilterInput": "form-control ml-sm"
            },
            "aoColumns": unsortableColumns
        });

        $(".dataTables_length select").selectpicker({
            width: 'auto'
        });
		
		$('#busq_personas tbody').on( 'click', 'tr', function () {
			if ( $(this).hasClass('selected') ) {
				$(this).removeClass('selected');
			}
			else {
				table.$('tr.selected').removeClass('selected');
				$(this).addClass('selected');
			}
		} );
		
		$('#busq_personas tbody').on( 'dblclick', 'tr', function () {
			var celda0 = $(this).children().eq(0);
			var celda1 = $(this).children().eq(1);
			var celda2 = $(this).children().eq(2);
			var celda3 = $(this).children().eq(3);
			var celda4 = $(this).children().eq(4);
			var celda5 = $(this).children().eq(5);
			
			$('#document_type').val($(celda0).text()).change();
			$('#num_identificacion').val($(celda1).text());
			$('#id_persona').val($(celda2).text());
			$('#nombres_completos_persona').val($(celda3).text()+' '+$(celda4).text());
			
			$('#estado_persona').removeClass('label label-success');
			$('#estado_persona').removeClass('label label-danger');
			$('#estado_persona').text($(celda5).text());
			
			if ($(celda5).text()=="ACTIVO")
			{	$('#estado_persona').addClass('label label-success');
				$('#GuardarContrato').prop('disabled',false);
			}
			else
			{	$('#estado_persona').addClass('label label-danger');
				$('#GuardarContrato').prop('disabled',true);
			}
			
			$("#modalBusquedaPersona").modal('toggle');
		} );
    }
	
	$('#modalBusquedaPersona').on('hide.bs.modal', function () {
		$("#modalContrato").css("overflow-y", "auto"); // 'auto' or 'scroll'
	});
	
    function pageLoad(){
        $('.widget').widgster();
        initBackgrid();
        initDataTables();
    }

    pageLoad();
    PjaxApp.onPageLoad(pageLoad);

});
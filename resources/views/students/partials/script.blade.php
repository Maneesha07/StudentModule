function () {
    this.api().columns().every( function (index) {
        var column = this;
        var columns = this.settings().init().columns;
        console.log(columns);
        $(column.header()).append('<div class="sortMask"></div>')
        switch(columns[index].name){
            case 'gender':
            var select = $('<select class="select' + columns[index].search + '"><option value="">All</option></select>')
                .appendTo( $(column.header()) )
                .on( 'change', function () {
                    var val = $.fn.dataTable.util.escapeRegex(
                        $(this).val()
                    );

                    column.search( val ? '^'+val+'$' : '', true, false ).draw();
                });

                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                });
                select.select2();
            break;
            case 'name':
            var text = $('<input type="text">')
                .appendTo( $(column.header()) )
                .on('keyup', function () {
                    let $this = this;
                    clearTimeout($.data(this, 'timer'));
                    $(this).data('timer', setTimeout(function(){
                        column.search($($this).val(), false, false, true).draw()
                    }, 500));
                    ;
                });
            break;
        }
    });
}
function () {
    this.api().columns().every( function (index) {
        var column = this;
        var columns = this.settings().init().columns;
        $(column.header()).append('<div class="sortMask"></div>')
        switch(columns[index].name){
            case 'student_id':
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

            case 'created_at':
            var text = $('<input type="date">')
                .appendTo($(column.header()))
                .on('change', function () {
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
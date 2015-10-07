$(function () {
    var alleditable = function() {
        $('.blog-post-title, .blog-post-created').editable(config.baseurl + 'home/update', {
            id: $(this).attr('id'),
            indicator: "<img src=' " + config.baseurl + "img/indicator.gif'>",
            tooltip: "Click to edit...",
            style: "inherit",
            height: 50
        });
        $('.blog-post-content').editable(config.baseurl + 'home/update', {
            id: $(this).attr('id'),
            indicator: "<img src=' " + config.baseurl + "img/indicator.gif'>",
            tooltip: "Click to edit...",
            type: 'textarea',
            height: 200,
            submit: 'OK'
        });
    }
    alleditable();

    // modal
    $("#add-new").click(function () {
        $("#myModal").modal('show');
        $('#datetimepicker1').datetimepicker({
            format: 'MM/DD/YYYY'
        });
        // @todo validate form
        // @todo validate responce
        $("#add-new-save").click(function () {
            $.ajax({
                type: "POST",
                url: config.baseurl + 'home/add',
                data: $('form[name="add-new-modal-form"]').serialize(),
            }).done(function () {
                $('form[name="add-new-modal-form"]').trigger('reset');
                $("#myModal").modal('hide');
            });
        });
    });
    
    // blog pager
    $("#blog-more").click(function () {
        $.ajax({
            type: "GET",
            url: config.baseurl + 'home/next',
            data: $(this).data('pager'),
            dataType: "json"
        }).done(function (data) {
            $("#blog-more").data('pager', 'p='+data.id_post+'&n='+data.next);
            $("#blog-post-template").tmpl(data).appendTo("#blog-post-next");
            alleditable();
            if(!data.next){
                $("#blog-more").hide();
            }
        });
    });

});

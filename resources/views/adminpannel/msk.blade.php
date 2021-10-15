@extends('adminpannel.index')
@section('key')
    <div style="margin-top: 20px" class="col-md-5">
        <table class="table table-bordered text-center">
            <thead>
            <td>#</td>
            <td>Mətbəx</td>
            <td><button class="btn btn-success"><i class="fa fa-plus"></i></button></td>
            </thead>
            <tbody>
            <tr id="">
                <td></td>
                <td></td>
                <td>
                    <button class="btn btn-primary edit"><i class="fa fa-pencil-square-o"></i></button>
                    <button class="btn btn-danger delete"><i class="fa fa-trash-o"></i></button>
                </td>
            </tr>
            </tbody>
        </table>
        <nav aria-label="...">
            <ul class="pagination">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>

    <script>
        $(document).ready(function (){
            LoadTable(1)
            sirala()
        })
        function LoadTable(page) {
            let start = (page - 1) * 10;
            let end = (page - 1) * 10 + 10;
            $('tbody').html('')

            $.ajax({
                url:'http://localhost:8000/prods',
                type:'get',
                success:function(resp){
                    for (let i = start; i < resp.length && i<end; i++) {
                        $('tbody').append(`
                <tr>
                    <td>${i+1}</td>
                    <td>${resp[i].kitchen_name}</td>
                    <td><button class="btn btn-primary edit"><i class="fa fa-pencil-square-o"></i></button>
                         <button class="btn btn-danger delete"><i class="fa fa-trash-o"></i></button>
                         </td>
                </tr>
            `)
                    }
                    paginate(page)
                }
            })
        }

        function paginate(page) {
            var say = Math.ceil({{$len}}/ 10 + 1);
            $('.pagination').html('');
            $('.pagination').append(`
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
            `)
            for (var j = 1; j < say; j++) {
                if (j == page) {
                    $('.pagination').append('<li class="page-item active"><a class="page-link" href="#">' + j + '</a></li>');
                } else {
                    $('.pagination').append('<li class="page-item"><a class="page-link" href="#">' + j + '</a></li>');
                }
            }
            $('.pagination').append(`
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
            `)
        }

        $('.pagination').on('click', '.page-item', function() {
            var clicked = $(this).find('.page-link').text().trim();
            var pages = $('.active').find('.page-link').text().trim();
            var last = Math.ceil({{$len}}/ 10);


            if (clicked == 'Previous') {
                if (pages == 1) {
                    return false;
                } else {
                    pages = parseInt(pages) - 1;
                    console.log(pages)
                    LoadTable(pages)
                }
            } else if (clicked == 'Next') {
                if (pages == last) {
                    return false;
                } else {
                    pages = parseInt(pages) + 1;
                    LoadTable(pages)
                }

            } else {
                LoadTable(clicked)
            }
        })

        $('thead').on('click','.btn-success',function (){
            $('tbody').prepend(`
                <tr>
                    <td></td>
                    <td><input type="text" class="form-control newkitchen"></td>
                    <td>
                        <button class="btn btn-success save"><i class="fa fa-save"></i></button>
                        <button class="btn btn-warning cres"><i class="fa fa-times"></i></button>
                    </td>
                </tr>
            `)
            sirala()
        })

        $('tbody').on('click','.save',function (){
            var text=$('.newkitchen').val().trim();
            if(text.length<2 || text==''){
                alert('Ne ise yazin ')
                return false
            }
            else{
                $.ajax({
                    url:'addkitchen',
                    type:'POST',
                    data:{
                        'kitchenname':text,
                        "_token":"{{csrf_token()}}"
                    },
                    success:function (response){
                        console.log(response.message)
                        if(response.status=='success'){
                            $('tbody').append(`
                                                <tr>
                                                    <td></td>
                                                    <td>`+text+`</td>
                                                    <td>
                                                        <button class="btn btn-primary edit"><i class="fa fa-pencil-square-o"></i></button>
                                                        <button class="btn btn-danger delete"><i class="fa fa-trash-o"></i></button>
                                                    </td>
                                                </tr>
                                            `)
                            sira()
                        }
                    }
                })
            }
            sirala()
        })

        function sirala(){
            var i=1;
            $('tbody tr').each(function (){
                $(this).find('td:eq(0)').text(i++);
            })
        }
        function sira(){
            var i=0;
            $('tbody tr').each(function (){
                $(this).find('td:eq(0)').text(i++);
            })
        }

        $('tbody').on('click','.cres',function (){
            $(this).closest('tr').remove();
            sirala()
        })

        $('tbody').on('click','.edit',function (){
            var tr=$(this).parents('tr');
            var text=tr.find('td:eq(1)').text().trim();

            tr.find('td:eq(1)').attr('oldvalue',text)
            tr.find('td:eq(1)').html('<input class="form-control newkitchen" type="text" value="'+text+'">')
            tr.find('td:eq(2)').html(`
                                        <button class="btn btn-success update"><i class="fa fa-save"></i></button>
                                        <button class="btn btn-warning disable"><i class="fa fa-times"></i></button>
                                    `);
            $('tbody').on('click','.disable',function (){
                var tr=$(this).closest('tr');
                tr.find('td:eq(1)').html(text);
                tr.find('td:eq(2)').html(`
                    <button class="btn btn-primary edit"><i class="fa fa-pencil-square-o"></i></button>
                    <button class="btn btn-danger delete"><i class="fa fa-trash-o"></i></button>
                `)
            })
        })

        $('tbody').on('click','.update',function (){
            var tr=$(this).parents('tr');
            var text=$('.newkitchen').val().trim();
            var id=tr.attr('id');

                if(text=='' || text.length<2){
                    alert('Verilenleri duzgun daxil edin');
                    return false
                }
                else{
                    $.ajax({
                        url:'updatekitchen',
                        type:'POST',
                        data:{
                            'kitchen':text,
                            'id':id,
                            "_token":"{{csrf_token()}}"
                        },
                        success:function (response){
                            console.log(response)
                            if(response.status=='success'){
                                tr.find('td:eq(1)').html(text);
                                tr.find('td:eq(2)').html(`
                                    <button class="btn btn-primary edit"><i class="fa fa-pencil-square-o"></i></button>
                                    <button class="btn btn-danger delete"><i class="fa fa-trash-o"></i></button>
                                `);
                            }
                        }
                    })
                }
        })

        $('tbody').on('click','.delete',function (){
            var tr=$(this).closest('tr');
            var id=tr.attr('id');
            $.ajax({
                url:'kitchendelete',
                type:'POST',
                data:{
                    'id':id,
                    "_token":"{{csrf_token()}}"
                },
                success:function (response){
                    console.log(response)
                    if(response.status=='success'){
                        tr.remove();
                    }
                    sirala()
                }
            })
        })
        $('.active').removeClass('active');
        $('.msks_page').addClass('active');
    </script>
@endsection

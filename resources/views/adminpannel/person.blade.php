@extends('adminpannel.index')
@section('key')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>

    <div style="position: relative;top: 25px">
        <h3 style="margin-left: 250px">İşçilər cədvəli</h3>
        <div class="col-md-10">
            <table class="table table-bordered text-center" id="myTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Ad</th>
                    <th>Soy ad</th>
                    <th>Email</th>
                    <th>Redaktə</th>
                </tr>
                </thead>
                <tbody>
                @foreach($people as $val)
                    <tr id="{{$val->id}}">
                        <td></td>
                        <td>{{$val->person_name}}</td>
                        <td>{{$val->person_surname}}</td>
                        <td>{{$val->person_email}}</td>
                        <td>
                            <button class="btn btn-primary edit"><i class="fa fa-pencil-square-o"></i></button>
                            <button class="btn btn-danger delete"><i class="fa fa-trash-o"></i></button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <script>
        $(document).ready(function (){
            sirala()
        })
        function sirala(){
            var i=1;
            $('tbody tr').each(function (){
                $(this).find('td:eq(0)').text(i++);
            })
        }

        $('tbody').on('click','.edit',function (){
            var tr=$(this).parents('tr');
            var name=tr.find('td:eq(1)').text().trim();
            var surname=tr.find('td:eq(2)').text().trim();
            var email=tr.find('td:eq(3)').text().trim();

            tr.find('td:eq(1)').attr('oldvalue1',name)
            tr.find('td:eq(2)').attr('oldvalue2',surname)
            tr.find('td:eq(3)').attr('oldvalue3',email)
            tr.find('td:eq(1)').html('<input class="form-control name" type="text" value="'+name+'">')
            tr.find('td:eq(2)').html('<input class="form-control surname" type="text" value="'+surname+'">')
            tr.find('td:eq(3)').html('<input class="form-control email" type="text" value="'+email+'">')
            tr.find('td:eq(4)').html(`
                                        <button class="btn btn-success update"><i class="fa fa-save"></i></button>
                                        <button class="btn btn-warning disable"><i class="fa fa-times"></i></button>
                                    `);

            $('tbody').on('click','.disable',function (){
                var tr=$(this).closest('tr');
                tr.find('td:eq(1)').html(name);
                tr.find('td:eq(2)').html(surname);
                tr.find('td:eq(3)').html(email);
                tr.find('td:eq(4)').html(`
                    <button class="btn btn-primary edit"><i class="fa fa-pencil-square-o"></i></button>
                    <button class="btn btn-danger delete"><i class="fa fa-trash-o"></i></button>
                `)
            })
        })

        $('tbody').on('click','.update',function (){
            var tr=$(this).parents('tr');
            var name=$('.name').val().trim();
            var surname=$('.surname').val().trim();
            var email=$('.email').val().trim();
            var id=tr.attr('id');

            if(name=='' || surname=='' || email=='' ||name.length<2 || surname.length<2 || email.length<10){
                alert('Verilenleri duzgun daxil edin');
                return false
            }
            else{
                $.ajax({
                    url:'/updateperson',
                    type:'POST',
                    data:{
                        'name':name,
                        'email':email,
                        'surname':surname,
                        'id':id,
                        "_token":"{{csrf_token()}}"
                    },
                    success:function (response){
                        alert(response.message)
                        if(response.status=='success'){
                            $('tbody').append(`
                                                <tr>
                                                    <td></td>
                                                    <td>`+name+`</td>
                                                    <td>`+surname+`</td>
                                                    <td>`+email+`</td>
                                                    <td>
                                                        <button class="btn btn-primary edit"><i class="fa fa-pencil-square-o"></i></button>
                                                        <button class="btn btn-danger delete"><i class="fa fa-trash-o"></i></button>
                                                    </td>
                                                </tr>
                                            `);
                            tr.remove();
                        }
                        sirala()
                    }
                })
            }
        })

        $('tbody').on('click','.delete',function (){
            var tr=$(this).closest('tr');
            var id=tr.attr('id');
            $.ajax({
                url:'persondelete',
                type:'POST',
                data:{
                    'id':id,
                    "_token":"{{csrf_token()}}"
                },
                success:function (response){
                    console.log(response.message)
                    if(response.status=='success'){
                        tr.remove();
                    }
                    sirala()
                }
            })
        })
    </script>


    <div>
        <button style="float: right;margin-top: 15px;margin-right: 15px;font-size: 15px" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
            <i class="fa fa-plus"></i> İşçi əlave et
        </button>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="width: 300px">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Yeni məhsul daxil edin</h4>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control name" placeholder="Ad">

                    <input type="text" class="form-control surname" placeholder="Soy ad">

                    <input type="text" class="form-control age" placeholder="Yaş">

                    <input type="text" class="form-control number" placeholder="Nömrə">

                    <input type="email" class="form-control email" placeholder="Email">

                    <input type="text" class="form-control address" placeholder="Ünvan">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success addperson" data-dismiss="modal">Əlavə et</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Bağla</button>
                </div>
            </div>

        </div>
    </div>

    <script>
        $('.addperson').click(function (){
            var name=$('.name').val().trim();
            var surname=$('.surname').val().trim();
            var age=$('.age').val().trim();
            var number=$('.number').val().trim();
            var email=$('.email').val().trim();
            var address=$('.address').val().trim();

            if(name=='' || surname=='' || age=='' || number=='' || email=='' || address==''){
                alert('Verilenleri duzgun daxil edin');
            }
            else{
                $.ajax({
                    url:'/addperson',
                    type:'POST',
                    data:{
                        'name':name,
                        'surname':surname,
                        'age':age,
                        'number':number,
                        'email':email,
                        'address':address,
                        "_token":"{{csrf_token()}}"
                    },
                    success:function (response){
                        console.log(response.message)
                        if(response.status=='success'){
                            location.reload()
                            $('.name').val('');
                            $('.surname').val('');
                            $('.age').val('');
                            $('.number').val('');
                            $('.email').val('');
                            $('.address').val('');
                        }
                    },
                    sirala
                })
            }
        })
        $('.active').removeClass('active');
        $('.person_page').addClass('active');
    </script>

@endsection

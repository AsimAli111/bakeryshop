@extends('adminpannel.index')
@section('key')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
            sirala()
        } );
    </script>

    <div style="position: relative;top: 25px">
        <h3 style="margin-left: 250px">Məhsullar cədvəli</h3>
        <div class="col-md-10">
            <table class="table table-dark table-hover text-center" id="myTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Məhsul adı</th>
                    <th>Mətbəx</th>
                    <th>Qiymət</th>
                    <th>Redaktə</th>
                </tr>
                </thead>
                <tbody>
                @foreach($product as $val)
                    <tr id="{{$val->id}}">
                        <td></td>
                        <td>{{$val->product_name}}</td>
                        <td>{{$val->kitchens}}</td>
                        <td>{{$val->price}}</td>
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
        function sirala(){
            var i=1;
            $('tbody tr').each(function (){
                $(this).find('td:eq(0)').text(i++);
            })
        }

        $('tbody').on('click','.edit',function (){
            var tr=$(this).parents('tr');
            var name=tr.find('td:eq(1)').text().trim();
            var kitchen=tr.find('td:eq(2)').text().trim();
            var price=tr.find('td:eq(3)').text().trim();

            tr.find('td:eq(1)').attr('oldvalue1',name)
            tr.find('td:eq(2)').attr('oldvalue2',kitchen)
            tr.find('td:eq(3)').attr('oldvalue3',price)
            tr.find('td:eq(1)').html('<input class="form-control name" type="text" value="'+name+'">')
            tr.find('td:eq(2)').html('<input class="form-control kitchen" type="text" value="'+kitchen+'">')
            tr.find('td:eq(3)').html('<input class="form-control price" type="text" value="'+price+'">')
            tr.find('td:eq(4)').html(`
                                        <button class="btn btn-success update"><i class="fa fa-save"></i></button>
                                        <button class="btn btn-warning disable"><i class="fa fa-times"></i></button>
                                    `);

            $('tbody').on('click','.disable',function (){
                var tr=$(this).closest('tr');
                tr.find('td:eq(1)').html(name);
                tr.find('td:eq(2)').html(kitchen);
                tr.find('td:eq(3)').html(price);
                tr.find('td:eq(4)').html(`
                    <button class="btn btn-primary edit"><i class="fa fa-pencil-square-o"></i></button>
                    <button class="btn btn-danger delete"><i class="fa fa-trash-o"></i></button>
                `)
            })
        })

        $('tbody').on('click','.update',function (){
            var tr=$(this).parents('tr');
            var name=$('.name').val().trim();
            var kitchen=$('.kitchen').val().trim();
            var price=$('.price').val().trim();
            var id=tr.attr('id');

            if(name=='' || kitchen=='' || price=='' || name.length<2 || kitchen.length<2 || price.length<1){
                alert('Verilenleri duzgun daxil edin');
                return false
            }
            else{
                $.ajax({
                    url:'/updateproduct',
                    type:'POST',
                    data:{
                        'name':name,
                        'kitchen':kitchen,
                        'price':price,
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
                                                    <td>`+kitchen+`</td>
                                                    <td>`+price+`</td>
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
                url:'deleteproduct',
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

    <style>
        input{
            margin-top: 15px;
        }
    </style>
    <div>
        <button style="float: right;margin-top: 15px;margin-right: 15px;font-size: 15px" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
            <i class="fa fa-plus"></i> Məhsul əlave et
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
                            <input type="text" class="form-control name" placeholder="Bişintinin adı...">

                            <input type="text" class="form-control content" placeholder="Tərkibi...">
                    <select class="form-control kitchen">
                        @foreach($kitchen as $val)
                        <option id="{{$val->id}}">
                            {{$val->kitchen_name}}
                        </option>
                        @endforeach
                    </select>

                            <input type="text" class="form-control price" placeholder="Qiyməti...">

                            <input type="text" class="form-control branch" placeholder="Filialın adı..." value="Bütün">

                            <input type="file" name="image" class="form-details image">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success addproduct" data-dismiss="modal">Əlavə et</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Bağla</button>
                </div>
            </div>

        </div>
    </div>

    <script>
        $('.addproduct').click(function (){
            var productname=$('.name').val().trim();
            var content=$('.content').val().trim();
            var kitchen=$('.kitchen').find('option:selected').attr('id');
            var price=$('.price').val().trim();
            var branch=$('.branch').val().trim();
            var image=$('.image')[0].files[0];
            var formdata=new FormData();
            formdata.append('productname',productname)
            formdata.append('productcontent',content)
            formdata.append('kitchen',kitchen)
            formdata.append('price',price)
            formdata.append('branch',branch)
            formdata.append('image',image)
            formdata.append('_token',"{{csrf_token()}}")

          if(productname=='' || content=='' || kitchen=='' || price=='' || branch=='' || image==''){
              alert('Verilenleri duzgun daxil edin');
          }
          else{
              $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                          'content')
                  }
              });
              $.ajax({
                  url:'/addproduct',
                  type:'POST',
                  cache:false,
                  contentType:false,
                  processData:false,
                  data:formdata,
                  success:function (response){
                      console.log(response.message)
                      if(response.status=='success'){
                              location.reload()
                      }

                  },
              })
          }
        })
        $('.active').removeClass('active');
        $('.product_page').addClass('active');
    </script>
@endsection

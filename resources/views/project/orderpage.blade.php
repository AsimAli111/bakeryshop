<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">


<div class="container">
    <div class="text-center" style="color: #d63384">
        <h1 style="font-family: 'Playfair Display', serif">Sifariş</h1>
    </div>
    <div class="col-md-5">
        <ul style="list-style-type: none">
            <li>
                <label>Ad:</label>
                <input class="form-control" name="name" type="text" placeholder="Adınız...">
            </li>
            <li>
                <label>Nömrə:</label>
                <input class="form-control" name="number" type="text" placeholder="Nömrəniz...">
            </li>
            <li>
                <label>Email:</label>
                <input class="form-control" name="email" type="email" placeholder="Emailiniz...">
            </li>
            <li>
                <label>Sifarişin adı:</label>
                <input class="form-control" name="ordername" type="text" placeholder="Sifarişin adı...">
            </li>
            <li>
                <label>Sifarişin haqqında:</label>
                <textarea class="form-control" rows="4" id="aboutorder" type="text" placeholder="Sifarişin haqqında..."></textarea>
            </li>
            <li>
                <label>Çatdırılma tarixi:</label>
                <input class="form-control" name="date" type="date" placeholder="Tarix...">
            </li>
        </ul>
        <button style="position: absolute;left: 55px" class="btn btn-success">Sifariş et</button>
    </div>
    <input class="form-control-color" name="search" type="text" placeholder="axtar" style="display: inline-block">
    <button class="src" style="display: inline-block;width: 25px;height: 25px"><i class="fa fa-search"></i></button><br>

    <img src="" alt="sekil" style="width: 120px;height: 120px" class="orderimg">
    <span class="result" style="font-size: 25px"></span>
    <script>
        $('.src').click(function (){
            var txt=$('input[name=search]').val().trim();
            $.ajax({
                url:'/src',
                type:'POST',
                data:{
                    'txt':txt,
                    "_token":"{{csrf_token()}}"
                },
                success:function (response){
                    console.log(response);
                    if(response.status=='success'){
                        response.data.forEach(function (item){
                            $('.result').append(`
                                ${item['product_name']},
                            `);
                            $('.orderimg').attr('src',item['image']);
                        })
                    }
                }
            })
        })
    </script>
</div>
        <script>
            $('.btn-success').click(function (){
                var name=$('input[name=name]').val().trim();
                var email=$('input[name=email]').val().trim();
                var number=$('input[name=number]').val().trim();
                var ordername=$('input[name=ordername]').val().trim();
                var aboutorder=$('#aboutorder').val().trim();
                var date=$('input[name=date]').val();

                    if(name=='' || email=='' || number=='' || ordername=='' || aboutorder=='' || date==''){
                        alert('Bos sutun qoymayin!')
                        return false;
                    }
                    else{
                        $.ajax({
                            url:'/insertorder',
                            type:'POST',
                            data:{
                                'name':name,
                                'email':email,
                                'number':number,
                                'ordername':ordername,
                                'aboutorder':aboutorder,
                                'date':date,
                                "_token":"{{csrf_token()}}"
                            },
                            success:function (response){
                                console.log(response)
                            }
                        })
                    }

            })
        </script>

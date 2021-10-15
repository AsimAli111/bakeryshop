
<section id ="pricing" class="description_content">
    <div class="text-content container ">
        <div class="container">
            <div class="row">
                <div id="w">
                    <ul style="display: inline-block" id="portfolio">
                        @foreach($product as $val)
                            <li style="display: inline-block;margin-left: 15px" class="item ">
                                <img style="height: 170px;width: 190px" src="{{asset('/productimage/'.$val->image)}}" alt="Food" ><br>
                                <div style="background-color: #be0303;text-align: center">
                                    <span style="color: whitesmoke;font-size: 25px;">
                                        {{$val->product_name}}
                                    </span>
                                    <h2 style="color: whitesmoke" class="white">
                                        {{$val->price}}
                                    </h2>
                                </div>
                            </li>
                        @endforeach
                    </ul><!-- @end #portfolio -->
                </div><!-- @end #w -->
            </div>
        </div>
    </div>
</section>

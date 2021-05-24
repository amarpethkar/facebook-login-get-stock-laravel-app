{{-- include app layout --}}
@extends('layouts.app')

{{-- stock content to be appned at app layout --}}
@section('content')
    <div class="container">
        <h3 id="heading"> Get Stock</h3>
        <div class="getStockFormSection">
            <form id="ajaxform">
                <div class="mb-3">
                    <label for="name" class="form-label">Enter Stock Symbol </label>
                    <input type="text" name="name" class="form-control" id="name">
                    <div class="form-text"> Ex. AMZN </div>
                    <div class="form-text"><a href="https://www.nasdaq.com/market-activity/stocks/screener" target='_blank'>Click here to know more stock symbol</a></div>
                </div>
                <button class="btn btn-primary save-data">Get Price</button>
            </form>
        </div>
        <h3 id="heading"> Stock View </h3>
        @if(count($stockQuotes) > 0)
           <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Stock Symbol</th>
                        <th scope="col">High</th>
                        <th scope="col">Low</th>
                        <th scope="col">Price</th>
                        <th scope="col">Searched At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stockQuotes as $stock)
                        <tr>
                            <th scope="row">{{$stock->symbol}}</th>
                            <td>{{$stock->high}}</td>
                            <td>{{$stock->low}}</td>
                            <td>{{$stock->price}}</td>
                            <td>{{$stock->created_at}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$stockQuotes->links()}}
        @else 
            <p> No stock quotes found <p>
        @endif
    </div>
    {{-- make ajax call to stock controller & Alpha Vantage stock quote API  --}}
    <script>
        $(".save-data").click(function(event){
            event.preventDefault();
            let name = $("input[name=name]").val();
            console.log(name);
            let _token   = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: "/stock",
                type:"POST",
                data:{
                    name : name,
                    user_id : loggedInUser.user_fb_id,
                    _token: _token
                },
                success:function(response){
                    // On ajax success route user to stcok page and show success message else show error message
                if(response == 'success') {
                    window.location.href = '/stock/'+loggedInUser.user_fb_id+'?message=added';
                } else if(response == 'empty'){
                    window.location.href = '/stock/'+loggedInUser.user_fb_id+'?message=empty';
                } else {
                    // This is debugging area
                    console.log(response);
                }
                },
            });
        });
    </script>
@endsection
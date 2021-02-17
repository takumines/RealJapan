<x-guest-layout>

    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h1 class="mt-3">Real Japan</h1>
                    <div class="card mt-5">
                        <div class="card-header text-center">
                            調査結果
                        </div>
                        <div class="card-body">
                            <h4>{{$resultData['prefecture']}} {{$resultData['city']}} {{$resultData['area']}} 物件タイプ{{ $resultData['propertyType'] }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-guest-layout>
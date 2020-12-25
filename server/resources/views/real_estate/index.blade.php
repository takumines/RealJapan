<x-guest-layout>

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        不動産取引検索
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" method="get" action="#"
                              enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label text-md-right">都道府県</label>
                                <div class="col-sm-6 col-form-label">
                                    <select name="prefecture" class="form-control prefecture" >
                                        <option value="">選択してください</option>
                                        @foreach( $prefectures as $key => $value )
                                            <option
                                                    value="{{ $value }}">
                                                {{ $key }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <label class="col-sm-6 col-form-label text-md-right">市区町</label>
                                <div class="col-sm-6 col-form-label">
                                    <select name="city" class="form-control city" >
                                        <option value="">選択してください</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-user row mb-0">
                                <div class="col text-center">
                                    <button type="submit" class="btn btn-outline-primary">検索</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
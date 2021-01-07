<x-guest-layout>

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="mt-3">Real Japan</h1>
                <div class="card mt-5">
                    <div class="card-header">
                        不動産取引検索
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" method="post" action="#"
                              enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="col-4">
                                    <label class="col-form-label">都道府県</label>
                                    <div class="col-form-label">
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
                                </div>
                                <div class="col-4">
                                    <label class="col-form-label">市区町</label>
                                    <div class="col-form-label">
                                        <select name="city" class="form-control city" >
                                            <option>選択してください</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label class="col-form-label">地域</label>
                                    <div class="col-form-label">
                                        <select name="area" class="form-control area">
                                            <option>選択してください</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-4">
                                    <label class="col-form-label">物件タイプ</label>
                                    <div class="col-form-label">
                                        <select name="property_type" class="form-control property_type">
                                            <option>選択してください</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label class="col-form-label">価格</label>
                                    <div class="col-form-label">
                                        <input type="text" name="price" value="{{ old('price') }}" class="form-control" placeholder="入力してください">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label class="col-form-label">面積</label>
                                    <div class="col-form-label">
                                        <input type="text" name="square_meters" value="{{ old('square_meters') }}" class="form-control" placeholder="入力してください">
                                    </div>
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
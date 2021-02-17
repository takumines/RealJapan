<x-guest-layout>

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h1 class="mt-3">Real Japan</h1>
                <div class="card mt-5">
                    <div class="card-header text-center">
                        不動産取引が適正か調べる
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" method="post" action="/search"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-3">
                                    <label class="col-form-label">都道府県</label>
                                    <div class="col-form-label">
                                        <select id="prefecture" name="prefecture" class="form-control" >
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
                                <div class="col-3">
                                    <label class="col-form-label">市区町</label>
                                    <div class="col-form-label">
                                        <select id="city" name="city" class="form-control" >
                                            <option>選択してください</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <label class="col-form-label">地域</label>
                                    <div class="col-form-label">
                                        <select id="area" name="area" class="form-control">
                                            <option>選択してください</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <label class="col-form-label">物件タイプ</label>
                                    <div class="col-form-label">
                                        <select id="property_type" name="property_type" class="form-control">
                                            <option>選択してください</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <p class="mx-auto mt-3">希望の平米単価（価格　×　面積）を設定する</p>
                            </div>

                            <div class="form-group row">
                                <div class="col-3 mx-auto">
                                    <label class="col-form-label">価格</label>
                                    <div class="col-form-label">
                                        <input id="price" type="text" name="price" value="{{ old('price') }}" class="form-control" placeholder="金額">
                                    </div>
                                </div>

                                <div class="col-3 mx-auto">
                                    <label class="col-form-label">面積</label>
                                    <div class="col-form-label">
                                        <input id="square_meters" type="text" name="square_meters" value="{{ old('square_meters') }}" class="form-control" placeholder="m2">
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
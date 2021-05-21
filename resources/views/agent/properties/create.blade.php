@extends('frontend.layouts.app')

@section('styles')

@endsection

@section('content')

    <section class="section">
        <div class="container">
            <div class="row">

                <div class="col s12 m3">
                    <div class="agent-sidebar">
                        @include('agent.sidebar')
                    </div>
                </div>

                <div class="col s12 m9">
                    <div class="agent-content">
                        <h4 class="agent-title">Tạo bất động sản</h4>

                        <form action="{{route('agent.properties.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">title</i>
                                    <input id="title" name="title" type="text" class="validate" data-length="200">
                                    <label for="title">Tiêu đề</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">monetization_on</i>
                                    <input id="price" name="price" type="number" class="validate">
                                    <label for="price">Giá</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">business</i>
                                    <input id="area" name="area" type="number" class="validate">
                                    <label for="area">Diện tích</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">airline_seat_flat</i>
                                    <input id="bedroom" name="bedroom" type="number" class="validate">
                                    <label for="bedroom">Phòng ngủ</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">event_seat</i>
                                    <input id="bathroom" name="bathroom" type="number" class="validate">
                                    <label for="bathroom">Phòng tắm</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s4">
                                    <i class="material-icons prefix">location_city</i>
                                    <input id="city" name="city" type="text" class="validate">
                                    <label for="city">Thành phố</label>
                                </div>
                                <div class="input-field col s8">
                                    <i class="material-icons prefix">account_balance</i>
                                    <textarea id="address" name="address" class="materialize-textarea"></textarea>
                                    <label for="address">Địa chỉ</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s3">
                                    <p>
                                        <label>
                                            <input type="checkbox" name="featured" class="filled-in" checked="checked" />
                                            <span>Nội thất</span>
                                        </label>
                                    </p>
                                </div>
                                <div class="input-field col s9">
                                    <i class="material-icons prefix">mode_edit</i>
                                    <textarea id="description" name="description" class="materialize-textarea"></textarea>
                                    <label for="description">Mô tả</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col s3">
                                    <label class="label-custom" for="type">Kiểu bất động sản</label>
                                    <p>
                                        <label>
                                            <input class="with-gap" name="type" value="datnen" type="radio"  />
                                            <span>Đất nền</span>
                                        </label>
                                    </p>
                                    <p>
                                        <label>
                                            <input class="with-gap" name="type" value="nhapho" type="radio"  />
                                            <span>Nhà phố</span>
                                        </label>
                                    </p>
                                    <p>
                                        <label>
                                            <input class="with-gap" name="type" value="bietthu" type="radio"  />
                                            <span>Biệt thự</span>
                                        </label>
                                    </p>
                                    <p>
                                        <label>
                                            <input class="with-gap" name="type" value="canho" type="radio"  />
                                            <span>Căn hộ</span>
                                        </label>
                                    </p>
                                    <p>
                                        <label>
                                            <input class="with-gap" name="type" value="shophouse" type="radio"  />
                                            <span>Shop house</span>
                                        </label>
                                    </p>
                                </div>
                                <div class="col s3">
                                    <label class="label-custom" for="purpose">Mục đích</label>
                                    <p>
                                        <label>
                                            <input class="with-gap" name="purpose" value="buy" type="radio"  />
                                            <span>Mua</span>
                                        </label>
                                    </p>
                                    <p>
                                        <label>
                                            <input class="with-gap" name="purpose" value="sell" type="radio"  />
                                            <span>Bán</span>
                                        </label>
                                    </p>
                                    <p>
                                        <label>
                                            <input class="with-gap" name="purpose" value="deposit" type="radio"  />
                                            <span>Ký gửi</span>
                                        </label>
                                    </p>
                                    <p>
                                        <label>
                                            <input class="with-gap" name="purpose" value="rent" type="radio"  />
                                            <span>Cho thuê</span>
                                        </label>
                                    </p>
                                </div>
                                <div class="input-field col s6">
                                    <select multiple name="features[]">
                                        <option value="" disabled selected>Choose Features</option>
                                        @foreach($features as $feature)
                                            <option value="{{ $feature->id }}">{{ $feature->name }}</option>
                                        @endforeach
                                    </select>
                                    <label class="label-custom">Nội thất</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="file-field input-field col s12">
                                    <div class="btn indigo">
                                        <span>Hình ảnh nổi bật</span>
                                        <input type="file" name="image">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">map</i>
                                    <input id="location_latitude" name="location_latitude" type="text" class="validate">
                                    <label for="location_latitude">Vĩ độ</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">map</i>
                                    <input id="location_longitude" name="location_longitude" type="text" class="validate">
                                    <label for="location_longitude">Kinh độ</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">voice_chat</i>
                                    <input id="video" name="video" type="text" class="validate">
                                    <label for="video">Youtube Link</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="file-field input-field col s12">
                                    <div class="btn indigo">
                                        <span>Sơ đồ căn hộ</span>
                                        <input type="file" name="floor_plan">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">place</i>
                                    <textarea id="nearby" name="nearby" class="materialize-textarea"></textarea>
                                    <label for="nearby">Lân cận</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="file-field input-field col s12">
                                    <div class="btn indigo">
                                        <span>Tải hình ảnh lên</span>
                                        <input type="file" name="gallaryimage[]" multiple>
                                        <span class="helper-text" data-error="wrong" data-success="right">Tải một hoặc nhiều hình ảnh</span>
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder="Tải một hoặc nhiều hình ảnh">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col s12 m-t-30">
                                    <button class="btn waves-effect waves-light btn-large indigo darken-4" type="submit">
                                        GỬI ĐI
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </div>

                        </form>


                    </div>
                </div> <!-- /.col -->

            </div>
        </div>
    </section>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('input#title, textarea#nearby').characterCounter();
        $('select').formSelect();
    });

</script>
@endsection
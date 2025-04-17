<div class="modal modal-2 fade" id="modalCall" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> <i class="pe-7s-close"></i></button>

                <div class="row">
                    <h2 class="text-center">Заказать звонок</h2>
                    <div class="form billing-info-wrap">
                        <form action="{{ route('call') }}" method="POST">
                            @csrf

                            <div class="row your-order-area">
                                <div class="col-lg-12">
                                    <div class="billing-info mb-4">
                                        <label>ФИО</label>
                                        <input type="text" name="customer_name" value="{{ old('customer_name') }}" required />
                                        @error('customer_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="billing-info mb-4">
                                        <label>Телефон</label>
                                        <input type="text" name="customer_phone" value="{{ old('customer_phone') }}" required />
                                        @error('customer_phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="your-order-foot col-md-7 mb-2">
                                        <p class="text-center">
                                            Нажимая кнопку «Заказать», я даю <a href="{{ route('personal-data') }}" target="_blank">согласие</a> на
                                            обработку персональных данных, в соответствии с <a href="{{ route('policy') }}" target="_blank">Политикой</a>
                                        </p>
                                    </div>

                                    <div class="Place-order col-md-5 m-0 d-flex justify-content-end">
                                        <div class="billing-info">
                                            <button type="submit" class="btn-order">Позвоните мне</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

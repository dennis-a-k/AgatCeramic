<div class="col-lg-7">
    <div class="billing-info-wrap">
        <h3>Детали заказа</h3>
        <div class="row">
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
                    <label>Адрес доставки</label>
                    <input type="text" name="shipping_address" value="{{ old('shipping_address') }}" required />
                    @error('shipping_address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="billing-info mb-4">
                    <label>Телефон</label>
                    <input type="text" name="customer_phone" value="{{ old('customer_phone') }}" required />
                    @error('customer_phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="billing-info mb-4">
                    <label>Электронная почта</label>
                    <input type="email" name="customer_email" value="{{ old('customer_email') }}" required />
                    @error('customer_email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="additional-info-wrap">
            <div class="additional-info">
                <label>Комментарий к заказу</label>
                <textarea name="comment">{{ old('comment') }}</textarea>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-7">
    <div class="card">
        <div class="card-body register-card-body">
            <form action="{{ route('data.update.phone') }}" method="POST" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label for="inputPhone" class="col-md-3 col-form-label">Телефон:</label>
                    <div class="col-md-9 input-group">
                        <input type="text" class="form-control" id="inputPhone" placeholder="Тенлефон компании (указать с +)" name="app_phone"  value="{{ old('app_phone') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                        <span class="input-group-append">
                            <button type="submit" class="btn btn-info">Изменить</button>
                        </span>
                    </div>
                </div>
            </form>

            <form action="{{ route('data.update.email') }}" method="POST" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label for="inputEmail" class="col-md-3 col-form-label">Почта:</label>
                    <div class="col-md-9 input-group">
                        <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="app_email" value="{{ old('app_email') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <span class="input-group-append">
                            <button type="submit" class="btn btn-info">Изменить</button>
                        </span>
                    </div>
                </div>
            </form>

            <form action="{{ route('data.update.organization') }}" method="POST" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label for="inputOrganization" class="col-md-3 col-form-label">Организация:</label>
                    <div class="col-md-9 input-group">
                        <input type="text" class="form-control" id="inputOrganization" placeholder="Название организации" name="organization" value="{{ old('organization') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-briefcase"></span>
                            </div>
                        </div>
                        <span class="input-group-append">
                            <button type="submit" class="btn btn-info">Изменить</button>
                        </span>
                    </div>
                </div>
            </form>

            <form action="{{ route('data.update.inn') }}" method="POST" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label for="inputINN" class="col-md-3 col-form-label">ИНН:</label>
                    <div class="col-md-9 input-group">
                        <input type="text" class="form-control" id="inputINN" placeholder="ИНН" name="inn" value="{{ old('inn') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-pen"></span>
                            </div>
                        </div>
                        <span class="input-group-append">
                            <button type="submit" class="btn btn-info">Изменить</button>
                        </span>
                    </div>
                </div>
            </form>

            <form action="{{ route('data.update.ogrn') }}" method="POST" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label for="inputOGRN" class="col-md-3 col-form-label">ОГРН:</label>
                    <div class="col-md-9 input-group">
                        <input type="text" class="form-control" id="inputOGRN" placeholder="ОГРН" name="ogrn" value="{{ old('ogrn') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-pen"></span>
                            </div>
                        </div>
                        <span class="input-group-append">
                            <button type="submit" class="btn btn-info">Изменить</button>
                        </span>
                    </div>
                </div>
            </form>

            <form action="{{ route('data.update.okato') }}" method="POST" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label for="inputOKATO" class="col-md-3 col-form-label">ОКАТО:</label>
                    <div class="col-md-9 input-group">
                        <input type="text" class="form-control" id="inputOKATO" placeholder="ОКАТО" name="okato" value="{{ old('okato') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-pen"></span>
                            </div>
                        </div>
                        <span class="input-group-append">
                            <button type="submit" class="btn btn-info">Изменить</button>
                        </span>
                    </div>
                </div>
            </form>

            <form action="{{ route('data.update.okpo') }}" method="POST" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label for="inputOKPO" class="col-md-3 col-form-label">ОКПО:</label>
                    <div class="col-md-9 input-group">
                        <input type="text" class="form-control" id="inputOKPO" placeholder="ОКПО" name="okpo" value="{{ old('okpo') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-pen"></span>
                            </div>
                        </div>
                        <span class="input-group-append">
                            <button type="submit" class="btn btn-info">Изменить</button>
                        </span>
                    </div>
                </div>
            </form>

            <form action="{{ route('data.update.bank') }}" method="POST" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label for="inputBank" class="col-md-3 col-form-label">Банк:</label>
                    <div class="col-md-9 input-group">
                        <input type="text" class="form-control" id="inputBank" placeholder="Название банка" name="bank" value="{{ old('bank') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-landmark"></span>
                            </div>
                        </div>
                        <span class="input-group-append">
                            <button type="submit" class="btn btn-info">Изменить</button>
                        </span>
                    </div>
                </div>
            </form>

            <form action="{{ route('data.update.bik') }}" method="POST" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label for="inputBIK" class="col-md-3 col-form-label">БИК Банка:</label>
                    <div class="col-md-9 input-group">
                        <input type="text" class="form-control" id="inputBIK" placeholder="БИК банка" name="bik" value="{{ old('bik') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-pen"></span>
                            </div>
                        </div>
                        <span class="input-group-append">
                            <button type="submit" class="btn btn-info">Изменить</button>
                        </span>
                    </div>
                </div>
            </form>

            <form action="{{ route('data.update.k_s') }}" method="POST" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label for="inputK_s" class="col-md-3 col-form-label">к/с:</label>
                    <div class="col-md-9 input-group">
                        <input type="text" class="form-control" id="inputK_s" placeholder="к/с" name="k_s" value="{{ old('k_s') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-pen"></span>
                            </div>
                        </div>
                        <span class="input-group-append">
                            <button type="submit" class="btn btn-info">Изменить</button>
                        </span>
                    </div>
                </div>
            </form>

            <form action="{{ route('data.update.r_s') }}" method="POST" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label for="inputR_s" class="col-md-3 col-form-label">р/с:</label>
                    <div class="col-md-9 input-group">
                        <input type="text" class="form-control" id="inputR_s" placeholder="р/с" name="r_s" value="{{ old('r_s') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-pen"></span>
                            </div>
                        </div>
                        <span class="input-group-append">
                            <button type="submit" class="btn btn-info">Изменить</button>
                        </span>
                    </div>
                </div>
            </form>

            <form action="{{ route('data.update.adress') }}" method="POST" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label for="inputAdress" class="col-md-3 col-form-label">Адрес организации:</label>
                    <div class="col-md-9 input-group">
                        <input type="text" class="form-control" id="inputAdress" placeholder="Адрес организации" name="adress" value="{{ old('adress') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-home"></span>
                            </div>
                        </div>
                        <span class="input-group-append">
                            <button type="submit" class="btn btn-info">Изменить</button>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

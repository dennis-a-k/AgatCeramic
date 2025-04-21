<div class="col-xl-5">
    <table class="table table-hover">
        <tbody>
            <tr>
                <td class="text-secondary"><strong>Телефон:</strong></td>
                <td>
                    @if (!isset($data->app_phone))
                        ---
                    @else
                        {{ $data->app_phone }}
                    @endif
                </td>
            </tr>
            <tr>
                <td class="text-secondary"><strong>Почта:</strong></td>
                <td>
                    @if (!isset($data->app_email))
                        ---
                    @else
                        {{ $data->app_email }}
                    @endif
                </td>
            </tr>
            <tr>
                <td class="text-secondary"><strong>Организация:</strong></td>
                <td>
                    @if (!isset($data->organization))
                        ---
                    @else
                        {{ $data->organization }}
                    @endif
                </td>
            </tr>
            <tr>
                <td class="text-secondary"><strong>ИНН:</strong></td>
                <td>
                    @if (!isset($data->inn))
                        ---
                    @else
                        {{ $data->inn }}
                    @endif
                </td>
            </tr>
            <tr>
                <td class="text-secondary"><strong>ОГРН:</strong></td>
                <td>
                    @if (!isset($data->ogrn))
                        ---
                    @else
                        {{ $data->ogrn }}
                    @endif
                </td>
            </tr>
            <tr>
                <td class="text-secondary"><strong>ОКАТО:</strong></td>
                <td>
                    @if (!isset($data->okato))
                        ---
                    @else
                        {{ $data->okato }}
                    @endif
                </td>
            </tr>
            <tr>
                <td class="text-secondary"><strong>ОКПО:</strong></td>
                <td>
                    @if (!isset($data->okpo))
                        ---
                    @else
                        {{ $data->okpo }}
                    @endif
                </td>
            </tr>
            <tr>
                <td class="text-secondary"><strong>Банк:</strong></td>
                <td>
                    @if (!isset($data->bank))
                        ---
                    @else
                        {{ $data->bank }}
                    @endif
                </td>
            </tr>
            <tr>
                <td class="text-secondary"><strong>БИК Банка:</strong></td>
                <td>
                    @if (!isset($data->bik))
                        ---
                    @else
                        {{ $data->bik }}
                    @endif
                </td>
            </tr>
            <tr>
                <td class="text-secondary"><strong>к/с:</strong></td>
                <td>
                    @if (!isset($data->k_s))
                        ---
                    @else
                        {{ $data->k_s }}
                    @endif
                </td>
            </tr>
            <tr>
                <td class="text-secondary"><strong>р/с:</strong></td>
                <td>
                    @if (!isset($data->r_s))
                        ---
                    @else
                        {{ $data->r_s }}
                    @endif
                </td>
            </tr>
            <tr>
                <td class="text-secondary"><strong>Адрес:</strong></td>
                <td>
                    @if (!isset($data->adress))
                        ---
                    @else
                        {{ $data->adress }}
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
</div>

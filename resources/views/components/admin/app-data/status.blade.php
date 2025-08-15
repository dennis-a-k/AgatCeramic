@if (session('status') === 'phone-updated')
    <div class="alert alert-success">
        Телефон успешно обновлён
    </div>
@elseif (session('status') === 'email-updated')
    <div class="alert alert-success">
        Почта успешно обновлена
    </div>
@elseif (session('status') === 'organization-updated')
    <div class="alert alert-success">
        Организация успешно обновлена
    </div>
@elseif (session('status') === 'inn-updated')
    <div class="alert alert-success">
        ИНН успешно обновлён
    </div>
@elseif (session('status') === 'ogrn-updated')
    <div class="alert alert-success">
        ОГРН успешно обновлён
    </div>
@elseif (session('status') === 'okato-updated')
    <div class="alert alert-success">
        ОКАТО успешно обновлён
    </div>
@elseif (session('status') === 'okpo-updated')
    <div class="alert alert-success">
        ОКПО успешно обновлён
    </div>
@elseif (session('status') === 'bank-updated')
    <div class="alert alert-success">
        Банк успешно обновлён
    </div>
@elseif (session('status') === 'bik-updated')
    <div class="alert alert-success">
        БИК Банка успешно обновлён
    </div>
@elseif (session('status') === 'k_s-updated')
    <div class="alert alert-success">
        к/с успешно обновлён
    </div>
@elseif (session('status') === 'r_s-updated')
    <div class="alert alert-success">
        р/с успешно обновлён
    </div>
@elseif (session('status') === 'adress-updated')
    <div class="alert alert-success">
        Адрес организации успешно обновлён
    </div>
@elseif (session('status') === 'telegram-updated')
    <div class="alert alert-success">
        Telegram успешно обновлён
    </div>
@elseif (session('status') === 'whatsapp-updated')
    <div class="alert alert-success">
        WhatsApp успешно обновлён
    </div>
@endif

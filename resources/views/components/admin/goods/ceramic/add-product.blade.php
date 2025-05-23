<div class="card card-purple card-outline">
    <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false">
        <div class="card-header">
            <h4 class="card-title text-purple w-100">
                Добавить керамику
            </h4>
        </div>
    </a>
    <div id="collapseThree" class="collapse" data-parent="#accordion" style="">
        <div class="card-body">
            <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    @include('components.admin.goods.ceramic.add-product-information')

                    @include('components.admin.goods.ceramic.add-product-select')
                </div>

                <div class="row">
                    @include('components.admin.goods.ceramic.add-product-images')
                </div>

                <div class="row pb-4">
                    <div class="col-12">
                        @if (session('status') === 'product-created')
                            <span x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-info text-align-center mr-2">Товар создан</span>
                        @endif

                        <button type="submit" class="btn btn-info float-right">Создать</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <div class="labels">

        </div>
        <img src="{{ Storage::url($product->image) }}" height="120px">
        <div class="caption">
            <h3>{{$product->name}}</h3>
            <p>{{$product->price}}</p>
            <p>
            <form action="{{route('basket-add', $product)}}" method="POST">
                <button type="submit" class="btn btn-primary" role="button">В корзину!</button>

{{--                {{ $product->category->name }}--}}

                <a href="{{ route('product', [$product->category->cod, $product->cod]) }}" class="btn btn-default"
                   role="button">Подробнее</a>
                @csrf
            </form>
        </div>
    </div>
</div>

<x-master>
    <div class="container">
        @foreach($data as $item)
            <p>{{ $item->dislikes }}</p>
        @endforeach
    </div>
</x-master>
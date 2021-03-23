@if ($errors->any())
    <div class="bg-red-400 text-white p-2 rounded w-max">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
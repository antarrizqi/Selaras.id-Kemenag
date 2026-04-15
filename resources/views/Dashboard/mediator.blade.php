<h1 class="text-xl font-bold mb-4">Mediator Dashboard</h1>

@foreach($data as $t)
<div class="bg-white p-4 rounded shadow mb-3">

    <p class="font-bold">
        {{ $t->fromUser->name }} → {{ $t->toUser->name }}
    </p>

    <p>HP A: {{ $t->fromUser->phone }}</p>
    <p>HP B: {{ $t->toUser->phone }}</p>

</div>
@endforeach
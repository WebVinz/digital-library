@foreach ($transaksis as $t)
<tr>
    <td>{{ $t->user->name }}</td>
    <td>{{ $t->buku->judul }}</td>
    <td>
        <form action="{{ route('transaksi.setujui', $t->id) }}" method="POST">
            @csrf
            <button class="bg-green-600 text-white px-3 py-1 rounded">
                Setujui
            </button>
        </form>
    </td>
</tr>
@endforeach

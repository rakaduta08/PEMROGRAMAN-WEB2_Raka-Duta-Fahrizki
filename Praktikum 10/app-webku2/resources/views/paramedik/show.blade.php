<x-layout>
    <x-slot:card_title>Paramedik</x-slot>
    <table id="table" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Telpon</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list_paramedik as $paramedik)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $paramedik->nama }}</td>
                <td>{{ $paramedik->tmp_lahir }}</td>
                <td>{{ date('d F Y', strtotime($paramedik->tgl_lahir)) }}</td>
                <td>{{ $paramedik->telpon }}</td>
                <td>
                    <a href="">View</a> | <a href="">Edit</a> | <a href="">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @push('scripts')
        <script>
            $('#table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        </script>
    @endpush
</x-layout>

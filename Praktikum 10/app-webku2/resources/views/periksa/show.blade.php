<x-layout>
    <x-slot:card_title>Periksa</x-slot>
    <table id="table" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Tensi</th>
                <th>Keterangan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list_periksa as $periksa)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $periksa->tanggal }}</td>
                <td>{{ $periksa->tensi }}</td>
                <td>{{ $periksa->keterangan }}</td>
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

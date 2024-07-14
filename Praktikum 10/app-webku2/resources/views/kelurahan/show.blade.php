<x-layout>
    <x-slot:card_title>Kelurahan</x-slot>
    <table id="table" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list_kelurahan as $kelurahan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $kelurahan->nama }}</td>
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

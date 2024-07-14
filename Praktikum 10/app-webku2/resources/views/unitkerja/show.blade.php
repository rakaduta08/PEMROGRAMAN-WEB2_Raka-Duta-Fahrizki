<x-layout>
    <x-slot:card_title>Unit Kerja</x-slot>
    <table id="table" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list_unit_kerja as $unit_kerja)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $unit_kerja->nama }}</td>
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

@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card-body">
                    <form id="pembelianForm" action="{{ route('pembelian.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nomor_pembelian">Nomor Pembelian</label>
                            <input type="text" id="nomor_pembelian" name="nomor_pembelian" placeholder="Nomor Pembelian" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" id="tanggal" name="tanggal" class="form-control" required>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered verticle-middle table-responsive-sm" id="itemsTable">
                                <thead class="text-primary">
                                    <tr>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Qty</th>
                                        <th>Satuan</th>
                                        <th>Harga</th>
                                        <th>Diskon %</th>
                                        <th>Subtotal</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Baris akan ditambahkan di sini menggunakan JavaScript -->
                                </tbody>
                            </table>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="addItem()">Add Item</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>

                    <script>
                    function addItem() {
                        const table = document.getElementById('itemsTable').getElementsByTagName('tbody')[0];
                        const rowIdx = table.rows.length; // Index for the new row
                        const newRow = table.insertRow(rowIdx);

                        // Menambahkan kolom dan input untuk setiap detail item
                        newRow.innerHTML = `
                            <td><input type="text" name="items[${rowIdx}][kode_barang]" class="form-control" required></td>
                            <td><input type="text" name="items[${rowIdx}][nama_barang]" class="form-control" readonly></td>
                            <td><input type="number" name="items[${rowIdx}][qty]" class="form-control" required></td>
                            <td><input type="text" name="items[${rowIdx}][satuan]" class="form-control" readonly></td>
                            <td><input type="number" name="items[${rowIdx}][harga]" class="form-control" required></td>
                            <td><input type="number" name="items[${rowIdx}][diskon]" class="form-control" required></td>
                            <td><input type="number" name="items[${rowIdx}][subtotal]" class="form-control" readonly></td>
                            <td><button type="button" class="btn btn-danger" onclick="removeItem(this)">Remove</button></td>
                        `;
                    }

                    function removeItem(button) {
                        button.closest('tr').remove();
                    }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function addItem() {
        const table = document.getElementById('itemsTable').getElementsByTagName('tbody')[0];
        const rowIdx = table.rows.length; // Index for the new row
        const newRow = table.insertRow(rowIdx);
    
        // Menambahkan kolom dan input untuk setiap detail item
        newRow.innerHTML = `
            <td><input type="text" name="items[${rowIdx}][kode_barang]" class="form-control kode-barang" required onblur="fetchBarangData(this)"></td>
            <td><input type="text" name="items[${rowIdx}][nama_barang]" class="form-control nama-barang" readonly></td>
            <td><input type="number" name="items[${rowIdx}][qty]" class="form-control qty" required oninput="calculateSubtotal(this)"></td>
            <td><input type="text" name="items[${rowIdx}][satuan]" class="form-control satuan-barang" readonly></td>
            <td><input type="number" name="items[${rowIdx}][harga]" class="form-control harga" required oninput="calculateSubtotal(this)"></td>
            <td><input type="number" name="items[${rowIdx}][diskon]" class="form-control diskon" required oninput="calculateSubtotal(this)"></td>
            <td><input type="number" name="items[${rowIdx}][subtotal]" class="form-control subtotal" readonly value="0.00"></td>
            <td><button type="button" class="btn btn-danger" onclick="removeItem(this)">Remove</button></td>
        `;
    
        calculateSubtotal(newRow.querySelector('.qty')); // Calculate initial subtotal
    }
    
    function fetchBarangData(input) {
        const kode = input.value;
        const row = input.closest('tr');
        if (kode) {
            fetch(`/api/barang/${kode}`)
                .then(response => response.json())
                .then(data => {
                    if (data) {
                        row.querySelector('.nama-barang').value = data.nama_barang;
                        row.querySelector('.satuan-barang').value = data.satuan;
                        calculateSubtotal(row.querySelector('.qty'));  // Calculate subtotal when item details are fetched
                    } else {
                        alert('Barang tidak ditemukan');
                    }
                })
                .catch(error => {
                    console.error('Error fetching data: ', error);
                    alert('Error fetching barang data');
                });
        }
    }
    
    function calculateSubtotal(element) {
        const row = element.closest('tr');
        const qty = parseFloat(row.querySelector('.qty').value) || 0;
        const harga = parseFloat(row.querySelector('.harga').value) || 0;
        const diskon = parseFloat(row.querySelector('.diskon').value) || 0;
        const subtotal = qty * (harga - (harga * diskon / 100));
        row.querySelector('.subtotal').value = subtotal.toFixed(2) || '0.00';
    }
    </script>
        

@endsection

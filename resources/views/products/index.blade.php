<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Products</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white">

    <div class="container mx-auto mt-10 px-4">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h3 class="text-3xl font-semibold my-4">Data Produk</h3>
                    <hr class="border-gray-300 mb-4">
                </div>
                <div class="bg-white border border-gray-200 shadow-sm rounded-lg">
                    <div class="p-4">
                        <a href="{{ route('products.create') }}" class="btn btn-md bg-green-600 text-white hover:bg-green-700 px-4 py-2 rounded mb-3 inline-block">ADD PRODUCT</a>
                        <table class="min-w-full table-auto border-collapse">
                            <thead>
                                <tr>
                                    <th class="border-b py-2 px-4 text-left">IMAGE</th>
                                    <th class="border-b py-2 px-4 text-left">TITLE</th>
                                    <th class="border-b py-2 px-4 text-left">PRICE</th>
                                    <th class="border-b py-2 px-4 text-left">STOCK</th>
                                    <th class="border-b py-2 px-4 text-left" style="width: 20%">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td class="border-b text-center py-2 px-4">
                                            <img src="{{ asset('storage/products/'.$product->image) }}" class="rounded" style="width: 150px">
                                        </td>
                                        <td class="border-b py-2 px-4">{{ $product->title }}</td>
                                        <td class="border-b py-2 px-4">{{ "Rp " . number_format($product->price,2,',','.') }}</td>
                                        <td class="border-b py-2 px-4">{{ $product->stock }}</td>
                                        <td class="border-b py-2 px-4 text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('products.destroy', $product->id) }}" method="POST">
                                                <a href="{{ route('products.show', $product->id) }}" class="bg-gray-800 text-white hover:bg-gray-900 px-3 py-1 rounded-md text-sm inline-block">SHOW</a>
                                                <a href="{{ route('products.edit', $product->id) }}" class="bg-blue-600 text-white hover:bg-blue-700 px-3 py-1 rounded-md text-sm inline-block">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-600 text-white hover:bg-red-700 px-3 py-1 rounded-md text-sm inline-block">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4 px-6">
                                            <div class="bg-red-100 text-red-700 p-2 rounded">
                                                Data Products belum Tersedia.
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>

</body>
</html>

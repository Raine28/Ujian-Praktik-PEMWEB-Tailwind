<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Products</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <div class="max-w-6xl mx-auto py-10 px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Image Section -->
            <div class="col-span-1">
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img src="{{ asset('/storage/products/'.$product->image) }}" alt="Product Image" class="w-full h-auto object-cover">
                </div>
            </div>

            <!-- Details Section -->
            <div class="col-span-2">
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h3 class="text-2xl font-bold mb-4">{{ $product->title }}</h3>
                    <hr class="mb-4">
                    <p class="text-xl text-gray-700 font-semibold mb-2">{{ "Rp " . number_format($product->price, 2, ',', '.') }}</p>
                    <div class="prose prose-gray">
                        {!! $product->description !!}
                    </div>
                    <hr class="my-4">
                    <p class="text-lg text-gray-600">Stock: <span class="font-bold">{{ $product->stock }}</span></p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

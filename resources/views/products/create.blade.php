@extends('layouts.restaurant')

@section('content')
<div class="container" style="max-width: 600px; margin: 40px auto; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">

    <h2 style="font-weight: 700; font-size: 26px; margin-bottom: 25px; color: #2c3e50;">➕ إضافة منتج جديد</h2>

    @if($errors->any())
        <div style="background-color: #f8d7da; color: #842029; padding: 15px 20px; border-radius: 6px; margin-bottom: 25px; border: 1px solid #f5c2c7;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach($errors->all() as $error)
                    <li>⚠️ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('restaurant.products.store') }}" method="POST" enctype="multipart/form-data" style="background: #f9fafb; padding: 25px 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
        @csrf

        <label for="name" style="font-weight: 600; color: #34495e;">اسم المنتج:</label><br>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required
               style="width: 100%; padding: 10px 12px; margin-top: 6px; border: 1px solid #ccc; border-radius: 5px; font-size: 15px;"><br><br>

        <label for="description" style="font-weight: 600; color: #34495e;">الوصف:</label><br>
        <textarea id="description" name="description" rows="4"
                  style="width: 100%; padding: 10px 12px; border: 1px solid #ccc; border-radius: 5px; font-size: 15px;">{{ old('description') }}</textarea><br><br>

        <label for="price" style="font-weight: 600; color: #34495e;">السعر (د.ع):</label><br>
        <input type="number" id="price" name="price" value="{{ old('price') }}" required step="0.01" min="0"
               style="width: 100%; padding: 10px 12px; margin-top: 6px; border: 1px solid #ccc; border-radius: 5px; font-size: 15px;"><br><br>

        <label for="image" style="font-weight: 600; color: #34495e;">الصورة:</label><br>
        <input type="file" id="image" name="image" accept="image/*"
               style="margin-top: 6px; font-size: 15px;"><br><br>

        <button type="submit"
                style="background-color: #27ae60; color: white; font-weight: 700; padding: 12px 25px; border: none; border-radius: 6px; cursor: pointer; font-size: 16px; transition: background-color 0.3s ease;">
            💾 حفظ المنتج
        </button>
    </form>

    <br>
    <a href="{{ route('restaurant.products.index') }}" style="color: #2980b9; font-weight: 600; text-decoration: none; font-size: 15px;">
        ⬅ العودة إلى قائمة المنتجات
    </a>
</div>
@endsection
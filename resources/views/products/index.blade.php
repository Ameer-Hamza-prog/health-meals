@extends('layouts.restaurant')

@section('contact')
<div class="container" style="max-width: 900px; margin: 30px auto; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
    <h2 style="margin-bottom: 25px; font-weight: 700; font-size: 28px; color: #2c3e50;">🧆 منتجات المطعم</h2>

    @if(session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 12px 20px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('products.create') }}"
       style="display: inline-block; background-color: #27ae60; color: white; padding: 10px 20px; border-radius: 6px; text-decoration: none; font-weight: 600; margin-bottom: 20px; transition: background-color 0.3s ease;">
       ➕ إضافة منتج جديد
    </a>

    @if($products->isEmpty())
        <p style="font-size: 18px; color: #555;">لا توجد منتجات حالياً.</p>
    @else
        <table style="width: 100%; border-collapse: collapse; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
            <thead>
                <tr style="background-color: #2980b9; color: white; text-align: center; font-weight: 600;">
                    <th style="padding: 12px;">الاسم</th>
                    <th style="padding: 12px;">الوصف</th>
                    <th style="padding: 12px;">السعر</th>
                    <th style="padding: 12px;">الصورة</th>
                    <th style="padding: 12px;">الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr style="border-bottom: 1px solid #ddd; text-align: center;">
                        <td style="padding: 12px; font-weight: 600; color: #34495e;">{{ $product->name }}</td>
                        <td style="padding: 12px; color: #666;">{{ $product->description ?? '—' }}</td>
                        <td style="padding: 12px; color: #27ae60; font-weight: 700;">{{ number_format($product->price, 0) }} د.ع</td>
                        <td style="padding: 12px;">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                     style="width: 80px; height: 80px; object-fit: cover; border-radius: 6px; border: 1px solid #ccc;">
                            @else
                                <span style="color: #aaa;">لا توجد صورة</span>
                            @endif
                        </td>
                        <td style="padding: 12px;">
                            <a href="{{ route('products.edit', $product) }}"
                               style="margin-right: 10px; color: #2980b9; font-weight: 600; text-decoration: none; transition: color 0.3s;">
                               ✏️ تعديل
                            </a>

                            <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;" onsubmit="return confirm('هل أنت متأكد من حذف المنتج؟')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        style="background-color: transparent; border: none; color: #c0392b; font-weight: 600; cursor: pointer; transition: color 0.3s;">
                                    🗑 حذف
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection

         @extends('layouts.restaurant')
         @section('contact')
             <div class="col-lg-12">
                 <div class="card">
                     <div class="card-body">
                         <h5 class="card-title">عرض حسب عنوان الصفحة وفئة الشاشة</h5>
                         <div class="table-responsive">
                             <table class="table text-nowrap align-middle mb-0">
                                 <thead>
                                     <tr class="border-2 border-bottom border-primary border-0">
                                         <th scope="col" class="ps-0">عنوان الصفحة</th>
                                         <th scope="col">الرابط</th>
                                         <th scope="col" class="text-center">عدد المشاهدات</th>
                                         <th scope="col" class="text-center">قيمة الصفحة</th>
                                     </tr>
                                 </thead>
                                 <tbody class="table-group-divider">
                                     <tr>
                                         <th scope="row" class="ps-0 fw-medium">
                                             <span class="table-link1 text-truncate d-block">مرحباً بك في موقعنا</span>
                                         </th>
                                         <td>
                                             <a href="javascript:void(0)"
                                                 class="link-primary text-dark fw-medium d-block">/index.html</a>
                                         </td>
                                         <td class="text-center fw-medium">18,456</td>
                                         <td class="text-center fw-medium">$2.40</td>
                                     </tr>
                                     <!-- باقي السطور مثل السابق -->
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>
         @endsection

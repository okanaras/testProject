<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

// companies ve employees adli kullandigim 2 modeli burada tanittim fk icin companeis  ve login islemi icin asagidakini ekledim
use App\Models\Employees;
use App\Models\Companies;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    // veritabanindan verileri datatable a verilerimizi cektik
    public function index()
    {
        $employee = Employees::all(); // burada tum verilerimizi cekip 'employee' isimli degiskene atadim
        return view('admin.employee.employee-list', compact('employee')); // admin/company/company-list view ini dondurup diger parametreyi ise view de degiskeni tanisin diye verdim
    }

    // ekleme islemini yapan arayuzu burada dondurdum ve foreign key yi almak icin Companies modelinden tum verileri fk_id isimli degiskene atadim
    public function create()
    {
        $employee = Companies::all();
        return view('admin.employee.employee-add', compact('employee'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'email:rfc,dns',
            'phone' => 'required | digits:11',
        ]);
        Employees::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'comp_id' => $request->comp_id,
        ]);
        return redirect()->route('employee-list')->with('success', 'Calisan bilgisi basariyla eklendi!'); // islem tamamlandiginda ve eger basarili ise donecek kisim ve mesaj bilgisi buradaki succes degiskenini view de almak icin verdim


    }


    // edit sayfasini goruntulemek icin kullandigim duzenlenecek id yi parametre alan metot
    public function edit(string $id)
    { // modelden veriyi sorguluyoruz burda extra olarak companies den fk yi da sorguladim
        $employee = Employees::findOrFail($id);
        $fk_id = Companies::all();

        if ($employee) {
            //eger kosul saglanirsa duzenle sayfasina yonlendiriyoruz
            return view('admin.employee.employee-edit', compact('employee', 'fk_id'));
        } else {
            return redirect()->route("employee-list"); // eger id gelmezse liste sayfasina geri dondurulecek
        }
    }

    // update ve dogrulama isleminin yapildigi action
    public function update(string $id, Request $request)
    {
        // dogrulama islemi
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
        ]);

        //modelden gelen id yi bulup guncelledigimiz kisim
        Employees::findOrFail($id)->update($request->all());

        // eger basarili ise dondurulen kisim ve burada post islemi oldugu icin 'id' yi de gonderiyoruz
        return redirect()->route('employee-list', $id)->with('success', 'Calisan bilgisi basariyla guncellendi!');
    }

    // silme isleminin gerceklestigi kisim
    public function destroy(string $id)
    {
        // silinecek ogenin id sini cekiyorum
        $employee = Employees::findOrFail($id);
        $employee->delete();

        // islem tamamlandiginda ve eger basarili ise donecek kisim ve mesaj bilgisi buradaki succes degiskenini view de almak icin verdim
        return redirect()->route('employee-list')->with('success', 'Calisan bilgisi basariyla silindi!');
    }

    // goruntuleme actionu 
    public function show(string $id)
    {
        // goruntulenecek ogenin id sini modelden cekip degiskene attim
        $employee = Employees::findOrFail($id);
        if ($employee) {
            //eger kosul saglanirsa info sayfasina yonlendirdim ve verilerini cekebilmek icin compact ile company degiskenini gonderdim
            return view('admin.employee.employee-show', compact('employee'));
        } else {
            return redirect()->route("employee-list"); // eger id gelmezse liste sayfasina geri dondurulecek
        }
    }
}